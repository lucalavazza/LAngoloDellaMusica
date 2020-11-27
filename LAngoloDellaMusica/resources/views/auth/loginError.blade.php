@extends('layouts.master')

@section('bodyType')
<body onload="loginWrongAlert()">
@stop

@section('menu_nav')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('info') }}">Info</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categorie
        </a>
        <ul class="dropdown-menu multi-level" aria-labelledby="navbarDropdown">
        @foreach($macro_categories_list as $macro_category)
            @if(hasSubCats($macro_category->id))
            <li class="dropdown-submenu">
                <a class="dropdown-item" href="{{ route('macro', ['id' => $macro_category->id]) }}">{{ $macro_category->macro_cat }}</a>
                <ul class="dropdown-menu">
                @foreach ($categories_list as $category)
                    @if($category->macro_categories_id == $macro_category->id)
                        <a class="dropdown-item" href="{{ route('spec', ['id' => $category->id]) }}">{{ $category->specific_cat }}</a>
                    @endif
                @endforeach
                </ul>
            </li>
            @else
                <a class="dropdown-item" href="{{ route('macro', ['id' => $macro_category->id]) }}">{{ $macro_category->macro_cat }}</a>
            @endif
        @endforeach
        </ul>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Servizi
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('prove') }}">Sala Prove</a>
            <a class="dropdown-item" href="{{ route('riparazioni') }}">Riparazioni</a>
        </div>
    </li>
    @if($logged)
        <li class="nav-item">
            <!--gestire i GET e le route-->
            <a class="nav-link" href="{{ route('wishlist.index') }}">Wishlist <i class="far fa-star"></i></a>
        </li>
    @endif
@stop

@section('login_tab')
        <a class="nav-link active" href="{{ route('user.login') }}">Login/Registrati <i class="fas fa-sign-in-alt"></i></a>
@stop

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active"><a>Login & Registrazione</a></li>
@stop

@section('corpo')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div>
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" href="#login-form" data-toggle="tab">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="#register-form" data-toggle="tab">Registrazione</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="login-form">
                            <form id="login-form" action="{{ route('user.login') }}" class="text-center form-signin" method="post">
                                @csrf
                                <img src="{{ url('/') }}/pics/logoHD.png" width="100" height="100">
                                <div class="form-group">
                                    <input type="text" name="inputUsername" class="form-control my-3" placeholder="Username" required="" oninvalid="this.setCustomValidity('Inserire lo username')" oninput="this.setCustomValidity('')">
                                    <input type="password" name="inputPassword" class="form-control my-3" placeholder="Password" value="" required="" oninvalid="this.setCustomValidity('Inserire la password')" oninput="this.setCustomValidity('')">
                                </div>
                                
                                <div class="form-group">
                                    <input class="btn btn-lg btn-block btn-entra my-3" type="submit" name="login-submit" value="Log In">

                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="register-form">
                            <form class="text-center form-signin" id="register-form" action="{{ route('user.registration') }}" method="post">
                                @csrf
                                <img src="{{ url('/') }}/pics/logoHD.png" width="100" height="100">
                                <div class="form-group">
                                    <input type="text" name="inputUsername" class="form-control my-3" placeholder="Username" required="" value="" oninvalid="this.setCustomValidity('Inserire lo username')" oninput="this.setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="inputEmail" class="form-control my-3" placeholder="Indirizzo e-mail" required="" value="" oninvalid="this.setCustomValidity('Inserire l\'indirizzo e-mail')" oninput="this.setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="inputNome" class="form-control my-3" placeholder="Nome" required="" value="" oninvalid="this.setCustomValidity('Inserire il nome')" oninput="this.setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="inputCognome" class="form-control my-3" placeholder="Cognome" required="" value="" oninvalid="this.setCustomValidity('Inserire il cognome')" oninput="this.setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="inputPassword" class="form-control my-3" placeholder="Password" required="" oninvalid="this.setCustomValidity('Inserire la password')" oninput="this.setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="repeatPassword" class="form-control my-3" placeholder="Ripeti la password" required="" oninvalid="this.setCustomValidity('Ripetere la password')" oninput="this.setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-lg btn-block btn-entra my-3" type="submit" name="register-submit" value="Registrati">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
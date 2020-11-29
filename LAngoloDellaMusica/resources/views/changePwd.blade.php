@extends('layouts.master')

@section('bodyType')
<script>
    function checkPass() {
        if (document.getElementById('newPassword').value ===
                document.getElementById('repeatPassword').value) {
            document.getElementById('message').style.color = "green";
            document.getElementById('message').innerHTML = '<i class="fa fa-thumbs-up"></i> Le password coincidono';
            return true;
        } else {
            document.getElementById('message').style.color = "red";
            document.getElementById('message').innerHTML = '<i class="fa fa-thumbs-down"></i> Le password non coincidono';
            return false;
        }
    }
</script>
@stop

@section('logoutOption')
    @if($logged)
    <div>
        <a class="dropdown-item my-1" href="{{ route('user.logout') }}">Logout <i class="fas fa-sign-out-alt"></i></a>
    </div>
    @endif
@stop

@section('menu_nav')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('info') }}">Info</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            <a class="dropdown-item" href="{{ route('prove') }}">Sala Prove e Studio di Registrazione</a>
            <a class="dropdown-item" href="{{ route('riparazioni') }}">Riparazioni e Modifiche</a>
            <a class="dropdown-item" href="{{ route('corsi') }}">Corsi di Musica</a>
        </div>
    </li>
    @if($logged)
    <li class="nav-item">
        <!--gestire i GET e le route-->
        <a class="nav-link" href="{{ route('wishlist.index') }}">Lista dei Desideri <i class="far fa-star"></i></a>
    </li>
    @endif
@stop

@section('login_tab')
    @if($logged)
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
               aria-haspopup="true" aria-expanded="false">Ciao, {{ $loggedName }}!</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown"> 
                <a class="dropdown-item active" href="{{ route('paginaPersonale') }}">Pagina Personale</a>
                @if (isThisMaster($loggedName))
                    <a class="dropdown-item" href="{{ route('paginaGestione') }}">Pagina Gestione Master</a>
                @endif
            </div>
        </li>
    @else
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.login') }}">Login/Registrati <i class="fas fa-sign-in-alt"></i></a>
        </li>
    @endif
@stop

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active"><a>Modifica Password</a></li>
@stop

@section('corpo')

   <div class="container">
        <header>
            <h1>
                Cambio Password
            </h1>
        </header>
    </div>

    <div class="container">
            <div class="row centra">
                <div class="col-md-6 col-sm-12">
                    <div class="row centra">
                        <div class="col-md-12">
                            <form id="change" action="{{ route('user.cambio') }}" class="text-center form-signin" method="post">
                                @csrf
                                <div class="form-group">
                                    Inserisci la tua password corrente:
                                    <input type="password" id="oldPassword" name="oldPassword" required="" class="form-control my-3" placeholder="Vecchia password" value="" required oninvalid="this.setCustomValidity('Inserire la password')" oninput="this.setCustomValidity('')">
                                    Scegli la tua nuova password:
                                    <input type="password" id="newPassword" name="newPassword" required="" class="form-control my-3" placeholder="Nuova password" required oninvalid="this.setCustomValidity('Inserire la nuova password')" oninput="this.setCustomValidity('')" onkeyup="return checkPass();">
                                    Ripeti la tua nuova password:
                                    <input type="password" id="repeatPassword" name="repeatPassword" required="" class="form-control my-3" placeholder="Ripeti la nuova password" required oninvalid="this.setCustomValidity('Ripetere la password')" oninput="this.setCustomValidity('')" onkeyup="return checkPass();">
                                    <span id="message"></span>
                                </div>
                                
                                <div class="form-group">
                                    <input class="btn btn-lg btn-block btn-entra my-3" type="submit" value="Cambia Password" name="Change-submit" onclick="return confirm('Vuoi davvero cambiare la tua password?');">
                                </div>
                            </form>
                            
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <img src="{{ url('/') }}/pics/logoHD.png" alt="logo" class="img-fluid">
                </div>
            </div>
        </div>
@stop
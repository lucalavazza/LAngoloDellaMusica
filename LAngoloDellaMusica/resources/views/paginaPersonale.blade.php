@extends('layouts.master')

@section('bodyType')
<body>
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
    <a class="nav-link" href="{{ route('wishlist.index') }}">Wishlist <i class="far fa-star"></i></a>
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
        <a class="dropdown-item" href="{{ route('user.logout') }}">Logout <i class="fas fa-sign-out-alt"></i></a>
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
<li class="breadcrumb-item active"><a>Pagina Personale</a></li>
@stop

@section('corpo')

<div class="container">
    <header>
        <h1>
            Pagina personale di {{ $username }}
        </h1>
    </header>
</div>
<div class="container">
    <div class="row centra">
        <div class="col-md-6 col-sm-12">
            <div class="row centra">
                <div class="col-md-12">
                    <table class="table table-responsive" style="width: 100%">
                        <tbody>
                            <tr class="table-light">
                                <td class="align-middle" style="font-weight: bold">
                                    Nome:
                                </td>
                                <td class="align-middle">
                                    {{ $nome }}
                                </td>
                            </tr>
                            <tr class="table-light">
                                <td class="align-middle" style="font-weight: bold">
                                    Cognome:
                                </td>
                                <td class="align-middle">
                                    {{ $cognome }}
                                </td>
                            </tr>
                            <tr class="table-light">
                                <td class="align-middle" style="font-weight: bold">
                                    Mail:
                                </td>
                                <td class="align-middle">
                                    {{ $mail }}
                                </td>
                            </tr>
                            <tr class="table-light">
                                <td class="align-middle" style="font-weight: bold">
                                    Username:
                                </td>
                                <td class="align-middle">
                                    {{ $username }}
                                </td>
                            </tr>
                            <tr class="table-light">
                                <td class="align-middle" style="font-weight: bold">
                                    <a class="d-none d-md-block bottone bottone_entra bold" href="{{ route('cambioPassword') }}">Modifica la tua password</a>
                                </td>
                            </tr>
                            @if (!(isThisMaster($loggedName)))
                            <tr class="table-light">
                                <td class="align-middle" style="font-weight: bold">
                                    <form id="delete" action="{{ route('deleteUser') }}" method="get">
                                        @csrf
                                        <input class="d-none d-md-block bottone bottone_elimina bold" style="width: 100%; clear: both; float: left;" type="submit" value="Elimina il tuo account" name="Change-submit" onclick="return confirmDelete()"> <!--devo mandare ad una route che mi invoca un controller, che mi invoca un metodo di DL che mi elimina l'account-->
                                    </form>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <img src="{{ url('/') }}/pics/logoHD.png" alt="logo" class="img-fluid">
        </div>
    </div>
</div>
@stop
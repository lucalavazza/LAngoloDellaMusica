@extends('layouts.master')

@section('bodyType')
<body>
@stop

@section('menu_nav')
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('home') }}">Home</a>
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
    <li class="nav-item">
        <!--gestire i GET e le route-->
        <a class="nav-link" href="{{ route('wishlist.index') }}">Wishlist <i class="far fa-star"></i></a>
    </li>
@stop

@section('login_tab')
    @if($logged)
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
               aria-haspopup="true" aria-expanded="false">Ciao, {{ $loggedName }}!</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">  
                <a class="dropdown-item" href="{{ route('paginaPersonale') }}">Pagina Personale</a>
                @if (isThisMaster($loggedName))
                    <a class="dropdown-item" href="{{ route('paginaGestione') }}">Pagina Gestione Master</a>
                @endif
                <a class="dropdown-item" href="{{ route('user.logout') }}">Logout <i class="fas fa-sign-out-alt"></i></a>
            </div>
        </li>
    @else
        <a class="nav-link" href="{{ route('user.login') }}">Login/Registrati <i class="fas fa-sign-in-alt"></i></a>
    @endif
@stop

@section('breadcrumb')
    <li class="breadcrumb-item active"><a>Home</a></li>
@stop

@section('corpo')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <img src="{{ url('/') }}/pics/logoHD.png" alt="logo" class="img-fluid">
            </div>
            <div class="col-md-6 col-sm-12 centra">
                <p class="text-center">Dal 2015, L'Angolo della Musica è diventato un punto di riferimento per professionisti ed appassionati di musica.<br>Disponiamo di una grande varietà di strumenti musicali, metodi e spartiti, accessori e molto altro.<br>
                    Il sito e la pagina Facebook vengono costantemente aggiornati con nuovi prodotti, offerte speciali ed eventi.</p>
            </div>
        </div>
    </div>
@stop
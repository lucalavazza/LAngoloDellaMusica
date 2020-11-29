@extends('layouts.master')

@section('bodyType')
<body>
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
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Servizi
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item active" href="{{ route('prove') }}">Sala Prove e Studio di Registrazione</a>
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
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
               aria-haspopup="true" aria-expanded="false">Ciao, {{ $loggedName }}!</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">  
                <a class="dropdown-item" href="{{ route('paginaPersonale') }}">Pagina Personale</a>
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
    <li class="breadcrumb-item active"><a>Sala Prove</a></li>
@stop

@section('corpo')
    <div class="container">
        <div class="row centra">
            <div class="col-md-6 col-sm-12">
                <h2>Sala Prove</h2>
                <p>
                    All'interno del negozio è presente una struttura climatizzata che garantisce alle band di trovare uno spazio accogliente con strumentazione professionale per le prove, ma anche ai singoli di studiare o suonare il proprio strumento in totale libertà.<br>
                    E' possibile riservare la propria sessione contattandoci telefonicamente, via mail o Whatsapp.
                </p>
                
                <h3>
                    Strumentazione:
                </h3>
                <ul>
                    <li>Batteria DW Design Series</li>
                    <li>Combo Chitarra Fender deVille 4x10</li>
                    <li>Testata Chitarra Marshall JCM900 + Cassa Jad&Frèer 1x12</li>
                    <li>Testata basso GR One + Cassa GR 210L</li>
                    <li>Impianto Audio dB DVX</li>
                    <li>Mixer Mackie ProFX10 V3</li>
                </ul>
                
                <h2>Studio di Registrazione</h2>
                <p>
                    La sala può essere adibita a studio di registrazione con regia esterna dedicata e strumentazione professionale, per registrare e produrre tutti i brani che vuoi.
                </p>
            </div>
            <div class="col-md-6">
                <img src="pics/salaprove.jpg" alt="sala" class="img-fluid rounded mx-auto d-block img-thumbnail">
            </div>
        </div>
    </div>
@stop
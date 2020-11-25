@extends('layouts.master')

@section('bodyType')
<body>
@stop

@section('menu_nav')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('info') }}">Info</a>
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
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.login') }}">Login/Registrati <i class="fas fa-sign-in-alt"></i></a>
        </li>
    @endif
@stop

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active"><a>Info</a></li>
@stop

@section('corpo')
    <div class="container">
        <div class="row centra">
            <div class="col-md-6 col-sm-12">
                <h2>Chi siamo</h2>
                <p class="testo">
                    Molto più di un semplice negozio di strumenti musicali.<br>
                    L’idea alla base di questa nuova realtà è quella di introdurre il Musicista in uno spazio intimo e accogliente, all’interno del quale egli potrà vedere soddisfatta qualsiasi esigenza relativa al mondo della Musica.<br>
                    Oltre alla vendita al dettaglio è infatti possibile usufruire di svariati tipi di servizi:
                </p>
                <ul class="testo">
                    <li>Assistenza pre- e post-vendita</li>
                    <li>Riparazioni e modifiche</li>
                    <li>Sala prove</li>
                    <li>Studio di registrazione</li>
                    <li>Corsi di musica</li>
                </ul>
                <p class="testo">
                    ​Grazie alla collaborazione con tecnici specializzati e selezionati tra i migliori della provincia siamo in grado di fornire servizi di assistenza e riparazione su qualsiasi genere di strumento e attrezzatura musicale, dai piccoli ai grandi interventi.<br>
                    La presenza di una struttura di 40mq interna al negozio garantisce alle varie band di trovare uno spazio accogliente con strumentazione professionale per le prove, ma anche ai singoli di studiare o suonare il proprio strumento in totale libertà.<br>
                    Lo studio di registrazione, gestito da professionisti del settore, permette di produrre, arrangiare, registrare, mixare e masterizzare i propri progetti con il massimo della qualità a prezzi contenuti.<br>
                    E’ inoltre possibile iscriversi a corsi di musica rivolti a bambini, ragazzi e adulti di ogni età, per principianti o perfezionamento.<br>
                </p>
                <p>
                    Per ogni informazione sui prodotti ed i servizi offerti, non esitare a contattarci telefonicamente, via mail o tramite Whatsapp.<br>
                    In alternativa ti aspettiamo in negozio: trovi l'indirizzo e gli orari di apertura qui sotto!
                </p>
            </div>
            <div class="col-md-6">
                <img src="pics/piab3.jpeg" alt="about1" class="img-fluid rounded mx-auto d-block img-thumbnail">
                <img src="pics/piab5.jpeg" alt="about2" class="img-fluid rounded mx-auto d-block img-thumbnail">
            </div>
        </div>
    </div>
@stop
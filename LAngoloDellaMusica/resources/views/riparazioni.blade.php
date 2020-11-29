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
            <a class="dropdown-item" href="{{ route('prove') }}">Sala Prove e Studio di Registrazione</a>
            <a class="dropdown-item active" href="{{ route('riparazioni') }}">Riparazioni e Modifiche</a>
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
    <li class="breadcrumb-item active"><a>Riparazioni</a></li>
@stop

@section('corpo')
    <div class="container">
        <div class="row centra">
            <div class="col-md-6 col-sm-12">
                <h2>Riparazioni e Modifiche</h2>
                <p class="testo">
                    Grazie alla collaborazione con tecnici specializzati e selezionati tra i migliori della provincia siamo in grado di fornire servizi di assistenza e riparazione su qualsiasi genere di strumento e attrezzatura musicale, dai piccoli ai grandi interventi.
                </p>
                <ul>
                    <li><h5>Chitarre e Bassi</h5>
                        <p>Cambio corde, accordatura, set up, riparazione danni, restauri e modifiche su qualsiasi strumento.</p>
                    </li>
                    <li><h5>Batterie e Percussioni</h5>
                        <p>Cambio pelli, accordatura, regolazioni e manutenzione di batterie, strumenti a percussione e accessori</p>
                    </li>
                    <li><h5>Strumenti a Fiato</h5>
                        <p>Riparazioni, revisioni e tutto quanto necessario grazie alla grande esperienza e professionalità dei nostri tecnici specializzati.</p>
                    </li>
                    <li><h5>Strumenti ad Arco</h5>
                        <p>Cambio corde, accordatura, set up, riparazione danni, restauri e tutto quanto necessario per una messa a punto ottimale.</p>
                    </li>
                    <li><h5>Luci, P.A. e Strumenti Elettronici </h5>
                        <p>Riparazioni, assistenza, modifiche e qualsiasi altro genere di intervento necessario per qualsiasi attrezzatura.</p>
                    </li>
                </ul>
                <p class="testo">
                    Se hai bisogno di assistenza sul tuo strumento, non esitare a contattarci telefonicamente, via mail, o tramite Whatsapp.
                </p>
            </div>
            <div class="col-md-6">
                <img src="pics/piab7.jpeg" alt="riparazione" style="width: 63%" class="img-fluid rounded mx-auto d-block img-thumbnail">
            </div>
        </div>
    </div>
@stop
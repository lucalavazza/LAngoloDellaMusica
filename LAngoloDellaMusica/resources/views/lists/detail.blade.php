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
    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Categorie
    </a>
    <ul class="dropdown-menu multi-level" aria-labelledby="navbarDropdown">
        @foreach($macro_categories_list as $macro_category)
        @if(hasSubCats($macro_category->id))
        <li class="dropdown-submenu">
            @if($macro_category->id == $prod->macro_categories_id)
            <a class="dropdown-item active" href="{{ route('macro', ['id' => $macro_category->id]) }}">{{ $macro_category->macro_cat }}</a>
            @else 
            <a class="dropdown-item" href="{{ route('macro', ['id' => $macro_category->id]) }}">{{ $macro_category->macro_cat }}</a>
            @endif
            <ul class="dropdown-menu">
                @foreach ($categories_list as $category)
                @if($category->macro_categories_id == $macro_category->id)
                @if($category->id == $prod->specific_categories_id)
                <a class="dropdown-item active" href="{{ route('spec', ['id' => $category->id]) }}">{{ $category->specific_cat }}</a>
                @else
                <a class="dropdown-item" href="{{ route('spec', ['id' => $category->id]) }}">{{ $category->specific_cat }}</a>
                @endif
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
<li class="breadcrumb-item"><a href="{{ route('macro', ['id' => $prod->macro_categories_id]) }}">{{$prod->macro_categories_name}}</a></li>
<li class="breadcrumb-item"><a href="{{ route('spec', ['id' => $prod->specific_categories_id]) }}">{{$prod->specific_categories_name}}</a></li>
<li class="breadcrumb-item active"><a>{{$prod->brand}} {{$prod->model}}</a></li>
@stop

@section('corpo')
<div class="container">
    <div class="row centra">
        <div class="col-md-6 col-sm-12">
            <!--                    <div id="slide-immagini" class="carousel slide" data-ride="carousel" data-pause="hover" data-interval="8000">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class = "img-fluid rounded mx-auto img-slide d-block" src ="{{ url('/') }}/{{$prod->pic}}">
                                        </div>
                                        <div class="carousel-item">
                                            <img class = "img-fluid rounded mx-auto img-slide d-block" src ="{{ url('/') }}/{{$prod->pic}}">
                                        </div>
                                        <div class="carousel-item">
                                            <img class = "img-fluid rounded mx-auto img-slide d-block" src ="{{ url('/') }}/{{$prod->pic}}">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#slide-immagini" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#slide-immagini" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>-->
            <img class = "img-fluid rounded mx-auto img-slide d-block" src ="{{ url('/') }}/{{$prod->pic}}">
        </div>
        <div class="col-md-6 col-sm-12 align-middle">
            <div class="row">
                <div class="col-md-12 centra">
                @if($logged)
                    @if($master)
                    <form id="formRemove{{$prod->id}}" class="formRemove" action="{{ route('deleteProduct', ['id' => $prod->id]) }}" method="get">
                        @csrf
                        <input class="d-none d-md-block bottone bottone_elimina bold Field" style="width: 100%; clear: both; float: left;" type="submit" value="Elimina" name="Change-submit" onclick="confirmDeleteProduct()"> <!--devo mandare ad una route che mi invoca un controller, che mi invoca un metodo di DL che mi elimina l'account-->
                    </form>
                    @endif
                @endif
                </div>
            </div>
            <div class="row">
                <p></p>
            </div>
            <div class="row">
                <div class="col-md-12 centra">
                    @if($logged)
                    @if($siono)
                    <form id="formRemove{{$prod->id}}" class="formRemove" action="{{ route('wishlist.deletePost') }}" method="post">
                        @csrf
                        <input type="hidden" id="valore" value="{{ $prod->id }}" name="removeWishlist">
                        <button class="d-none d-md-block bottone bottone_elimina bold" id="bottoneRemove" type="submit">Lista dei Desideri <i class="fas fa-trash-alt"></i></button>
                        <button class="bottone-tab-dettaglio d-md-none bottone bottone_elimina bold" id="bottoneRemove" type="submit"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    @else
                    <form id="formAdd{{$prod->id}}" class="formAdd" action="{{ route('wishlist.addPost') }}" method="post">
                        @csrf
                        <input type="hidden" id="valore" value="{{ $prod->id }}" name="addWishlist">
                        <button class="d-none d-md-block bottone bottone_wishlist bold" id="bottoneAdd" type="submit">Lista dei Desideri <i class="far fa-star"></i></button>
                        <button class="bottone-tab-dettaglio d-md-none bottone bottone_wishlist bold" id="bottoneAdd" type="submit"><i class="far fa-star"></i></button>
                    </form>
                    @endif
                    @else
                    <a class="d-none d-md-block bottone bottone_wishlist_disabled bold" onclick="loginAlert()">Lista dei Desideri <i class="fas fa-minus-circle"></i></a>
                    <a class="bottone-tab_disabled d-md-none bottone bottone_wishlist bold_disabled" onclick="loginAlert()"><i class="fas fa-minus-circle"></i></a>
                    @endif
                </div>
            </div>
            <div class="row centra">
                <div class="col-md-12">
                    <table class="table table-responsive" style="width: 100%">
                        <tbody>
                            <tr class="table-light">
                                <td class="align-middle">
                                    Marca:
                                </td>
                                <td class="align-middle">
                                    {{$prod->brand}}
                                </td>
                            </tr>
                            <tr class="table-light">
                                <td class="align-middle">
                                    Modello:
                                </td>
                                <td class="align-middle">
                                    {{$prod->model}}
                                </td>
                            </tr>
                            <tr class="table-light">
                                <td class="align-middle">
                                    Colore:
                                </td>
                                <td class="align-middle">
                                    {{$prod->color}}
                                </td>
                            </tr>
                            <tr class="table-light">
                                <td class="align-middle">
                                    Prezzo:
                                </td>
                                <td class="align-middle">
                                    {{$prod->price}}€
                                </td>
                            </tr>
                            <tr class="table-light">
                                <td class="align-middle">
                                    Condizione:
                                </td>
                                <td class="align-middle">
                                    {{$prod->status}}
                                </td>
                            </tr>
                            <tr class="table-light">
                                <td class="align-middle">
                                    Altre informazioni:
                                </td>
                                <td class="align-middle">
                                    <script>
                                        function leave() {
                                            if (confirm("Sei sicuro di voler uscire da questo sito? Verrai reindirizzato ad un sito esterno.")) {
                                                window.open('{{$prod->info}}');
                                            }
                                        }
                                    </script>
                                    <a class="bottone bottone_entra bold" href="" onclick="leave()">Vai <i class="fas fa-guitar"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
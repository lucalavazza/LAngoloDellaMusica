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
<li class="nav-item">
    <a class="nav-link active" href="{{ route('wishlist.index') }}">Wishlist <i class="far fa-star"></i></a>
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
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active"><a href="{{ route('wishlist.index') }}">Wishlist</a></li>
@stop

@section('corpo')

<div class="container">
    <header>
        <h1>
            Wishlist
        </h1>
    </header>
</div>

<div class="container">
    <div class="row centra">
        <div class="col-md-12">
            @if ($messaggio)
            <div class="card bg-light text-center mb-3">
                <div class="card-header" >
                    Informazione:
                </div>
                <div class="card-body">
                    <p class="card-text my-4">I seguenti prodotti non sono più disponibili: {{ $messaggio }}</p>
                    <a class="d-none d-md-block bottone" style="background-color: #F8F9FA" href="{{ route('wishlist.capito') }}">Ok <i class="far fa-check-circle"></i></a>
                </div>
            </div>
            @endif
        </div>
        <div class="col-md-12">
            @if (!($wishl->count()))
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="card card-errore text-center mb-3">
                            <div class="card-header card-errore-header text-white" >
                                Attenzione!
                            </div>
                            <div class="card-body">
                                <p class="card-text my-4">Non ci sono ancora prodotti nella tua Wishlist!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <table id="myTabella" class="table table-responsive" style="width: 100%">
                <thead>
                    <tr>
                        <th class="foto-tab d-none d-lg-table-cell" scope="col"></th>
                        <th class="titolo-tab modello-tab" scope="col">Modello</th>
                        <th class="titolo-tab d-none d-md-table-cell text-center" scope="col">Prezzo</th>
                        <th class="titolo-tab d-none d-md-table-cell text-center" scope="col">Condizione</th>
                        <th class="bottone-tab" scope="col"></th>
                        <th class="bottone-tab" scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allprods as $product)    
                    @foreach ($wishl as $wprod)
                    @if($product->id == $wprod->products_id)
                    <tr>
                        <td class="d-none d-lg-table-cell align-middle">
                            <img src="{{ url('/') }}/{{$product->pic}}" class="img-fluid rounded mx-auto d-block img-thumbnail img-thumbnail-lista">
                        </td>
                        <td class="modello-tab bold align-middle">
                            {{$product->brand}} {{$product->model}}
                        </td>
                        <td class="d-none d-md-table-cell align-middle text-center">
                            {{$product->price}}€
                        </td>
                        <td class="d-none d-md-table-cell align-middle text-center">
                            {{$product->status}}
                        </td>
                        <td class="align-middle text-center">
                            <a class="d-none d-md-block bottone bottone_entra bold" href="{{ route('dettaglio', ['id' => $product->id]) }}">Dettagli<i class="fas fa-info"></i></a>
                            <a class="bottone-tab d-md-none bottone bottone_entra bold" href="{{ route('dettaglio', ['id' => $product->id]) }}"><i class="fas fa-info"></i></a>
                        </td>
                        <td class="align-middle text-center">
                            <form id="formRemove{{$product->id}}" class="formRemove" action="{{ route('wishlist.deletePost') }}" method="post">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="removeWishlist">
                                <button class="d-none d-md-block bottone bottone_elimina bold" type="submit">Wishlist<i class="fas fa-trash-alt"></i></button>
                                <button class="bottone-tab-dettaglio d-md-none bottone bottone_elimina bold" type="submit"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    @endforeach   
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
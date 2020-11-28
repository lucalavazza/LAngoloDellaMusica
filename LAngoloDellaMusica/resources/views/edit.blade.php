@extends('layouts.master')


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
        <a class="dropdown-item" href="{{ route('paginaPersonale') }}">Pagina Personale</a>
        @if (isThisMaster($loggedName))
        <a class="dropdown-item active" href="{{ route('paginaGestione') }}">Pagina Gestione Master</a>
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
<li class="breadcrumb-item active"><a>Pagina di Gestione</a></li>
@stop

@section('corpo')
<div class="container">
    <div class="row centra">
        <div class="col-sm-12">
            <div class="row centra">

                <div class="container">
                    <div class="card my-3" style="border-color: #458045">
                        <div class="container">
                            <select style="border-color: #458045" class="browser-default custom-select my-3" name="prodotto">
                                @foreach($products_list as $product)
                                <option value="{{$product->model}}">{{$product->model}}</option>
                                @endforeach
                            </select>

                            <h3 class="my-3" style="font-weight: bold; color: #458045"> Modifica un prodotto </h3>
                            <form enctype="multipart/form-data" class="form-cgroup" id="form-modifica" action="{{route('paginaGestione.confirmEdit')}}" method="post" name="edit">
                                @csrf
                                <div class="form-group">
                                    <input style="border-color: #458045" type="text" class="form-control my-3" placeholder="Modello" name="modello" value="{{$product->model}}" required="">
                                    <input style="border-color: #458045" type="text" class="form-control my-3" placeholder="Colore" name="colore" required="">
                                    <input style="border-color: #458045" type="number" class="form-control my-3" placeholder="Prezzo" name="prezzo" required="">
                                    <select style="border-color: #458045" class="browser-default custom-select my-3" name="condizione">
                                        <option value="Nuovo">Nuovo</option>
                                        <option value="Usato">Usato</option>
                                    </select>
                                    <input style="border-color: #458045" type="text" class="form-control my-3" placeholder="Sito Web" name="sitoweb" required="">
                                    <p style="color: #458045">
                                        Aggiungi foto: 
                                    </p>
                                    <input style="border-color: #458045" type="file" name="path" id="upload1" class="upload" multiple="multiple" required="">
                                </div>
                                <div class="form-group">
                                    <label for="mySubmit" class="bottone bottone_wishlist bold mt-3"><i class="fa fa-pencil"></i> Modifica il prodotto</label>
                                    <input type="submit" id="mySubmit" value="save" class="invisible"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
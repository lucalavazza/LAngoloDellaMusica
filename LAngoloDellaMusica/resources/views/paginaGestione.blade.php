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
        @if(hasSubCats($macro_category->macro_cat))
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
    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
       aria-haspopup="true" aria-expanded="false">Ciao, {{ $loggedName }}!</a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">  
        <a class="dropdown-item" href="{{ route('paginaPersonale') }}">Pagina Personale</a>
        @if (isThisMaster($loggedName))
        <a class="dropdown-item active" href="{{ route('paginaGestione') }}">Pagina Gestione Master</a>
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
<li class="breadcrumb-item active"><a>Pagina di Gestione</a></li>
@stop

@section('corpo')
<script type="text/javascript">
    function abilitareCategoria() {
        if (document.getElementById("seleziona-categoria").value === 0) {
            document.getElementById("nuova-categoria").disable = "true";
        } else {
            document.getElementById("nuova-categoria").disable = "false";
        }
    }
    function abilitareSottoCategoria() {
        if (document.getElementById("seleziona-sottocategoria").value === 0) {
            document.getElementById("nuova-sottocategoria").disable = "true";
        } else {
            document.getElementById("nuova-sottocategoria").disable = "false";
        }
    }
</script>
<div class="container">
    <div class="row centra">
        <div class="col-sm-12">
            <div class="row centra">

                <div class="container">
                    <div class="card my-3" style="border-color: #458045">
                        <div class="container">

                            <h3 class="my-3" style="font-weight: bold; color: #458045"> Aggiungi un nuovo prodotto </h3>
                            <form>
                                @csrf
                                <div class="form-group">
                                    <select style="border-color: #458045" class="browser-default custom-select my-3" id="seleziona-categoria" onChange="abilitareCategoria();">
                                        <option selected value="0">Categoria già esistente</option>
                                        <option value="1">Nuova Categoria</option>
                                    </select>
                                    <input id="nuova-categoria" style="border-color: lightgray" type="text" class="form-control" placeholder="Nuova Categoria" required="">
                                    <select style="border-color: #458045" class="browser-default custom-select my-3" id="seleziona-sottocategoria" onChange="abilitareSottoCategoria();">
                                        <option selected value="0">Sottocategoria già esistente</option>
                                        <option value="1">Nuova sottocategoria</option>
                                    </select>
                                    <input id="nuova-sottocategoria" style="border-color: lightgray" type="text" class="form-control my-3" placeholder="Nuova Sottocategoria" required="">
                                    <input style="border-color: #458045" type="text" class="form-control my-3" placeholder="Marca" required="">
                                    <input style="border-color: #458045" type="text" class="form-control my-3" placeholder="Modello" required="">
                                    <input style="border-color: #458045" type="text" class="form-control my-3" placeholder="Colore" required="">
                                    <input style="border-color: #458045" type="text" class="form-control my-3" placeholder="Prezzo" required="">
                                    <input style="border-color: #458045" type="text" class="form-control my-3" placeholder="Condizione" required="">
                                    <input style="border-color: #458045" type="text" class="form-control my-3" placeholder="Sito Web" required="">
                                    <p style="color: #458045">
                                        Aggiungi foto: 
                                    </p>
                                    <input style="border-color: #458045" type="file" name="upload1" id="upload1" class="upload" multiple="multiple" placeholder="Sito Web" required="">
                                </div>
                                <div class="form-group">
                                    <input class="bottone bottone_wishlist bold mt-3" type="submit" name="login-submit" value="Inserisci il prodotto">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="card my-3" style="border-color: #b58d51">
                        <div class="container">
                            <h3 class="my-3" style="font-weight: bold; color: #b58d51"> Modifica un prodotto </h3>
                            <form>
                                @csrf
                                <div class="form-group">
                                    <select style="border-color: #b58d51" class="browser-default custom-select my-3">
                                        <option selected>Chitarre</option>
                                        <option value="1">Poi</option>
                                        <option value="2">Qui</option>
                                        <option value="3">Sistemo</option>
                                    </select>
                                    <select style="border-color: #b58d51" class="browser-default custom-select my-3">
                                        <option selected>Chitarre elettriche</option>
                                        <option value="1">Poi</option>
                                        <option value="2">Qui</option>
                                        <option value="3">Sistemo</option>
                                    </select>
                                    <select style="border-color: #b58d51" class="browser-default custom-select my-3">
                                        <option selected>Fender</option>
                                        <option value="1">Poi</option>
                                        <option value="2">Qui</option>
                                        <option value="3">Sistemo</option>
                                    </select>
                                    <select style="border-color: #b58d51" class="browser-default custom-select my-3">
                                        <option selected>Telecaster American Ultra</option>
                                        <option value="1">Poi</option>
                                        <option value="2">Qui</option>
                                        <option value="3">Sistemo</option>
                                    </select>
                                    <select style="border-color: #b58d51" class="browser-default custom-select my-3">
                                        <option selected>Prezzo</option>
                                        <option value="1">Poi</option>
                                        <option value="2">Qui</option>
                                        <option value="3">Sistemo</option>
                                    </select>
                                    <input style="border-color: #b58d51" type="text" class="form-control my-3" placeholder="Inserisci il nuovo valore" required="">
                                </div>
                                <div class="form-group">
                                    <input class="bottone bottone_entra bold mt-3" type="submit" name="login-submit" value="Procedi alla modifica">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="card my-3" style="border-color: #c44835">
                        <div class="container">
                            <h3 class="my-3" style="font-weight: bold; color: #c44835"> Elimina un prodotto </h3>
                            <form>
                                @csrf
                                <div class="form-group">
                                    <select style="border-color: #c44835" class="browser-default custom-select my-3">
                                        <option selected>Chitarre</option>
                                        <option value="1">Poi</option>
                                        <option value="2">Qui</option>
                                        <option value="3">Sistemo</option>
                                    </select>
                                    <select style="border-color: #c44835" class="browser-default custom-select my-3">
                                        <option selected>Chitarre elettriche</option>
                                        <option value="1">Poi</option>
                                        <option value="2">Qui</option>
                                        <option value="3">Sistemo</option>
                                    </select>
                                    <select style="border-color: #c44835" class="browser-default custom-select my-3">
                                        <option selected>Fender</option>
                                        <option value="1">Poi</option>
                                        <option value="2">Qui</option>
                                        <option value="3">Sistemo</option>
                                    </select>
                                    <select style="border-color: #c44835" class="browser-default custom-select my-3">
                                        <option selected>Telecaster American Ultra Blue</option>
                                        <option value="1">Poi</option>
                                        <option value="2">Qui</option>
                                        <option value="3">Sistemo</option>
                                    </select>
                                    <input class="bottone bottone_elimina bold mt-3" type="submit" name="login-submit" value="Procedi all'eliminazione">
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
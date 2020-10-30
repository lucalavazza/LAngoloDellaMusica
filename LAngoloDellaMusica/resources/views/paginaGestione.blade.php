@extends('layouts.master')

@section('bodyType')
<body onload="document.getElementById('Chitarre').style.display = 'none';
        document.getElementById('Bassi').style.display = 'none';
        document.getElementById('Fiati').style.display = 'none';
        document.getElementById('Batterie e Percussioni').style.display = 'none';
        document.getElementById('Tastiere').style.display = 'none';
        document.getElementById('Studio e Registrazione').style.display = 'none';
        document.getElementById('Audio Pro e Luci').style.display = 'none';
        document.getElementById('Strumenti Tradizionali').style.display = 'none';
        document.getElementById('Tradizionali').style.display = 'none';
        document.getElementById('Chitarre-delete').style.display = 'none';
        document.getElementById('Bassi-delete').style.display = 'none';
        document.getElementById('Fiati-delete').style.display = 'none';
        document.getElementById('Batterie e Percussioni-delete').style.display = 'none';
        document.getElementById('Tastiere-delete').style.display = 'none';
        document.getElementById('Studio e Registrazione-delete').style.display = 'none';
        document.getElementById('Audio Pro e Luci-delete').style.display = 'none';
        document.getElementById('Strumenti Tradizionali-delete').style.display = 'none';
        document.getElementById('Tradizionali-delete').style.display = 'none';">
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
<script>
    function Categoria() {
        document.getElementById("seleziona-categoria-esistente");
        var valore = document.getElementById("seleziona-categoria-esistente").value;
        if (valore == 1) {
            document.getElementById("Chitarre").style.display = "block";
            document.getElementById("Bassi").style.display = "none";
            document.getElementById("Fiati").style.display = "none";
            document.getElementById("Batterie e Percussioni").style.display = "none";
            document.getElementById("Tastiere").style.display = "none";
            document.getElementById("Studio e Registrazione").style.display = "none";
            document.getElementById("Audio Pro e Luci").style.display = "none";
            document.getElementById("Strumenti Tradizionali").style.display = "none";
            document.getElementById("Accessori").style.display = "none";
        } else if (valore == 2) {
            document.getElementById("Chitarre").style.display = "none";
            document.getElementById("Bassi").style.display = "block";
            document.getElementById("Fiati").style.display = "none";
            document.getElementById("Batterie e Percussioni").style.display = "none";
            document.getElementById("Tastiere").style.display = "none";
            document.getElementById("Studio e Registrazione").style.display = "none";
            document.getElementById("Audio Pro e Luci").style.display = "none";
            document.getElementById("Strumenti Tradizionali").style.display = "none";
            document.getElementById("Accessori").style.display = "none";
        } else if (valore == 5) {
            document.getElementById("Chitarre").style.display = "none";
            document.getElementById("Bassi").style.display = "none";
            document.getElementById("Fiati").style.display = "block";
            document.getElementById("Batterie e Percussioni").style.display = "none";
            document.getElementById("Tastiere").style.display = "none";
            document.getElementById("Studio e Registrazione").style.display = "none";
            document.getElementById("Audio Pro e Luci").style.display = "none";
            document.getElementById("Strumenti Tradizionali").style.display = "none";
            document.getElementById("Accessori").style.display = "none";
        } else if (valore == 6) {
            document.getElementById("Chitarre").style.display = "none";
            document.getElementById("Bassi").style.display = "none";
            document.getElementById("Fiati").style.display = "none";
            document.getElementById("Batterie e Percussioni").style.display = "block";
            document.getElementById("Tastiere").style.display = "none";
            document.getElementById("Studio e Registrazione").style.display = "none";
            document.getElementById("Audio Pro e Luci").style.display = "none";
            document.getElementById("Strumenti Tradizionali").style.display = "none";
            document.getElementById("Accessori").style.display = "none";
        } else if (valore == 7) {
            document.getElementById("Chitarre").style.display = "none";
            document.getElementById("Bassi").style.display = "none";
            document.getElementById("Fiati").style.display = "none";
            document.getElementById("Batterie e Percussioni").style.display = "none";
            document.getElementById("Tastiere").style.display = "block";
            document.getElementById("Studio e Registrazione").style.display = "none";
            document.getElementById("Audio Pro e Luci").style.display = "none";
            document.getElementById("Strumenti Tradizionali").style.display = "none";
            document.getElementById("Accessori").style.display = "none";
        } else if (valore == 8) {
            document.getElementById("Chitarre").style.display = "none";
            document.getElementById("Bassi").style.display = "none";
            document.getElementById("Fiati").style.display = "none";
            document.getElementById("Batterie e Percussioni").style.display = "none";
            document.getElementById("Tastiere").style.display = "none";
            document.getElementById("Studio e Registrazione").style.display = "block";
            document.getElementById("Audio Pro e Luci").style.display = "none";
            document.getElementById("Strumenti Tradizionali").style.display = "none";
            document.getElementById("Accessori").style.display = "none";
        } else if (valore == 9) {
            document.getElementById("Chitarre").style.display = "none";
            document.getElementById("Bassi").style.display = "none";
            document.getElementById("Fiati").style.display = "none";
            document.getElementById("Batterie e Percussioni").style.display = "none";
            document.getElementById("Tastiere").style.display = "none";
            document.getElementById("Studio e Registrazione").style.display = "none";
            document.getElementById("Audio Pro e Luci").style.display = "block";
            document.getElementById("Strumenti Tradizionali").style.display = "none";
            document.getElementById("Accessori").style.display = "none";
        } else if (valore == 10) {
            document.getElementById("Chitarre").style.display = "none";
            document.getElementById("Bassi").style.display = "none";
            document.getElementById("Fiati").style.display = "none";
            document.getElementById("Batterie e Percussioni").style.display = "none";
            document.getElementById("Tastiere").style.display = "none";
            document.getElementById("Studio e Registrazione").style.display = "none";
            document.getElementById("Audio Pro e Luci").style.display = "none";
            document.getElementById("Strumenti Tradizionali").style.display = "block";
            document.getElementById("Accessori").style.display = "none";
        } else if (valore == 11) {
            document.getElementById("Chitarre").style.display = "none";
            document.getElementById("Bassi").style.display = "none";
            document.getElementById("Fiati").style.display = "none";
            document.getElementById("Batterie e Percussioni").style.display = "none";
            document.getElementById("Tastiere").style.display = "none";
            document.getElementById("Studio e Registrazione").style.display = "none";
            document.getElementById("Audio Pro e Luci").style.display = "none";
            document.getElementById("Strumenti Tradizionali").style.display = "none";
            document.getElementById("Accessori").style.display = "block";
        }
    } //così salvo in valore il value che sarà già quello giusto
    function CategoriaDelete() {
        document.getElementById("seleziona-categoria-esistente-delete");
        if (valore == 1) {
            document.getElementById("Chitarre-delete").style.display = "block";
            document.getElementById("Bassi-delete").style.display = "none";
            document.getElementById("Fiati-delete").style.display = "none";
            document.getElementById("Batterie e Percussioni-delete").style.display = "none";
            document.getElementById("Tastiere-delete").style.display = "none";
            document.getElementById("Studio e Registrazione-delete").style.display = "none";
            document.getElementById("Audio Pro e Luci-delete").style.display = "none";
            document.getElementById("Strumenti Tradizionali-delete").style.display = "none";
            document.getElementById("Accessori-delete").style.display = "none";
        } else if (valore == 2) {
            document.getElementById("Chitarre-delete").style.display = "none";
            document.getElementById("Bassi-delete").style.display = "block";
            document.getElementById("Fiati-delete").style.display = "none";
            document.getElementById("Batterie e Percussioni-delete").style.display = "none";
            document.getElementById("Tastiere-delete").style.display = "none";
            document.getElementById("Studio e Registrazione-delete").style.display = "none";
            document.getElementById("Audio Pro e Luci-delete").style.display = "none";
            document.getElementById("Strumenti Tradizionali-delete").style.display = "none";
            document.getElementById("Accessori-delete").style.display = "none";
        } else if (valore == 5) {
            document.getElementById("Chitarre-delete").style.display = "none";
            document.getElementById("Bassi-delete").style.display = "none";
            document.getElementById("Fiati-delete").style.display = "block";
            document.getElementById("Batterie e Percussioni-delete").style.display = "none";
            document.getElementById("Tastiere-delete").style.display = "none";
            document.getElementById("Studio e Registrazione-delete").style.display = "none";
            document.getElementById("Audio Pro e Luci-delete").style.display = "none";
            document.getElementById("Strumenti Tradizionali-delete").style.display = "none";
            document.getElementById("Accessori-delete").style.display = "none";
        } else if (valore == 6) {
            document.getElementById("Chitarre-delete").style.display = "none";
            document.getElementById("Bassi-delete").style.display = "none";
            document.getElementById("Fiati-delete").style.display = "none";
            document.getElementById("Batterie e Percussioni-delete").style.display = "block";
            document.getElementById("Tastiere-delete").style.display = "none";
            document.getElementById("Studio e Registrazione-delete").style.display = "none";
            document.getElementById("Audio Pro e Luci-delete").style.display = "none";
            document.getElementById("Strumenti Tradizionali-delete").style.display = "none";
            document.getElementById("Accessori-delete").style.display = "none";
        } else if (valore == 7) {
            document.getElementById("Chitarre-delete").style.display = "none";
            document.getElementById("Bassi-delete").style.display = "none";
            document.getElementById("Fiati-delete").style.display = "none";
            document.getElementById("Batterie e Percussioni-delete").style.display = "none";
            document.getElementById("Tastiere-delete").style.display = "block";
            document.getElementById("Studio e Registrazione-delete").style.display = "none";
            document.getElementById("Audio Pro e Luci-delete").style.display = "none";
            document.getElementById("Strumenti Tradizionali-delete").style.display = "none";
            document.getElementById("Accessori-delete").style.display = "none";
        } else if (valore == 8) {
            document.getElementById("Chitarre-delete").style.display = "none";
            document.getElementById("Bassi-delete").style.display = "none";
            document.getElementById("Fiati-delete").style.display = "none";
            document.getElementById("Batterie e Percussioni-delete").style.display = "none";
            document.getElementById("Tastiere-delete").style.display = "none";
            document.getElementById("Studio e Registrazione-delete").style.display = "block";
            document.getElementById("Audio Pro e Luci-delete").style.display = "none";
            document.getElementById("Strumenti Tradizionali-delete").style.display = "none";
            document.getElementById("Accessori-delete").style.display = "none";
        } else if (valore == 9) {
            document.getElementById("Chitarre-delete").style.display = "none";
            document.getElementById("Bassi-delete").style.display = "none";
            document.getElementById("Fiati-delete").style.display = "none";
            document.getElementById("Batterie e Percussioni-delete").style.display = "none";
            document.getElementById("Tastiere-delete").style.display = "none";
            document.getElementById("Studio e Registrazione-delete").style.display = "none";
            document.getElementById("Audio Pro e Luci-delete").style.display = "block";
            document.getElementById("Strumenti Tradizionali-delete").style.display = "none";
            document.getElementById("Accessori-delete").style.display = "none";
        } else if (valore == 10) {
            document.getElementById("Chitarre-delete").style.display = "none";
            document.getElementById("Bassi-delete").style.display = "none";
            document.getElementById("Fiati-delete").style.display = "none";
            document.getElementById("Batterie e Percussioni-delete").style.display = "none";
            document.getElementById("Tastiere-delete").style.display = "none";
            document.getElementById("Studio e Registrazione-delete").style.display = "none";
            document.getElementById("Audio Pro e Luci-delete").style.display = "none";
            document.getElementById("Strumenti Tradizionali-delete").style.display = "block";
            document.getElementById("Accessori-delete").style.display = "none";
        } else if (valore == 11) {
            document.getElementById("Chitarre-delete").style.display = "none";
            document.getElementById("Bassi-delete").style.display = "none";
            document.getElementById("Fiati-delete").style.display = "none";
            document.getElementById("Batterie e Percussioni-delete").style.display = "none";
            document.getElementById("Tastiere-delete").style.display = "none";
            document.getElementById("Studio e Registrazione-delete").style.display = "none";
            document.getElementById("Audio Pro e Luci-delete").style.display = "none";
            document.getElementById("Strumenti Tradizionali-delete").style.display = "none";
            document.getElementById("Accessori-delete").style.display = "block";
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
                            <form enctype="multipart/form-data" class="form-cgroup" id="form-aggiunta" action="{{route('paginaGestione.add')}}" method="post" name="add">
                                @csrf
                                <div class="form-group">
                                    <select style="border-color: #458045" class="browser-default custom-select my-3" id="seleziona-categoria-esistente" name="categoria" onChange="Categoria();">
                                        @foreach($macro_categories_list as $macro_category)
                                        <option value="{{$macro_category->id}}">{{$macro_category->macro_cat}}</option>
                                        @endforeach
                                    </select>
                                    <!--SOTTOCATEGORIE-->
                                    <select style="border-color: #458045" class="browser-default custom-select my-3" name="Chitarre" id="Chitarre">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 1)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #458045" class="browser-default custom-select my-3" name="Bassi" id="Bassi">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 2)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #458045" class="browser-default custom-select my-3" name="Fiati" id="Fiati">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 5)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #458045" class="browser-default custom-select my-3" name="Batterie e Percussioni" id="Batterie e Percussioni">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 6)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #458045" class="browser-default custom-select my-3" name="Tastiere" id="Tastiere">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 7)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #458045" class="browser-default custom-select my-3" name="Studio e Registrazione" id="Studio e Registrazione">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 8)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #458045" class="browser-default custom-select my-3" name="Audio Pro e Luci" id="Audio Pro e Luci">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 9)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #458045" class="browser-default custom-select my-3" name="Strumenti Tradizionali" id="Strumenti Tradizionali">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 10)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #458045" class="browser-default custom-select my-3" name="Accessori" id="Accessori">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 11)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>

                                    <input style="border-color: #458045" type="text" class="form-control my-3" placeholder="Marca" name="marca" required="">
                                    <input style="border-color: #458045" type="text" class="form-control my-3" placeholder="Modello" name="modello" required="">
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
                                    <label for="mySubmit" class="bottone bottone_wishlist bold mt-3"><i class="fa fa-save"></i> Inserisci il prodotto</label>
                                    <input type="submit" id="mySubmit" value="save" class="invisible"/>
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
                            <form enctype="multipart/form-data" class="form-cgroup" id="form-eliminazione" action="{{route('paginaGestione.delete')}}" method="post" name="delete">
                                @csrf
                                <div class="form-group">
                                    <select style="border-color: #c44835" class="browser-default custom-select my-3" id="seleziona-categoria-esistente-delete" name="categoria-delete" onChange="CategoriaDelete();">
                                        @foreach($macro_categories_list as $macro_category)
                                        <option value="{{$macro_category->id}}">{{$macro_category->macro_cat}}</option>
                                        @endforeach
                                    </select>
                                    <!--SOTTOCATEGORIE-->
                                    <select style="border-color: #c44835" class="browser-default custom-select my-3" name="Chitarre-delete" id="Chitarre-delete">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 1)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #c44835" class="browser-default custom-select my-3" name="Bassi-delete" id="Bassi-delete">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 2)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #c44835" class="browser-default custom-select my-3" name="Fiati-delete" id="Fiati-delete">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 5)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #c44835" class="browser-default custom-select my-3" name="Batterie e Percussioni-delete" id="Batterie e Percussioni-delete">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 6)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #c44835" class="browser-default custom-select my-3" name="Tastiere-delete" id="Tastiere-delete">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 7)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #c44835" class="browser-default custom-select my-3" name="Studio e Registrazione-delete" id="Studio e Registrazione-delete">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 8)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #c44835" class="browser-default custom-select my-3" name="Audio Pro e Luci-delete" id="Audio Pro e Luci-delete">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 9)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #c44835" class="browser-default custom-select my-3" name="Strumenti Tradizionali-delete" id="Strumenti Tradizionali-delete">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 10)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #c44835" class="browser-default custom-select my-3" name="Accessori-delete" id="Accessori-delete">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 11)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #c44835" class="browser-default custom-select my-3" name="brand-delete" id="brand-delete">
                                        @foreach($brands_list as $brand)
                                        <option value="{{$brand->brand}}">{{$brand->brand}}</option>
                                        @endforeach
                                    </select>
                                    <select style="border-color: #c44835" class="browser-default custom-select my-3" name="product-delete" id="product-delete">
                                        @foreach($products_list as $product)
                                            @if($product->macro_categories_id == 2)
                                            <option value="{{$product->model}}">{{$product->model}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="form-group">
                                        <label for="mySubmit-delete" class="bottone bottone_elimina bold mt-3"><i class="fa fa-trash"></i> Procedi all'eliminazione</label>
                                        <input type="submit" id="mySubmit-delete" value="delete" class="invisible"/>
                                    </div>
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
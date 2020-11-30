@extends('layouts.master')

@section('logoutOption')
@if($logged)
<div>
    <a class="dropdown-item my-1" href="{{ route('user.logout') }}">Logout <i class="fas fa-sign-out-alt"></i></a>
</div>
@endif
@stop

@section('menu_nav')
<body onload="document.getElementById('Chitarre').style.display = 'none';
        document.getElementById('Chitarre-delete').style.display = 'none';
        document.getElementById('Chitarre-edit').style.display = 'none';
        document.getElementById('Bassi').style.display = 'none';
        document.getElementById('Bassi-delete').style.display = 'none';
        document.getElementById('Bassi-edit').style.display = 'none';
        document.getElementById('Fiati').style.display = 'none';
        document.getElementById('Fiati-delete').style.display = 'none';
        document.getElementById('Fiati-edit').style.display = 'none';
        document.getElementById('Batterie e Percussioni').style.display = 'none';
        document.getElementById('Batterie e Percussioni-delete').style.display = 'none';
        document.getElementById('Batterie e Percussioni-edit').style.display = 'none';
        document.getElementById('Tastiere').style.display = 'none';
        document.getElementById('Tastiere-delete').style.display = 'none';
        document.getElementById('Tastiere-edit').style.display = 'none';
        document.getElementById('Studio e Registrazione').style.display = 'none';
        document.getElementById('Studio e Registrazione-delete').style.display = 'none';
        document.getElementById('Studio e Registrazione-edit').style.display = 'none';
        document.getElementById('Audio Pro e Luci').style.display = 'none';
        document.getElementById('Audio Pro e Luci-delete').style.display = 'none';
        document.getElementById('Audio Pro e Luci-edit').style.display = 'none';
        document.getElementById('Strumenti Tradizionali').style.display = 'none';
        document.getElementById('Strumenti Tradizionali-delete').style.display = 'none';
        document.getElementById('Strumenti Tradizionali-edit').style.display = 'none';">
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
    <a class="nav-link" href="{{ route('wishlist.index') }}">Lista dei Desideri <i class="far fa-star"></i></a>
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
                    @if($erroreFileGrande)
                        <div class="card" style="border-color: #c44835; margin-bottom: 1em">
                            <label class="bold" style="color: #c44835"> Errore di inserimento, file troppo grande! Non caricare file immagini che superino gli 8 MB.</label>
                        </div>
                    @endif
                    @if($modificaSuccesso)
                        <div class="card" style="border-color: #458045; margin-bottom: 1em">
                            <label class="bold" style="color: #458045"> Modifica del prezzo eseguita con successo.</label>
                        </div>
                    @endif
                    <div class="card" style="border-color: #458045; margin-bottom: 3em">
                        <div class="container">

                            <h3 class="my-3" style="font-weight: bold; color: #458045"> Aggiungi un nuovo prodotto </h3>
                            <form enctype="multipart/form-data" class="form-cgroup" id="form-aggiunta" action="{{route('paginaGestione.add')}}" method="post" name="add">
                                @csrf
                                <div class="form-group">
                                    <hr>
                                    <label style="color: #458045">
                                        Categoria:
                                    </label>
                                    <select style="border-color: #458045" class="browser-default custom-select" id="seleziona-categoria-esistente" name="categoria" onChange="Categoria();">
                                        @foreach($macro_categories_list as $macro_category)
                                        <option value="{{$macro_category->id}}">{{$macro_category->macro_cat}}</option>
                                        @endforeach
                                    </select>
                                    <!--SOTTOCATEGORIE-->
                                    <hr> 
                                    <label style="color: #458045">
                                        Sottocategoria:
                                    </label>
                                    <select style="border-color: #458045" class="browser-default custom-select" name="Chitarre" id="Chitarre">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 1)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #458045" class="browser-default custom-select" name="Bassi" id="Bassi">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 2)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #458045" class="browser-default custom-select" name="Fiati" id="Fiati">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 5)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #458045" class="browser-default custom-select" name="Batterie e Percussioni" id="Batterie e Percussioni">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 6)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #458045" class="browser-default custom-select" name="Tastiere" id="Tastiere">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 7)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #458045" class="browser-default custom-select" name="Studio e Registrazione" id="Studio e Registrazione">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 8)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #458045" class="browser-default custom-select" name="Audio Pro e Luci" id="Audio Pro e Luci">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 9)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #458045" class="browser-default custom-select" name="Strumenti Tradizionali" id="Strumenti Tradizionali">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 10)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #458045" class="browser-default custom-select" name="Accessori" id="Accessori">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 11)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <hr>
                                    <label style="color: #458045">
                                        Marca:
                                    </label>
                                    <input style="border-color: #458045" type="text" class="form-control" placeholder="Marca" name="marca" required="">
                                    <hr>
                                    <label style="color: #458045">
                                        Modello:
                                    </label>
                                    <input style="border-color: #458045" type="text" class="form-control" placeholder="Modello" name="modello" required="">
                                    <hr>
                                    <label style="color: #458045">
                                        Colore:
                                    </label>
                                    <input style="border-color: #458045" type="text" class="form-control" placeholder="Colore" name="colore" required="">
                                    <hr>
                                    <label style="color: #458045">
                                        Prezzo:
                                    </label>
                                    <input style="border-color: #458045" type="number" min="1" class="form-control" placeholder="Prezzo" name="prezzo" required="">
                                    <hr>
                                    <label style="color: #458045">
                                        Condizione:
                                    </label>
                                    <select style="border-color: #458045" class="browser-default custom-select" name="condizione">
                                        <option value="Nuovo">Nuovo</option>
                                        <option value="Usato">Usato</option>
                                    </select>
                                    <hr>
                                    <label style="color: #458045">
                                        Sito Web:
                                    </label>
                                    <input style="border-color: #458045" type="url" class="form-control" placeholder="Sito Web" name="sitoweb" required="">
                                    <hr>
                                    <label style="color: #458045">
                                        Aggiungi foto (in formato JPG o PNG, <b>di dimensione inferiore a 8MB</b>):  
                                    </label>
                                    <input style="border-color: #458045" type="file" name="path" id="file" class="upload" required="" accept="image/png, image/jpeg">
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="mySubmit" class="bottone bottone_wishlist bold mt-3"><i class="fa fa-save"></i> Inserisci il prodotto</label>
                                    <input type="submit" id="mySubmit" value="save" class="invisible"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="container" style="border-color: #458045; margin-bottom: 3em">
                    <div class="card" style="border-color: #458045">
                        <div class="container">
                            <h3 class="my-3" style="font-weight: bold; color: #458045"> Modifica il prezzo di un prodotto</h3>
                            <label class="bold" style="font-weight: bold; color: #458045"> Seleziona categoria e sottocategoria per passare alla pagina di modifica</label>
                            <form enctype="multipart/form-data" class="form-cgroup" id="form-modifica" action="{{route('paginaGestione.edit')}}" method="post" name="edit">
                                @csrf
                                <div class="form-group">
                                    <hr> 
                                    <label style="color: #458045">
                                        Categoria:
                                    </label>
                                    <select style="border-color: #458045" class="browser-default custom-select" id="seleziona-categoria-esistente-edit" name="categoria-edit" onChange="CategoriaEdit();">
                                        @foreach($macro_categories_list as $macro_category)
                                        <option value="{{$macro_category->id}}">{{$macro_category->macro_cat}}</option>
                                        @endforeach
                                    </select>
                                    <!--SOTTOCATEGORIE-->
                                    <hr> 
                                    <label style="color: #458045">
                                        Sottocategoria:
                                    </label>
                                    <select style="border-color: #458045" class="browser-default custom-select" name="Chitarre-edit" id="Chitarre-edit">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 1)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #458045" class="browser-default custom-select" name="Bassi-edit" id="Bassi-edit">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 2)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #458045" class="browser-default custom-select" name="Fiati-edit" id="Fiati-edit">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 5)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #458045" class="browser-default custom-select" name="Batterie e Percussioni-edit" id="Batterie e Percussioni-edit">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 6)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #458045" class="browser-default custom-select" name="Tastiere-edit" id="Tastiere-edit">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 7)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #458045" class="browser-default custom-select" name="Studio e Registrazione-edit" id="Studio e Registrazione-edit">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 8)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #458045" class="browser-default custom-select" name="Audio Pro e Luci-edit" id="Audio Pro e Luci-edit">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 9)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #458045" class="browser-default custom-select" name="Strumenti Tradizionali-edit" id="Strumenti Tradizionali-edit">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 10)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #458045" class="browser-default custom-select" name="Accessori-edit" id="Accessori-edit">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 11)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <hr>
                                    <label style="color: #458045">
                                        Premi il seguente bottone per passare alla schermata di modifica:
                                    </label>
                                    <div class="form-group">
                                        <label for="mySubmit-edit" class="bottone bottone_wishlist bold mt-1"><i class="fa fa-pencil"></i> Prosegui alla pagina di modifica</label>
                                        <input type="submit" id="mySubmit-edit" value="edit" class="invisible"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="container">
                    <div class="card" style="border-color: #c44835">
                        <div class="container">
                            <h3 class="my-3" style="font-weight: bold; color: #c44835"> Elimina un prodotto </h3>
                            <form enctype="multipart/form-data" class="form-cgroup" id="form-eliminazione" action="{{route('paginaGestione.delete')}}" method="post" name="delete">
                                @csrf
                                <div class="form-group">
                                    <hr> 
                                    <label style="color: #c44835">
                                        Categoria:
                                    </label>
                                    <select style="border-color: #c44835" class="browser-default custom-select" id="seleziona-categoria-esistente-delete" name="categoria-delete" onChange="CategoriaDelete();">
                                        @foreach($macro_categories_list as $macro_category)
                                        <option value="{{$macro_category->id}}">{{$macro_category->macro_cat}}</option>
                                        @endforeach
                                    </select>
                                    <!--SOTTOCATEGORIE-->
                                    <hr> 
                                    <label style="color: #c44835">
                                        Sottocategoria:
                                    </label>
                                    <select style="border-color: #c44835" class="browser-default custom-select" name="Chitarre-delete" id="Chitarre-delete">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 1)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #c44835" class="browser-default custom-select" name="Bassi-delete" id="Bassi-delete">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 2)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #c44835" class="browser-default custom-select" name="Fiati-delete" id="Fiati-delete">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 5)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #c44835" class="browser-default custom-select" name="Batterie e Percussioni-delete" id="Batterie e Percussioni-delete">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 6)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #c44835" class="browser-default custom-select" name="Tastiere-delete" id="Tastiere-delete">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 7)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #c44835" class="browser-default custom-select" name="Studio e Registrazione-delete" id="Studio e Registrazione-delete">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 8)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #c44835" class="browser-default custom-select" name="Audio Pro e Luci-delete" id="Audio Pro e Luci-delete">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 9)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #c44835" class="browser-default custom-select" name="Strumenti Tradizionali-delete" id="Strumenti Tradizionali-delete">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 10)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <select style="border-color: #c44835" class="browser-default custom-select" name="Accessori-delete" id="Accessori-delete">
                                        @foreach($categories_list as $category)
                                        @if($category->macro_categories_id == 11)
                                        <option value="{{$category->specific_cat}}">{{$category->specific_cat}}</option>
                                        @endif
                                        @endforeach
                                    </select>
<!--                                    <select style="border-color: #c44835" class="browser-default custom-select" name="brand-delete" id="brand-delete">
                                        @foreach($brands_list as $brand)
                                        <option value="{{$brand->brand}}">{{$brand->brand}}</option>
                                        @endforeach
                                    </select>
                                    <select style="border-color: #c44835" class="browser-default custom-select" name="product-delete" id="product-delete">
                                        @foreach($products_list as $product)
                                        <option value="{{$product->model}}">{{$product->model}}</option>
                                        @endforeach
                                    </select>-->
                                    <hr>
                                    <label style="color: #c44835">
                                        Premi il seguente bottone per passare alla scelta del prodotto da eliminare:
                                    </label>
                                    <div class="form-group">
                                        <label for="mySubmit-delete" class="bottone bottone_elimina bold mt-1"><i class="fa fa-trash"></i> Prosegui alla pagina di eliminazione</label>
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

<script>
    function Categoria() {
        //document.getElementById("seleziona-categoria-esistente");
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
    function CategoriaEdit() {
        //document.getElementById("seleziona-categoria-esistente");
        var valore = document.getElementById("seleziona-categoria-esistente-edit").value;
        if (valore == 1) {
            document.getElementById("Chitarre-edit").style.display = "block";
            document.getElementById("Bassi-edit").style.display = "none";
            document.getElementById("Fiati-edit").style.display = "none";
            document.getElementById("Batterie e Percussioni-edit").style.display = "none";
            document.getElementById("Tastiere-edit").style.display = "none";
            document.getElementById("Studio e Registrazione-edit").style.display = "none";
            document.getElementById("Audio Pro e Luci-edit").style.display = "none";
            document.getElementById("Strumenti Tradizionali-edit").style.display = "none";
            document.getElementById("Accessori-edit").style.display = "none";
        } else if (valore == 2) {
            document.getElementById("Chitarre-edit").style.display = "none";
            document.getElementById("Bassi-edit").style.display = "block";
            document.getElementById("Fiati-edit").style.display = "none";
            document.getElementById("Batterie e Percussioni-edit").style.display = "none";
            document.getElementById("Tastiere-edit").style.display = "none";
            document.getElementById("Studio e Registrazione-edit").style.display = "none";
            document.getElementById("Audio Pro e Luci-edit").style.display = "none";
            document.getElementById("Strumenti Tradizionali-edit").style.display = "none";
            document.getElementById("Accessori-edit").style.display = "none";
        } else if (valore == 5) {
            document.getElementById("Chitarre-edit").style.display = "none";
            document.getElementById("Bassi-edit").style.display = "none";
            document.getElementById("Fiati-edit").style.display = "block";
            document.getElementById("Batterie e Percussioni-edit").style.display = "none";
            document.getElementById("Tastiere-edit").style.display = "none";
            document.getElementById("Studio e Registrazione-edit").style.display = "none";
            document.getElementById("Audio Pro e Luci-edit").style.display = "none";
            document.getElementById("Strumenti Tradizionali-edit").style.display = "none";
            document.getElementById("Accessori-edit").style.display = "none";
        } else if (valore == 6) {
            document.getElementById("Chitarre-edit").style.display = "none";
            document.getElementById("Bassi-edit").style.display = "none";
            document.getElementById("Fiati-edit").style.display = "none";
            document.getElementById("Batterie e Percussioni-edit").style.display = "block";
            document.getElementById("Tastiere-edit").style.display = "none";
            document.getElementById("Studio e Registrazione-edit").style.display = "none";
            document.getElementById("Audio Pro e Luci-edit").style.display = "none";
            document.getElementById("Strumenti Tradizionali-edit").style.display = "none";
            document.getElementById("Accessori-edit").style.display = "none";
        } else if (valore == 7) {
            document.getElementById("Chitarre-edit").style.display = "none";
            document.getElementById("Bassi-edit").style.display = "none";
            document.getElementById("Fiati-edit").style.display = "none";
            document.getElementById("Batterie e Percussioni-edit").style.display = "none";
            document.getElementById("Tastiere-edit").style.display = "block";
            document.getElementById("Studio e Registrazione-edit").style.display = "none";
            document.getElementById("Audio Pro e Luci-edit").style.display = "none";
            document.getElementById("Strumenti Tradizionali"-edit).style.display = "none";
            document.getElementById("Accessori-edit").style.display = "none";
        } else if (valore == 8) {
            document.getElementById("Chitarre-edit").style.display = "none";
            document.getElementById("Bassi-edit").style.display = "none";
            document.getElementById("Fiati-edit").style.display = "none";
            document.getElementById("Batterie e Percussioni-edit").style.display = "none";
            document.getElementById("Tastiere-edit").style.display = "none";
            document.getElementById("Studio e Registrazione-edit").style.display = "block";
            document.getElementById("Audio Pro e Luci-edit").style.display = "none";
            document.getElementById("Strumenti Tradizionali-edit").style.display = "none";
            document.getElementById("Accessori-edit").style.display = "none";
        } else if (valore == 9) {
            document.getElementById("Chitarre-edit").style.display = "none";
            document.getElementById("Bassi-edit").style.display = "none";
            document.getElementById("Fiati-edit").style.display = "none";
            document.getElementById("Batterie e Percussioni-edit").style.display = "none";
            document.getElementById("Tastiere-edit").style.display = "none";
            document.getElementById("Studio e Registrazione-edit").style.display = "none";
            document.getElementById("Audio Pro e Luci-edit").style.display = "block";
            document.getElementById("Strumenti Tradizionali-edit").style.display = "none";
            document.getElementById("Accessori-edit").style.display = "none";
        } else if (valore == 10) {
            document.getElementById("Chitarre-edit").style.display = "none";
            document.getElementById("Bassi-edit").style.display = "none";
            document.getElementById("Fiati-edit").style.display = "none";
            document.getElementById("Batterie e Percussioni-edit").style.display = "none";
            document.getElementById("Tastiere-edit").style.display = "none";
            document.getElementById("Studio e Registrazione-edit").style.display = "none";
            document.getElementById("Audio Pro e Luci-edit").style.display = "none";
            document.getElementById("Strumenti Tradizionali-edit").style.display = "block";
            document.getElementById("Accessori-edit").style.display = "none";
        } else if (valore == 11) {
            document.getElementById("Chitarre-edit").style.display = "none";
            document.getElementById("Bassi-edit").style.display = "none";
            document.getElementById("Fiati-edit").style.display = "none";
            document.getElementById("Batterie e Percussioni-edit").style.display = "none";
            document.getElementById("Tastiere-edit").style.display = "none";
            document.getElementById("Studio e Registrazione-edit").style.display = "none";
            document.getElementById("Audio Pro e Luci-edit").style.display = "none";
            document.getElementById("Strumenti Tradizionali-edit").style.display = "none";
            document.getElementById("Accessori-edit").style.display = "block";
        }
    }
    function CategoriaDelete() {
        var valoreDelete = document.getElementById("seleziona-categoria-esistente-delete").value;
        if (valoreDelete == 1) {
            document.getElementById("Chitarre-delete").style.display = "block";
            document.getElementById("Bassi-delete").style.display = "none";
            document.getElementById("Fiati-delete").style.display = "none";
            document.getElementById("Batterie e Percussioni-delete").style.display = "none";
            document.getElementById("Tastiere-delete").style.display = "none";
            document.getElementById("Studio e Registrazione-delete").style.display = "none";
            document.getElementById("Audio Pro e Luci-delete").style.display = "none";
            document.getElementById("Strumenti Tradizionali-delete").style.display = "none";
            document.getElementById("Accessori-delete").style.display = "none";
        } else if (valoreDelete == 2) {
            document.getElementById("Chitarre-delete").style.display = "none";
            document.getElementById("Bassi-delete").style.display = "block";
            document.getElementById("Fiati-delete").style.display = "none";
            document.getElementById("Batterie e Percussioni-delete").style.display = "none";
            document.getElementById("Tastiere-delete").style.display = "none";
            document.getElementById("Studio e Registrazione-delete").style.display = "none";
            document.getElementById("Audio Pro e Luci-delete").style.display = "none";
            document.getElementById("Strumenti Tradizionali-delete").style.display = "none";
            document.getElementById("Accessori-delete").style.display = "none";
        } else if (valoreDelete == 5) {
            document.getElementById("Chitarre-delete").style.display = "none";
            document.getElementById("Bassi-delete").style.display = "none";
            document.getElementById("Fiati-delete").style.display = "block";
            document.getElementById("Batterie e Percussioni-delete").style.display = "none";
            document.getElementById("Tastiere-delete").style.display = "none";
            document.getElementById("Studio e Registrazione-delete").style.display = "none";
            document.getElementById("Audio Pro e Luci-delete").style.display = "none";
            document.getElementById("Strumenti Tradizionali-delete").style.display = "none";
            document.getElementById("Accessori-delete").style.display = "none";
        } else if (valoreDelete == 6) {
            document.getElementById("Chitarre-delete").style.display = "none";
            document.getElementById("Bassi-delete").style.display = "none";
            document.getElementById("Fiati-delete").style.display = "none";
            document.getElementById("Batterie e Percussioni-delete").style.display = "block";
            document.getElementById("Tastiere-delete").style.display = "none";
            document.getElementById("Studio e Registrazione-delete").style.display = "none";
            document.getElementById("Audio Pro e Luci-delete").style.display = "none";
            document.getElementById("Strumenti Tradizionali-delete").style.display = "none";
            document.getElementById("Accessori-delete").style.display = "none";
        } else if (valoreDelete == 7) {
            document.getElementById("Chitarre-delete").style.display = "none";
            document.getElementById("Bassi-delete").style.display = "none";
            document.getElementById("Fiati-delete").style.display = "none";
            document.getElementById("Batterie e Percussioni-delete").style.display = "none";
            document.getElementById("Tastiere-delete").style.display = "block";
            document.getElementById("Studio e Registrazione-delete").style.display = "none";
            document.getElementById("Audio Pro e Luci-delete").style.display = "none";
            document.getElementById("Strumenti Tradizionali-delete").style.display = "none";
            document.getElementById("Accessori-delete").style.display = "none";
        } else if (valoreDelete == 8) {
            document.getElementById("Chitarre-delete").style.display = "none";
            document.getElementById("Bassi-delete").style.display = "none";
            document.getElementById("Fiati-delete").style.display = "none";
            document.getElementById("Batterie e Percussioni-delete").style.display = "none";
            document.getElementById("Tastiere-delete").style.display = "none";
            document.getElementById("Studio e Registrazione-delete").style.display = "block";
            document.getElementById("Audio Pro e Luci-delete").style.display = "none";
            document.getElementById("Strumenti Tradizionali-delete").style.display = "none";
            document.getElementById("Accessori-delete").style.display = "none";
        } else if (valoreDelete == 9) {
            document.getElementById("Chitarre-delete").style.display = "none";
            document.getElementById("Bassi-delete").style.display = "none";
            document.getElementById("Fiati-delete").style.display = "none";
            document.getElementById("Batterie e Percussioni-delete").style.display = "none";
            document.getElementById("Tastiere-delete").style.display = "none";
            document.getElementById("Studio e Registrazione-delete").style.display = "none";
            document.getElementById("Audio Pro e Luci-delete").style.display = "block";
            document.getElementById("Strumenti Tradizionali-delete").style.display = "none";
            document.getElementById("Accessori-delete").style.display = "none";
        } else if (valoreDelete == 10) {
            document.getElementById("Chitarre-delete").style.display = "none";
            document.getElementById("Bassi-delete").style.display = "none";
            document.getElementById("Fiati-delete").style.display = "none";
            document.getElementById("Batterie e Percussioni-delete").style.display = "none";
            document.getElementById("Tastiere-delete").style.display = "none";
            document.getElementById("Studio e Registrazione-delete").style.display = "none";
            document.getElementById("Audio Pro e Luci-delete").style.display = "none";
            document.getElementById("Strumenti Tradizionali-delete").style.display = "block";
            document.getElementById("Accessori-delete").style.display = "none";
        } else if (valoreDelete == 11) {
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
@stop
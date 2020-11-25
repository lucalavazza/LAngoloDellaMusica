<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html> <!--<![endif]-->

    <head>
        <meta charset="UTF-8">
        <title>"L'Angolo Della Musica"</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <link rel="icon" 
              accesskey=""type="image/png" 
              class=""href="{{ url('/') }}/pics/logoHD.png">
        <link rel="stylesheet" href="{{ url('/') }}/css/style.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link href="//db.onlinewebfonts.com/c/25bd082d1c1c64616c5ee3179eb08b42?family=Futura+Std+Book" rel="stylesheet" type="text/css"/>
        <link href="//db.onlinewebfonts.com/c/35e5d1a7aa6da471de4cfb4a47ebaca8?family=Futura+Std+Book" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/bb03b9a21e.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{ url('/') }}/js/removeAddAjax.js"></script>
        <script type="text/javascript" src="{{ url('/') }}/js/myScript.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" class="init">
            $(document).ready(function () {
                $('#myTabella').DataTable({
                    "searching": false,
                    "columns": [
                    {"orderable": false},
                    null,
                    null,
                    null,
                    {"orderable": false},
                    {"orderable": false}
                    ],
                    "order": [1, 'asc'],
                    "pagingType": "full_numbers"
                });
            });
        </script>
    </head>

    @yield('bodyType')
    <nav class="navbar navbar-expand-xl navbar-light">
        <a class="navbar-brand mb-0 h1" href="{{ route('home') }}">
            <img src="{{ url('/') }}/pics/logoHD.png" class="d-inline-bloc align-top img_nav">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @yield('menu_nav')
                @yield('login_tab')
            </ul>
            <div class="row mr-1">
                <div>
                    <a class="nav-link loghi" onclick="leavePhone()"><i class="fas fa-phone loghino"></i></a>
                </div>
                <div style="border-left: 1px solid; height: 40px; color: #b58d51">                    
                </div>
                <div>
                    <a class="nav-link loghi" onclick="leaveWA()"><i class="fab fa-whatsapp loghino"></i></a>
                </div>
                <div style="border-left: 1px solid; height: 40px; color: #b58d51">                    
                </div>
                <div>
                    <a class="nav-link loghi" onclick="leaveMail()"><i class="far fa-envelope loghino"></i></a>
                </div>
                <div style="border-left: 1px solid; height: 40px; color: #b58d51">                    
                </div>
                <div>
                    <a class="nav-link loghi" onclick="leaveFB()"><i class="fab fa-facebook loghino"></i></a>
                </div>
                <div style="border-left: 1px solid; height: 40px; color: #b58d51">                    
                </div>
                <div>
                    <a class="nav-link loghi" onclick="leaveIG()"><i class="fab fa-instagram loghino"></i></a>
                </div>
            </div>

            <form class="form-inline" action="{{ route('search') }}" method="post">
                @csrf
                <input class="form-control form-control-sm w-75" type="text" name="search_param" minlength="3" placeholder="Cerca un prodotto" aria-label="Search" required="" pattern="^\b[a-zA-Z0-9_']+\b$" oninvalid="this.setCustomValidity('Una sola parola alla volta, almeno 3 caratteri e attenzione ai caratteri non alfanumerici.')" oninput="this.setCustomValidity('')">
                <button class="btn my-2 my-sm-0" type="submit"><i class="fas fa-search form-control-feedback loghino" aria-hidden="true"></i></button>
            </form>  
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <nav>
                    <ol class="breadcrumb float-md-right">
                        @yield('breadcrumb')
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    @yield('corpo')

    <hr>

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <address class="text-center">
                <a class="nav-link loghi" onclick="leaveMap()"><i class="fas fa-map-marked-alt loghino"></i></a>
                Via Padana Superiore 19/C<br>
                Mazzano (BS), 25080<br>
                <a class="nav-link loghi" onclick="leavePhone()"><i class="fas fa-phone loghino"></i> 0302120951</a>
            </address>
        </div>
        <div class="col-md-6">
            <div class="text-center">
                <div class="bold mt-2"><i class="far fa-clock"></i> Orari di apertura:</div>
                <div class="orari my-1">
                    Lunedì 15.30-19.30<br>
                    Martedì - Venerdì: 9.30 - 12.30 / 15.30 - 19.30<br>
                    Sabato: 9.30 - 12.30 / 15.30 - 19.00<br>
                    Domenica: Chiuso
                </div>
            </div>
        </div>
    </div>
</body>
</html>
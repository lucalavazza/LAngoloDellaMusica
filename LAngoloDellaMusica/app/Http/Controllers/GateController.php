<?php

namespace LAngoloDellaMusica\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use LAngoloDellaMusica\MacroCategory;
use LAngoloDellaMusica\SpecificCategory;
use LAngoloDellaMusica\DataLayer;

class GateController extends Controller {

    public function getHome() {
        session_start();

        if (isset($_SESSION['logged'])) {
            $dl = new DataLayer;
            $macro_categories_list = $dl->listMacroCategories();
            $categories_list = $dl->listSpecificCategories();
            $master = $dl->isMaster($_SESSION['loggedName']);
            return view('index')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list)->with('master', $master);
        } else {
            $dl = new DataLayer;
            $macro_categories_list = $dl->listMacroCategories();
            $categories_list = $dl->listSpecificCategories();
            return view('index')->with('logged', false)->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list);
        }
    }

    public function getInfo() {

        session_start();

        if (isset($_SESSION['logged'])) {
            $dl = new DataLayer;
            $macro_categories_list = $dl->listMacroCategories();
            $categories_list = $dl->listSpecificCategories();
            return view('info')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list);
        } else {
            $dl = new DataLayer;
            $macro_categories_list = $dl->listMacroCategories();
            $categories_list = $dl->listSpecificCategories();
            return view('info')->with('logged', false)->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list);
        }
    }

    public function getProve() {

        session_start();

        if (isset($_SESSION['logged'])) {
            $dl = new DataLayer;
            $macro_categories_list = $dl->listMacroCategories();
            $categories_list = $dl->listSpecificCategories();
            return view('prove')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list);
        } else {
            $dl = new DataLayer;
            $macro_categories_list = $dl->listMacroCategories();
            $categories_list = $dl->listSpecificCategories();
            return view('prove')->with('logged', false)->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list);
        }
    }

    public function getRiparazioni() {

        session_start();

        if (isset($_SESSION['logged'])) {
            $dl = new DataLayer;
            $macro_categories_list = $dl->listMacroCategories();
            $categories_list = $dl->listSpecificCategories();
            return view('riparazioni')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list);
        } else {
            $dl = new DataLayer;
            $macro_categories_list = $dl->listMacroCategories();
            $categories_list = $dl->listSpecificCategories();
            return view('riparazioni')->with('logged', false)->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list);
        }
    }

    public function getCorsi() {

        session_start();

        if (isset($_SESSION['logged'])) {
            $dl = new DataLayer;
            $macro_categories_list = $dl->listMacroCategories();
            $categories_list = $dl->listSpecificCategories();
            return view('corsi')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list);
        } else {
            $dl = new DataLayer;
            $macro_categories_list = $dl->listMacroCategories();
            $categories_list = $dl->listSpecificCategories();
            return view('corsi')->with('logged', false)->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list);
        }
    }

    public function getPersonale() {

        session_start();

        if (isset($_SESSION['logged'])) {
            $dl = new DataLayer;
            $macro_categories_list = $dl->listMacroCategories();
            $categories_list = $dl->listSpecificCategories();
            $nome = $dl->getUsersName($_SESSION['loggedName']);
            $cognome = $dl->getUsersSurname($_SESSION['loggedName']);
            $mail = $dl->getUsersMail($_SESSION['loggedName']);
            $username = $dl->getUsersUsername($_SESSION['loggedName']);
            return view('paginaPersonale')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list)->with('nome', $nome)->with('cognome', $cognome)->with('mail', $mail)->with('username', $username);
        } else {
            $dl = new DataLayer;
            $macro_categories_list = $dl->listMacroCategories();
            $categories_list = $dl->listSpecificCategories();
            #return view('login')->with('logged',false)->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list);
            return view('auth.restrictedArea')->with('macro_categories_list', $macro_categories_list)
                            ->with('categories_list', $categories_list);
        }
    }

    public function getPersonaleRipetizione() {

        session_start();

        if (isset($_SESSION['logged'])) {
            $dl = new DataLayer;
            $macro_categories_list = $dl->listMacroCategories();
            $categories_list = $dl->listSpecificCategories();
            $nome = $dl->getUsersName($_SESSION['loggedName']);
            $cognome = $dl->getUsersSurname($_SESSION['loggedName']);
            $mail = $dl->getUsersMail($_SESSION['loggedName']);
            $username = $dl->getUsersUsername($_SESSION['loggedName']);
            return view('erroreCoincidenti')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list)->with('nome', $nome)->with('cognome', $cognome)->with('mail', $mail)->with('username', $username);
        } else {
            $dl = new DataLayer;
            $macro_categories_list = $dl->listMacroCategories();
            $categories_list = $dl->listSpecificCategories();
            #return view('login')->with('logged',false)->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list);
            return view('auth.restrictedArea')->with('macro_categories_list', $macro_categories_list)
                            ->with('categories_list', $categories_list);
        }
    }

    public function getPersonaleWrong() {

        session_start();

        if (isset($_SESSION['logged'])) {
            $dl = new DataLayer;
            $macro_categories_list = $dl->listMacroCategories();
            $categories_list = $dl->listSpecificCategories();
            $nome = $dl->getUsersName($_SESSION['loggedName']);
            $cognome = $dl->getUsersSurname($_SESSION['loggedName']);
            $mail = $dl->getUsersMail($_SESSION['loggedName']);
            $username = $dl->getUsersUsername($_SESSION['loggedName']);
            return view('erroreVecchiaPwd')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list)->with('nome', $nome)->with('cognome', $cognome)->with('mail', $mail)->with('username', $username);
        } else {
            $dl = new DataLayer;
            $macro_categories_list = $dl->listMacroCategories();
            $categories_list = $dl->listSpecificCategories();
            #return view('login')->with('logged',false)->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list);
            return view('auth.restrictedArea')->with('macro_categories_list', $macro_categories_list)
                            ->with('categories_list', $categories_list);
        }
    }

    public function getCambio() {

        session_start();

        if (isset($_SESSION['logged'])) {

            $dl = new DataLayer;
            $macro_categories_list = $dl->listMacroCategories();
            $categories_list = $dl->listSpecificCategories();
            $nome = $dl->getUsersName($_SESSION['loggedName']);
            $cognome = $dl->getUsersSurname($_SESSION['loggedName']);
            $mail = $dl->getUsersMail($_SESSION['loggedName']);
            $username = $dl->getUsersUsername($_SESSION['loggedName']);
            return view('changePwd')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list)->with('nome', $nome)->with('cognome', $cognome)->with('mail', $mail)->with('username', $username);
        } else {
            $dl = new DataLayer;
            $macro_categories_list = $dl->listMacroCategories();
            $categories_list = $dl->listSpecificCategories();
            #return view('login')->with('logged',false)->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list);
            return view('auth.restrictedArea')->with('macro_categories_list', $macro_categories_list)
                            ->with('categories_list', $categories_list);
        }
    }

    public function getGestione() {

        session_start();

        if (isset($_SESSION['logged'])) {
            $dl = new DataLayer;
            $macro_categories_list = $dl->listMacroCategories();
            $categories_list = $dl->listSpecificCategories();
            $brands_list = $dl->listBrands();
            $products_list = $dl->listAllProducts();
            return view('paginaGestione')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])
                    ->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list)
                    ->with('brands_list', $brands_list)->with('products_list', $products_list)
                    ->with('erroreFileGrande', false)->with('modificaSuccesso', false)->with('eliminaSuccesso', false)->with('aggiuntaSuccesso',false)
                    ->with('aggiuntaDoppione', false);
        } else {
            $dl = new DataLayer;
            $macro_categories_list = $dl->listMacroCategories();
            $categories_list = $dl->listSpecificCategories();
            return view('paginaGestione')->with('logged', false)->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list)
                    ->with('erroreFileGrande', false)->with('modificaSuccesso', false)->with('eliminaSuccesso', false)->with('aggiuntaSuccesso',false)
                    ->with('aggiuntaDoppione', false);
        }
    }

    public function getMacro(Request $request, $id) {

        session_start();

        $dl = new DataLayer;
        if (isset($_SESSION['logged'])) {
            $logged = true;
            $loggedName = $_SESSION['loggedName'];
            $userid = $dl->getUserID($loggedName);
            $wish = $dl->listWishlist($userid);
        } else {
            $logged = false;
            $loggedName = "";
            $userid = "";
            $wish = "";
        }

        $macro_categories_list = $dl->listMacroCategories();
        $categories_list = $dl->listSpecificCategories();

        $macro_name = $dl->getMacroCategoryNameById($id);
        $products_list = $dl->listProductsByMacroCat($macro_name);
        $macrosspec = $dl->listSpecificCategoriesByMacroId($id);
        $anyproducts = $dl->listProductsByMacroCat($macro_name);

//        if (empty($macrosspec)) {
//            $vuoto = true;
//        } else {
//            $vuoto = false;
//        }

        if (empty($anyproducts)) {
            $vuoto = true;
        } else {
            $vuoto = false;
        }

        return view('lists.macro')->with('logged', $logged)->with('loggedName', $loggedName)
                        ->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list)
                        ->with('iden', $id)->with('products', $products_list)->with('macro_name', $macro_name)
                        ->with('macrosspec', $macrosspec)->with('wish', $wish)->with('userid', $userid)->with('anyproducts', $anyproducts);
    }

    public function getSpec(Request $request, $id) {

        session_start();

        $dl = new DataLayer;
        if (isset($_SESSION['logged'])) {
            $logged = true;
            $loggedName = $_SESSION['loggedName'];
            $userid = $dl->getUserID($loggedName);
            $wish = $dl->listWishlist($userid);
        } else {
            $logged = false;
            $loggedName = "";
            $userid = "";
            $wish = "";
        }

        $macro_categories_list = $dl->listMacroCategories();
        $categories_list = $dl->listSpecificCategories();

        $spec_name = $dl->getSpecCategoryNameById($id);
        $macroid = $dl->getMacroCategoryIdBySpecificName($spec_name);
        $macro_name = $dl->getMacroCategoryNameById($macroid);
        $products_list = $dl->listProductsByMacroCat($macro_name);
        $catsprods = $dl->listProductsByCat($spec_name);



        return view('lists.spec')->with('logged', $logged)->with('loggedName', $loggedName)
                        ->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list)
                        ->with('iden', $id)->with('products', $products_list)->with('macro_name', $macro_name)
                        ->with('wish', $wish)->with('macroid', $macroid)->with('spec_name', $spec_name)
                        ->with('catsprods', $catsprods)->with('userid', $userid);
    }

    public function getSearch(Request $request) {

        session_start();

        $dl = new DataLayer;
        if (isset($_SESSION['logged'])) {
            $logged = true;
            $loggedName = $_SESSION['loggedName'];
            $userid = $dl->getUserID($loggedName);
            $wish = $dl->listWishlist($userid);
        } else {
            $logged = false;
            $loggedName = "";
            $userid = "";
            $wish = "";
        }

        $macro_categories_list = $dl->listMacroCategories();
        $categories_list = $dl->listSpecificCategories();

        $ricerca = stripslashes($request->search_param);
        $search_result = $dl->listProductsBySearch($ricerca);

        return view('lists.search')->with('logged', $logged)->with('loggedName', $loggedName)
                        ->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list)->with('wish', $wish)
                        ->with('ricerca', $ricerca)->with('search_result', $search_result)->with('userid', $userid);
    }

    public function getSearchGet(Request $request, $ricerca) {

        session_start();

        $dl = new DataLayer;
        if (isset($_SESSION['logged'])) {
            $logged = true;
            $loggedName = $_SESSION['loggedName'];
            $userid = $dl->getUserID($loggedName);
            $wish = $dl->listWishlist($userid);
        } else {
            $logged = false;
            $loggedName = "";
            $userid = "";
            $wish = "";
        }

        $macro_categories_list = $dl->listMacroCategories();
        $categories_list = $dl->listSpecificCategories();

        $search_result = $dl->listProductsBySearch($ricerca);

        return view('lists.search')->with('logged', $logged)->with('loggedName', $loggedName)
                        ->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list)->with('wish', $wish)
                        ->with('ricerca', $ricerca)->with('search_result', $search_result)->with('userid', $userid);
    }

    public function getDettaglio(Request $request, $id) {

        session_start();

        $dl = new DataLayer;
        if (isset($_SESSION['logged'])) {
            $logged = true;
            $loggedName = $_SESSION['loggedName'];
            $userid = $dl->getUserID($loggedName);
            $wish = $dl->listWishlist($userid);
            $uid = $dl->getUserID($loggedName);
            $siono = $dl->findInWish($uid, $id);
            $master = $dl->isMaster($loggedName);
        } else {
            $logged = false;
            $loggedName = "";
            $userid = "";
            $wish = "";
            $uid = "";
            $siono = "";
            $master=false;
        }

        $macro_categories_list = $dl->listMacroCategories();
        $categories_list = $dl->listSpecificCategories();

        $prod = $dl->findProductById($id);

        return view('lists.detail')->with('logged', $logged)->with('loggedName', $loggedName)
                        ->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list)
                        ->with('iden', $id)->with('wish', $wish)->with('prod', $prod)->with('siono', $siono)->with('master', $master);
    }

    public function deleteUser() {
        session_start();
        $dl = new DataLayer;
        $uid = $dl->getUserID($_SESSION['loggedName']);
        $dl->deleteUser($_SESSION['loggedName'], $uid);
        session_destroy();
        return Redirect::to(route('home'));
    }
    
    public function deleteProductController(Request $request, $id) {
        session_start();
        
        $dl = new DataLayer;
        $macro_categories_list = $dl->listMacroCategories();
        $categories_list = $dl->listSpecificCategories();
        $brands_list = $dl->listBrands();
        $products_list = $dl->listAllProducts();
        if (isset($_SESSION['logged'])) {
            $logged = true;
            $loggedName = $_SESSION['loggedName'];
            $userid = $dl->getUserID($loggedName);
            $wish = $dl->listWishlist($userid);
        } else {
            $logged = false;
            $loggedName = "";
            $userid = "";
            $wish = "";
        }

        $dl = new DataLayer;
        $master = $dl->isMaster($_SESSION['loggedName']);
        
//      prelevo i dati del prodotto da inscrivere nella cella della tabella utente
        $marca=$dl->getProductBrandByID($id);
        $modello=$dl->getProductModelByID($id);
        $colore=$dl->getProductColorByID($id);
        $stato=$dl->getProductStatusByID($id);
        
//      prelevo gli id degli utenti che hanno il prodotto nella propria wishlist
        $listaIdUtenti=$dl->listUsersIdWithProductInWishlist($id);
//      modifico il campo con i dati del prodotto eliminato
        for($i = 0; $i < count($listaIdUtenti); $i++) {
            $dl->changeDeletedField($listaIdUtenti[$i]->store_users_id, $marca, $modello, $colore, $stato);
        }
        
        $dl->deleteProduct($id);
        
        return view('paginaGestione')->with('logged', $logged)->with('wish', $wish)->with('userid',$userid)
            ->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list)
            ->with('brands_list', $brands_list)->with('products_list', $products_list)
            ->with('loggedName', $_SESSION["loggedName"])->with('erroreFileGrande', false)->with('modificaSuccesso', false)
            ->with('eliminaSuccesso', true)->with('aggiuntaSuccesso',false)->with('aggiuntaDoppione', false);
        
    }

    public function store(Request $request) {
        session_start();
        $dl = new DataLayer;
        $master = $dl->isMaster($_SESSION['loggedName']);
        $modello = $request->input('modello');
        //print_r($request->input('categoria'));
        $categoria_id = $request->input('categoria');
        $categoria_name = $dl->getMacroCategoryNameById($categoria_id);
        //print_r($categoria_name);
        //echo($categoria_name);
        if($categoria_name == "Batterie e Percussioni") {
            $categoria_name = "Batterie_e_Percussioni";
        } else if($categoria_name == "Audio Pro e Luci") {
            $categoria_name = "Audio_Pro_e_Luci";
        } else if($categoria_name == "Strumenti Tradizionali") {
            $categoria_name = "Strumenti_Tradizionali";
        } else if($categoria_name == "Studio e Registrazione") {
            $categoria_name = "Studio_e_Registrazione";
        }
        $sottocategoria_name = $request->input($categoria_name);
        
        
        $sottocategoria_id = $dl->getSpecificCategoryIdByName($sottocategoria_name);
        
        $macro_categories_list = $dl->listMacroCategories();
        $categories_list = $dl->listSpecificCategories();
        $brands_list = $dl->listBrands();
        $products_list = $dl->listAllProducts();

        $modelExisting = $dl->modelExist($modello, $request->input('colore'), $request->input('condizione'));
        if (is_null($modelExisting)) {
            $file = $request->file('path');
            $fileext = $file->getClientOriginalExtension();
            clearstatcache();
            $fileSizeBytes = filesize($file);
            $fileSizeMB = ($fileSizeBytes / 1024 / 1024);
            if($fileSizeMB <= 8) {
                $newfilename = $modello . "-" . $request->input("colore") . "." . $fileext;
                $newfilename = str_replace(" ","_",$newfilename);
                $newfilename = str_replace("/","",$newfilename);
                $percorso = 'pics/' . $sottocategoria_name . '/';
                $file->storeAs($percorso, $newfilename);
                $path = $percorso . $newfilename;
                
                //Serve solo se la funzione di memorizzazione di laravel non va.
                //move_uploaded_file($_FILES['path']['tmp_name'], $path);
                
                if($categoria_name == "Batterie_e_Percussioni") {
                    $categoria_name = "Batterie e Percussioni";
                } else if($categoria_name == "Audio_Pro_e_Luci") {
                    $categoria_name = "Audio Pro e Luci";
                } else if($categoria_name == "Strumenti_Tradizionali") {
                    $categoria_name = "Strumenti Tradizionali";
                } else if($categoria_name == "Studio_e_Registrazione") {
                    $categoria_name = "Studio e Registrazione";
                }

                $dl->addProduct($categoria_name, $sottocategoria_name,
                    $request->input('marca'), $request->input('modello'),
                    $request->input('colore'), $request->input('prezzo'),
                    $request->input('condizione'), $request->input('sitoweb'),
                    $path, $categoria_id, $sottocategoria_id);
                return view('paginaGestione')->with('logged', true)
                    ->with('loggedName', $_SESSION["loggedName"])->with('master', $master)
                    ->with('macro_categories_list', $macro_categories_list)
                    ->with('categories_list', $categories_list)->with('brands_list', $brands_list)
                    ->with('products_list', $products_list)->with('erroreFileGrande', false)
                    ->with('modificaSuccesso', false)->with('eliminaSuccesso', false)
                    ->with('aggiuntaSuccesso', true)->with('aggiuntaDoppione', false);
            }
            return view('paginaGestione')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])
                ->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list)
                ->with('brands_list', $brands_list)->with('products_list', $products_list)->with('erroreFileGrande', true)->with('modificaSuccesso', false)
                    ->with('eliminaSuccesso', false)->with('aggiuntaSuccesso',false)->with('aggiuntaDoppione', false);
        }
        return view('paginaGestione')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])
                ->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list)
                ->with('brands_list', $brands_list)->with('products_list', $products_list)->with('erroreFileGrande', false)->with('modificaSuccesso', false)
                    ->with('eliminaSuccesso', false)->with('aggiuntaSuccesso',false)->with('aggiuntaDoppione', true);
    }

    public function delete(Request $request) {

        session_start();

        $dl = new DataLayer;
        if (isset($_SESSION['logged'])) {
            $logged = true;
            $loggedName = $_SESSION['loggedName'];
            $userid = $dl->getUserID($loggedName);
            $wish = $dl->listWishlist($userid);
        } else {
            $logged = false;
            $loggedName = "";
            $userid = "";
            $wish = "";
        }

        $master = $dl->isMaster($_SESSION['loggedName']);
        
        $categoria_id = $request->input('categoria-delete');
        $categoria_name = $dl->getMacroCategoryNameById($categoria_id);
        $sottocategoria_name = $request->input($categoria_name.'-delete');
        $products_list=$dl->listProductsByCat($sottocategoria_name);
        
        $macro_categories_list = $dl->listMacroCategories();
        $categories_list = $dl->listSpecificCategories();

        return view('lists.delete')->with('logged', $logged)->with('loggedName', $loggedName)
                        ->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list)->with('wish', $wish)
                        ->with('products_list', $products_list)->with('userid', $userid)->with('categoria_name',$categoria_name)->with('sottocategoria_name',$sottocategoria_name);
    }

    public function edit(Request $request) {
        
        session_start();
        $dl=new DataLayer;
        if (isset($_SESSION['logged'])) {
            $logged = true;
            $loggedName = $_SESSION['loggedName'];
            $userid = $dl->getUserID($loggedName);
            $wish = $dl->listWishlist($userid);
        } else {
            $logged = false;
            $loggedName = "";
            $userid = "";
            $wish = "";
        }
        $categoria_id = $request->input('categoria-edit');
        $categoria_name = $dl->getMacroCategoryNameById($categoria_id);
        $sottocategoria_name = $request->input($categoria_name.'-edit');
        $products_list=$dl->listProductsByCat($sottocategoria_name);
        
        $macro_categories_list = $dl->listMacroCategories();
        $categories_list = $dl->listSpecificCategories();
        
        return view('edit')->with('logged', $logged)->with('loggedName', $loggedName)
                ->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list)
                ->with('wish', $wish)->with('products_list', $products_list)->with('userid', $userid)
                ->with('macro_cat', $categoria_name)->with('specific_cat', $sottocategoria_name);
    }
    
    public function confirmEdit(Request $request) {
        
        session_start();
        $dl=new DataLayer;
        if (isset($_SESSION['logged'])) {
            $logged = true;
            $loggedName = $_SESSION['loggedName'];
            $userid = $dl->getUserID($loggedName);
            $wish = $dl->listWishlist($userid);
        } else {
            $logged = false;
            $loggedName = "";
            $userid = "";
            $wish = "";
        }
        
        $macro_categories_list = $dl->listMacroCategories();
        $categories_list = $dl->listSpecificCategories();
        $brands_list = $dl->listBrands();
        $products_list = $dl->listAllProducts();
        
        $stringa = $request->input('prodotto');
        $price = $request->input('prezzo');
        
        $stringa = explode(";", $stringa);
        $macro_cat=$stringa[0];
        $specific_cat=$stringa[1];
        $model=$stringa[2];
        $color=$stringa[3];
        $brand=$stringa[4];
        $status=$stringa[5];
        
        $dl->editProduct($macro_cat, $specific_cat,
                    $brand, $model, $color, $price, $status);
        
        return view('paginaGestione')->with('logged', $logged)->with('wish', $wish)->with('userid',$userid)
                ->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list)
                ->with('brands_list', $brands_list)->with('products_list', $products_list)
                ->with('loggedName', $_SESSION["loggedName"])->with('erroreFileGrande', false)->with('modificaSuccesso', true)
                ->with('eliminaSuccesso', false)->with('aggiuntaSuccesso',false)->with('aggiuntaDoppione', false);
    }
}

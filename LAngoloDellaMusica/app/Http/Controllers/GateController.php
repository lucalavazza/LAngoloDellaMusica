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
            return view('paginaGestione')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list);
        } else {
            $dl = new DataLayer;
            $macro_categories_list = $dl->listMacroCategories();
            $categories_list = $dl->listSpecificCategories();
            return view('paginaGestione')->with('logged', false)->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list);
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
                        ->with('macrosspec', $macrosspec)->with('wish', $wish)->with('userid', $userid)->with('anyproducts',$anyproducts);
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
        } else {
            $logged = false;
            $loggedName = "";
            $userid = "";
            $wish = "";
            $uid = "";
            $siono = "";
        }

        $macro_categories_list = $dl->listMacroCategories();
        $categories_list = $dl->listSpecificCategories();

        $prod = $dl->findProductById($id);



        return view('lists.detail')->with('logged', $logged)->with('loggedName', $loggedName)
                        ->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list)
                        ->with('iden', $id)->with('wish', $wish)->with('prod', $prod)->with('siono', $siono);
    }

    public function deleteUser() {
        session_start();
        $dl = new DataLayer;
        $uid=$dl->getUserID($_SESSION['loggedName']);
        $dl->deleteUser($_SESSION['loggedName'], $uid);
        session_destroy();
        return Redirect::to(route('home'));
    }
    
    public function store(Request $request) {
        session_start();
        $dl = new DataLayer;
        $master = $dl->isMaster($_SESSION['loggedName']);
        $modello = $request->input('modello');
        //$modelExisting = $dl->list($modello);
        if (is_null($modelExisting)) {
            if ($request->hasFile('path')) {
                $file = $request->file('path');
                $filename = $file->getClientOriginalName();
                $fileext = $file->getClientOriginalExtension();
                $modello=str_replace(":", "-",$modello);
                $newfilename=$modello.".".$fileext;
                $file->storeAs('pics/categoria/', $newfilename);
            } else {
                $newfilename = "image-na.jpg";
            }
            $dl->addMovie($request->input('categoria'), $request->input('sottocategoria'),
                    $request->input('marca'), $request->input('modello'),
                    $request->input('colore'), $request->input('prezzo'),
                    $request->input('condizione'), $request->input('sitoweb'),
                    $newfilename);
            return Redirect::to(route('paginaGestione'))->with('logged', true)
                            ->with('loggedName', $_SESSION["loggedName"])
                            ->with('master', $master);
        }
        return view('movie.errorPage')->with('logged', true)->with('loggedName', $_SESSION['loggedName'])
                        ->with('privileges', $privileges);
    }
}

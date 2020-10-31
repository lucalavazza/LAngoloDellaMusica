<?php

namespace LAngoloDellaMusica\Http\Controllers;

use Illuminate\Http\Request;
use LAngoloDellaMusica\DataLayer;
use Illuminate\Support\Facades\Redirect;

class WishController extends Controller
{
    public function index() {
        session_start();
        
        if(isset($_SESSION['logged'])) {
            $dl = new DataLayer;
            $macro_categories_list = $dl->listMacroCategories();
            $categories_list = $dl->listSpecificCategories();
            $allprods=$dl->listAllProducts();
            $uid=$dl->getUserID($_SESSION['loggedName']);
            $wishl=$dl->listWishlist($uid);
            $messaggio=$dl->getUsersMessage($_SESSION['loggedName']);
            
            return view('lists.wish')->with('logged',true)->with('loggedName',$_SESSION['loggedName'])
                    ->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list)
                    ->with('wishl',$wishl)->with('allprods',$allprods)->with('messaggio',$messaggio);
        } else {
            $dl = new DataLayer;
            $macro_categories_list = $dl->listMacroCategories();
            $categories_list = $dl->listSpecificCategories();
        
            return view('auth.restrictedArea')->with('macro_categories_list', $macro_categories_list)
                ->with('categories_list', $categories_list);
        }
    }
    
    public function capito() {
        session_start();
        
        if(isset($_SESSION['logged'])) {
            $dl = new DataLayer;
            $macro_categories_list = $dl->listMacroCategories();
            $categories_list = $dl->listSpecificCategories();
            $allprods=$dl->listAllProducts();
            $uid=$dl->getUserID($_SESSION['loggedName']);
            $wishl=$dl->listWishlist($uid);
            $dl->capitoDeletedField($_SESSION['loggedName']);
            $messaggio=$dl->getUsersMessage($_SESSION['loggedName']);
            
            return view('lists.wish')->with('logged',true)->with('loggedName',$_SESSION['loggedName'])
                    ->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list)
                    ->with('wishl',$wishl)->with('allprods',$allprods)->with('messaggio',$messaggio);
        } else {
            $dl = new DataLayer;
            $macro_categories_list = $dl->listMacroCategories();
            $categories_list = $dl->listSpecificCategories();
        
            return view('auth.restrictedArea')->with('macro_categories_list', $macro_categories_list)
                ->with('categories_list', $categories_list);
        }
    }
    
//    public function add(Request $request, $id) {
//        session_start();
//        
//        if(isset($_SESSION['logged'])) {
//            $dl=new DataLayer;
//            $uid=$dl->getUserID($_SESSION['loggedName']);
//            $dl->addToWishlist($uid, $id);
//            return back();
//        } else {
//            return view('auth.restrictedArea');
//        }
//    }
    
    public function addPost(Request $request) {
        session_start();
        
        if(isset($_SESSION['logged'])) {
            $dl=new DataLayer;
            $uid=$dl->getUserID($_SESSION['loggedName']);
            $dl->addToWishlist($uid, $request->addWishlist);
            return Redirect::back();
        } else {
            return view('auth.restrictedArea');
        }
    }
    
    public function addPostSearch(Request $request) {
        session_start();
        
        if(isset($_SESSION['logged'])) {
            $dl=new DataLayer;
            $uid=$dl->getUserID($_SESSION['loggedName']);
            $dl->addToWishlist($uid, $request->addWishlist);
            $ricerca=$request->search_param;
            
            return Redirect::to(route('searchGet', ['ricerca' => $ricerca]));
//            $macro_categories_list = $dl->listMacroCategories();
//            $categories_list = $dl->listSpecificCategories();
//            return view('index')->with('logged',true)->with('loggedName',$_SESSION['loggedName'])->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list);
        } else {
            return view('auth.restrictedArea');
        }
    }
    
    
    public function delete(Request $request, $id) {
        session_start();
        
        if(isset($_SESSION['logged'])) {
            $dl=new DataLayer;
            $uid=$dl->getUserID($_SESSION['loggedName']);
            $dl->deleteFromWishlist($uid, $id);
            return back();
        } else {
            return view('auth.restrictedArea');
        }
    }
    
    public function deletePost(Request $request) {
        session_start();
        
        if(isset($_SESSION['logged'])) {
            $dl=new DataLayer;
            $uid=$dl->getUserID($_SESSION['loggedName']);
            $dl->deleteFromWishlist($uid, $request->removeWishlist);
            return back();
        } else {
            return view('auth.restrictedArea');
        }
    }
    
        public function deletePostSearch(Request $request) {
        session_start();
        
        if(isset($_SESSION['logged'])) {
            $dl=new DataLayer;
            $uid=$dl->getUserID($_SESSION['loggedName']);
            $dl->deleteFromWishlist($uid, $request->removeWishlist);
            $ricerca=$request->search_param;

            return Redirect::to(route('searchGet', ['ricerca' => $ricerca]));
//            $macro_categories_list = $dl->listMacroCategories();
//            $categories_list = $dl->listSpecificCategories();
//            return view('index')->with('logged',true)->with('loggedName',$_SESSION['loggedName'])->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list);
        } else {
            return view('auth.restrictedArea');
        }
    }
    
}

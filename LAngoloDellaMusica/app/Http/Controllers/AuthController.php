<?php

namespace LAngoloDellaMusica\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use LAngoloDellaMusica\DataLayer;

class AuthController extends Controller
{
    public function authentication() {
        $dl = new DataLayer;
        $macro_categories_list = $dl->listMacroCategories();
        $categories_list = $dl->listSpecificCategories();
        
        return view('auth.login')->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list)->with('logged', false);
    }
    
    public function registration(Request $request) {
        $dl = new DataLayer();
        
        if($request->input('inputPassword') === $request->input('repeatPassword')) {
            if($dl->existsUser($request->input('inputUsername'))) {
                return Redirect::to(route('user.registration.doubleUser'));
            } elseif ($dl->existsUserMail($request->input('inputEmail'))) {
                return Redirect::to(route('user.registration.doubleMail'));
            } else {
                $dl->addUser($request->input('inputUsername'),$request->input('inputEmail'),$request->input('inputPassword'),$request->input('inputNome'),$request->input('inputCognome'));
                //return Redirect::to(route('user.login'));
                session_start();
                $_SESSION['logged'] = true;
                $_SESSION['loggedName'] = $request->input('inputUsername');
                return Redirect::to(route('home'));
            }
        } else {
            $username=$request->input('inputUsername');
            $email=$request->input('inputEmail');
            return Redirect::to(route('user.registration.error', ['user'=>$username,'mail'=>$email]));
        }  
    }
    
    public function retryRegistration(Request $request, $user, $mail) {
        $dl = new DataLayer;
        $macro_categories_list = $dl->listMacroCategories();
        $categories_list = $dl->listSpecificCategories();
        
        return view('auth.registrationError')->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list)->with('user',$user)->with('email',$mail);
    }
    
    public function retryDoubleRegistrationUser() {
        $dl = new DataLayer;
        $macro_categories_list = $dl->listMacroCategories();
        $categories_list = $dl->listSpecificCategories();
        
        return view('auth.registrationDoubleErrorUser')->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list);
    }
    
    public function retryDoubleRegistrationMail() {
        $dl = new DataLayer;
        $macro_categories_list = $dl->listMacroCategories();
        $categories_list = $dl->listSpecificCategories();
        
        return view('auth.registrationDoubleErrorMail')->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list);
    }
    
    public function login(Request $request) {
        session_start();
        
        $dl = new DataLayer();
        
        if($dl->validUser($request->input('inputUsername'), $request->input('inputPassword'))) {
            $_SESSION['logged'] = true;
            $_SESSION['loggedName'] = $request->input('inputUsername');
            return Redirect::to(route('home'));
        } elseif (!($dl->existsUser($request->input('inputUsername')))) {
            return Redirect::to(route('user.login.errorUser')); 
        } elseif ($dl->existsUser($request->input('inputUsername'))) {
            return Redirect::to(route('user.login.errorPwd'));
        }
    }
    
    public function cambio(Request $request) {
        session_start();
        
        $dl = new DataLayer();
        
        if($dl->validUser($_SESSION['loggedName'], $request->input('oldPassword'))) {
            if($request->input('newPassword') === $request->input('repeatPassword')) {
                $dl->changePassword($_SESSION['loggedName'], $request->input('newPassword'));
                return Redirect::to(route('paginaPersonale'));
            } else {
                return Redirect::to(route('erroreCoincidenti'));
            }
        } else {
            return Redirect::to(route('erroreVecchiaPwd'));
        }
    }
    
    public function retryLoginUser() {
        $dl = new DataLayer;
        $macro_categories_list = $dl->listMacroCategories();
        $categories_list = $dl->listSpecificCategories();

        return view('auth.loginErrorUser')->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list)->with('logged', false);
    }
    
    public function retryLoginPwd() {
        $dl = new DataLayer;
        $macro_categories_list = $dl->listMacroCategories();
        $categories_list = $dl->listSpecificCategories();

        return view('auth.loginErrorPwd')->with('macro_categories_list', $macro_categories_list)->with('categories_list', $categories_list)->with('logged', false);
    }
    
    public function logout() {
        session_start();
        session_destroy();
        return Redirect::to(route('home'));
    }
    
    public function restricted() {
        $dl = new DataLayer;
        $macro_categories_list = $dl->listMacroCategories();
        $categories_list = $dl->listSpecificCategories();
        
        return view('auth.restrictedArea')->with('macro_categories_list', $macro_categories_list)
                ->with('categories_list', $categories_list);
    }
    
//    public function redirectForgot() {
//        $dl = new DataLayer;
//        $macro_categories_list = $dl->listMacroCategories();
//        $categories_list = $dl->listSpecificCategories();
//        
//        return view('auth.reset');
//    }
    
}
<?php

use Illuminate\Support\Facades\Route;


//Controllo se l'utente è loggato per adeguare la navbar e i bottoni della wishlist
Route::get('/',['as' => 'home', 'uses' => 'GateController@getHome']); // ---> FATTO
Route::get('/info',['as' => 'info', 'uses' => 'GateController@getInfo']); // ---> FATTO
Route::get('/prove',['as' => 'prove', 'uses' => 'GateController@getProve']); // ---> FATTO
Route::get('/riparazioni',['as' => 'riparazioni', 'uses' => 'GateController@getRiparazioni']); // ---> FATTO
Route::get('/corsi',['as' => 'corsi', 'uses' => 'GateController@getCorsi']); // ---> FATTO

Route::get('/paginaPersonale',['as' => 'paginaPersonale', 'uses' => 'GateController@getPersonale']); // ---> FATTO
Route::get('/paginaGestione',['as' => 'paginaGestione', 'uses' => 'GateController@getGestione']); // ---> FATTO
Route::get('/cambioPassword',['as' => 'cambioPassword', 'uses' => 'GateController@getCambio']); // ---> FATTO

Route::get('/deleteUser',['as' => 'deleteUser', 'uses' => 'GateController@deleteUser']);
Route::get('/deleteProduct/{id}',['as' => 'deleteProduct', 'uses' => 'GateController@deleteProductController']);

//Gestisco la visualizzazione degli strumenti
Route::get('/macro/{id}',['as' => 'macro', 'uses' => 'GateController@getMacro']); // ---> FATTO
Route::get('/spec/{id}',['as' => 'spec', 'uses' => 'GateController@getSpec']); // ---> FATTO
Route::get('/dettaglio/{id}',['as' => 'dettaglio', 'uses' => 'GateController@getDettaglio']); // ---> FATTO
Route::post('/search', ['as' => 'search', 'uses' => 'GateController@getSearch']); // ---> FATTO
Route::get('/searchGet/{ricerca}', ['as' => 'searchGet', 'uses' => 'GateController@getSearchGet']); // ---> FATTO


//Gestisco tutto ciò che ha a che fare con l'autenticazione

//clicco sul menu Login/Registrati
Route::get('/user/login',['as' => 'user.login', 'uses' => 'AuthController@authentication']); // ---> FATTO
//clicco sul bottone per avviare il login
Route::post('/user/login',['as' => 'user.login', 'uses' => 'AuthController@login']); // ---> FATTO
//clicco sul bottone per avviare la registrazione
Route::post('/user/registrazione',['as' => 'user.registration', 'uses' => 'AuthController@registration']); // ---> FATTO
//clicco sul menu per il logout
Route::get('/user/logout',['as' => 'user.logout', 'uses' => 'AuthController@logout']); // ---> FATTO
//errori di login e registrazione
//cerco di accedere alla wishlist da non loggato
Route::get('/user/login/areaRiservata',['as' => 'user.login.reservedArea', 'uses' => 'AuthController@restricted']);
//sbaglio il login
Route::get('/user/login/erroreUtente',['as' => 'user.login.errorUser', 'uses' => 'AuthController@retryLoginUser']); // ---> FATTO
Route::get('/user/login/errorePwd',['as' => 'user.login.errorPwd', 'uses' => 'AuthController@retryLoginPwd']); // ---> FATTO
//sbaglio la registrazione (password diverse)
Route::get('/user/registrazione/errore/{user}/{mail}',['as' => 'user.registration.error', 'uses' => 'AuthController@retryRegistration']); // ---> FATTO
//sbaglio la registrazione (username o password già esistenti)
Route::get('/user/registrazione/erroreUser',['as' => 'user.registration.doubleUser', 'uses' => 'AuthController@retryDoubleRegistrationUser']); // ---> FATTO
Route::get('/user/registrazione/erroreMail',['as' => 'user.registration.doubleMail', 'uses' => 'AuthController@retryDoubleRegistrationMail']); // ---> FATTO
////Reset password
//Route::get('/user/forgotPassword',['as' => 'user.forgotPassword', 'uses' => 'AuthController@redirectForgot']);
//Route::post('reset_password_without_token', 'AuthController@validatePasswordRequest');
//Route::post('reset_password_with_token', 'AuthController@resetPassword');
Route::post('/user/cambio',['as' => 'user.cambio', 'uses' => 'AuthController@cambio']); // ---> FATTO
Route::get('/user/registrazione/erroreRipetizione',['as' => 'erroreCoincidenti', 'uses' => 'GateController@getPersonaleRipetizione']); // ---> FATTO
Route::get('/user/registrazione/erroreVecchiaPassword',['as' => 'erroreVecchiaPwd', 'uses' => 'GateController@getPersonaleWrong']); // ---> FATTO


//Gestisco la wishlist
Route::get('/wishlist',['as' => 'wishlist.index', 'uses' => 'WishController@index']); // ---> FATTO
Route::get('/capito',['as' => 'wishlist.capito', 'uses' => 'WishController@capito']); // ---> FATTO
Route::get('/wishlist/{id}/elimina',['as' => 'wishlist.delete', 'uses' => 'WishController@delete']); // ---> FATTO
Route::post('/wishlist/elimina',['as' => 'wishlist.deletePost', 'uses' => 'WishController@deletePost']); // ---> FATTO
Route::post('/wishlist/eliminaSearch',['as' => 'wishlist.deletePostSearch', 'uses' => 'WishController@deletePostSearch']); // ---> FATTO
Route::get('/wishlist/{id}/aggiungi',['as' => 'wishlist.add', 'uses' => 'WishController@add']); // ---> FATTO
Route::post('/wishlist/aggiungi',['as' => 'wishlist.addPost', 'uses' => 'WishController@addPost']); // ---> FATTO
Route::post('/wishlist/aggiungiSearch',['as' => 'wishlist.addPostSearch', 'uses' => 'WishController@addPostSearch']); // ---> FATTO


//Pagina del gestore
Route::post('/paginaGestione/add',['as' => 'paginaGestione.add', 'uses' => 'GateController@store']);
Route::post('/paginaGestione',['as' => 'paginaGestione.edit', 'uses' => 'GateController@edit']);
Route::post('/paginaGestione/delete',['as' => 'paginaGestione.delete', 'uses' => 'GateController@delete']);
Route::post('/paginaGestione/edit',['as' => 'paginaGestione.edit', 'uses' => 'GateController@edit']);
Route::post('/paginaGestione/confirmEdit',['as' => 'paginaGestione.confirmEdit', 'uses' => 'GateController@confirmEdit']);

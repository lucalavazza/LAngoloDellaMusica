<?php

namespace LAngoloDellaMusica;

use Illuminate\Database\Eloquent\Model;
use LAngoloDellaMusica\MacroCategory;
use LAngoloDellaMusica\Product;
use LAngoloDellaMusica\SpecificCategory;
use LAngoloDellaMusica\StoreUser;
use LAngoloDellaMusica\Wishlist;

class DataLayer extends Model
{       
    public function listProductsByCat($specific_category_name) {
        
        return $products = Product::where('specific_categories_name',$specific_category_name)
                ->orderBy('brand','asc')->orderBy('model','asc')->get();
    }
    
    public function listProductsByMacroCat($macro_category_name) {

        return $products = Product::where('macro_categories_name',$macro_category_name)
                ->orderBy('brand','asc')->orderBy('model','asc')->get();
    }
    
    public function listProductsBySearch($param) {

        return $products = Product::where('brand','like','%'.$param.'%')->orWhere('model','like','%'.$param.'%')
                ->orWhere('color','like','%'.$param.'%')->orWhere('macro_categories_name','like','%'.$param.'%')
                ->orWhere('specific_categories_name','like','%'.$param.'%')
                ->orderBy('brand','asc')->orderBy('model','asc')->get();
    }
    
    public function listProductsById($id) {
        
        return $products = Product::where('id',$id)->orderBy('brand','asc')->orderBy('model','asc')->get();
    }
    
    
    public function listAllProducts() {
        return $products = Product::orderBy('model','asc')->get();
    }
    
    public function listMacroCategories() {
        
        return $categories = MacroCategory::orderBy('macro_cat','asc')->get();
    }
    
    public function listSpecificCategories() {
        
        return $categories = SpecificCategory::orderBy('specific_cat','asc')->get();
    }
    
    public function listSpecificCategoriesByMacroId($id) {
        
        return $categories = SpecificCategory::where('macro_categories_id',$id)->orderBy('specific_cat','asc')->get();
    }
    
    public function listBrands() {
        $products = Product::select('brand')->distinct()->orderBy('brand','asc')->get();
        return $products;
    }
    
    public function listProductsByBrand($marca) {
        return $products = Product::where('brand',$marca)->orderBy('brand','asc')->get();
    }
    
    public function listWishlist($user_id) {
        
        return $wishes = Wishlist::where('store_users_id',$user_id)->get();
    }

    public function findMacroCategoryById($id) {
        
        return MacroCategory::find($id);
    }
    
    public function findSpecificCategoryById($id) {
        
        return SpecificCategory::find($id);
    }
    
    
    public function findProductById($id) {
        
        return Product::find($id);
    }
      
    public function findInWish($user_id,$product_id) {
        
        $wishlist = Wishlist::where([
            ['store_users_id', $user_id],
            ['products_id', $product_id],
        ])->get();
        
        if(count($wishlist)==0) {
            return false;
        } else {
            return true;
        }
    }
    
    public function getProductBrandByID($id_prod) {
        $product = Product::where('id',$id_prod)->get(['brand']);
        return $product[0]->brand;
    }
    
    public function getProductModelByID($id_prod) {
        $product = Product::where('id',$id_prod)->get(['model']);
        return $product[0]->model;
    }
    
    public function getProductColorByID($id_prod) {
        $product = Product::where('id',$id_prod)->get(['color']);
        return $product[0]->color;
    }
    
    public function getProductStatusByID($id_prod) {
        $product = Product::where('id',$id_prod)->get(['status']);
        return $product[0]->status;
    }
    
    public function listUsersIdWithProductInWishlist($id_prod) {
        return $UserId_lists = Wishlist::where('products_id',$id_prod)->get(['store_users_id']);
    }
    
    public function getUserID($username) {
        
        $users = StoreUser::where('username',$username)->get(['id']);
        return $users[0]->id;
    }
    
    public function getUsersName($username) {
        $users = StoreUser::where('username',$username)->get(['name']);
        return $users[0]->name;
    }
    
    public function getUsersSurname($username) {
        $users = StoreUser::where('username',$username)->get(['surname']);
        return $users[0]->surname;
    }
    
    public function getUsersMail($username) {
        $users = StoreUser::where('username',$username)->get(['mail']);
        return $users[0]->mail;
    }
    
    public function getUsersUsername($username) {
        $users = StoreUser::where('username',$username)->get(['username']);
        return $users[0]->username;
    }
    
    public function isMaster($username) {
        $users = StoreUser::where('username',$username)->get(['master']);
        if($users[0] == true)
            return true;
        else return false;
    }
    
    public function getMacroCategoryNameById($id) {

        $cat = MacroCategory::where('id',$id)->get();
        return $cat[0]->macro_cat;
        
    }
    
    public function getSpecCategoryNameById($id) {

        $cat = SpecificCategory::where('id',$id)->get(['specific_cat']);
        return $cat[0]->specific_cat;
        
    }
    
    public function getMacroCategoryIdBySpecificName($specific_cat) {
        
        $cat = SpecificCategory::where('specific_cat',$specific_cat)->get(['macro_categories_id']);
        return $cat[0]->macro_categories_id;
    }
    public function getMacroCategoryIdByName($categoria) {
        $categoria_id = MacroCategory::where('macro_cat', $categoria)->get()->first();
        return $categoria_id->id;
    }
    public function getSpecificCategoryIdByName($sottocategoria) {
        $sottocategoria_id = SpecificCategory::where('specific_cat', $sottocategoria)->get()->first();
        return $sottocategoria_id->id;
    }
    
    public function addToWishlist($user_id,$product_id) {
        
        $wishlist = new Wishlist;
        $wishlist->store_users_id=$user_id;
        $wishlist->products_id=$product_id;
        $wishlist->save();  
    }
    
    public function deleteFromWishlist($user_id,$product_id) {
        
        Wishlist::where([
            ['store_users_id', $user_id],
            ['products_id', $product_id],
        ])->delete();
    }
    
    public function deleteUser($username, $user_id) {
        $user = StoreUser::where('username',$username);
        Wishlist::where('store_users_id', $user_id)->delete();
        $user->delete();
    }
    
    function deleteProduct($product_id) {
        $product = Product::where('id',$product_id);
        Wishlist::where('products_id', $product_id)->delete();
        $product->delete();
    }

    public function validUser($username, $password) {
        
        $users = StoreUser::where('username',$username)->get(['password']);
        
        if(count($users) == 0) {
            return false;
        }
        
        return(md5($password) == ($users[0]->password));
    }
    
    
    public function addUser($username, $mail, $password, $name, $surname) {
        
        $user = new StoreUser;
        $user->username = $username;
        $user->mail = $mail;
        $user->password =md5($password);
        $user->name = $name;
        $user->surname = $surname;
        $user->master = 0;
        $user->save();
    }
    
    public function changePassword($username, $password) {
        
        $user = StoreUser::where('username',$username)->get()->first();
        $user->password = md5($password);
        $user->save();
    }
    
    public function changeDeletedField ($id, $brand, $model, $color, $status) {
        $user = StoreUser::where('id',$id)->get()->first();
        $messaggio = "Il prodotto ".$brand." ".$model." di colore ".$color." nello stato ".$status." non è più disponibile!  -  ";
        $deleted_products = $user->deleted_products;
        $user->deleted_products = $deleted_products."\n".$messaggio;
        $user->save();
    }
    
    public function macroHasSpec($macroId) {
        $cats= SpecificCategory::where('macro_categories_id',$id);
        if(count($users) == 0) {
            return false;
        } else {
            return true;
        }
    }
    
    function existsUser($username) {
        $users = StoreUser::where('username',$username)->get();
        
        if(count($users) == 0) {
            return false;
        } else {
            return true;
        }
    }
    
    function existsUserMail($mail) {
        $users = StoreUser::where('mail',$mail)->get();
        
        if(count($users) == 0) {
            return false;
        } else {
            return true;
        }
    }
    function modelExist($modello, $colore, $stato) {
        $product = Product::where('model', $modello)->where('color', $colore)
                ->where('status', $stato)->get()->first();
        return $product;
    }
    
    function addProduct($categoria, $sottocategoria, $marca, $modello,
            $colore, $prezzo, $condizione, $sitoweb, $file, $categoria_id,
            $sottocategoria_id) {
        $product = new Product;
        $product->brand = $marca;
        $product->model = $modello;
        $product->color = $colore;
        $product->price = $prezzo;
        $product->status = $condizione;
        $product->pic = $file;
        $product->info = $sitoweb;
        $product->macro_categories_name = $categoria;
        $product->specific_categories_name = $sottocategoria;
        $product->macro_categories_id = $categoria_id;
        $product->specific_categories_id = $sottocategoria_id;
        $product->save();
    }
    
    
    
}

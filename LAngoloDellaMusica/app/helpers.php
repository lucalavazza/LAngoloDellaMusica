<?php

use LAngoloDellaMusica\DataLayer;

if (! function_exists('isInWish')) {
    function isInWish($user_id,$product_id) {
        $dl=new DataLayer;
        return $dl->findInWish($user_id, $product_id);
    }
}

if (! function_exists('hasSubCats')) {
    function hasSubCats($macro_category_name) {
        $dl=new DataLayer;
        $lista=$dl->listProductsByMacroCat($macro_category_name);
        if(count($lista)==0) {
            return false;
        } else {
            return true;
        }
    }
}

if (! function_exists('isThisMaster')) {
    function isThisMaster($username) {
        if ($username == "gianbotti") {
            return true;
        } else {
            return false;
        }
    }
}

//if (! function_exists('addWish')) {
//    function addWish($user_id,$product_id) {
//        $dl=new DataLayer;
//        $dl->addToWishlist($user_id, $product_id);
//    }
//}
//
//if (! function_exists('remWish')) {
//    function remWish($user_id,$product_id) {
//        $dl=new DataLayer;
//        $dl->deleteFromWishlist($user_id, $product_id);
//    }
//}
<?php

namespace LAngoloDellaMusica;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    
//    protected $fillable =[''];
    
    public function wishlists() {
        return $this->belongsTo('LAngoloDellaMusica\Wishlist');
    }
    
//    public function wishlist() {
//        return $this->belongsToMany('AngoloDellaMusicaWebsite\Wishlist');
//    }
    
    public function specific_categories() {
        return $this->belongsTo('LAngoloDellaMusica\SpecificCategory');
    }
    
    public function macro_categories() {
        return $this->belongsTo('LAngoloDellaMusica\MacroCategory');
    }
}

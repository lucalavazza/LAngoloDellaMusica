<?php

namespace LAngoloDellaMusica;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    public $timestamps = false;
    
//    protected $fillable =[''];
    
    public function store_users() {
        return $this->belongsTo('LAngoloDellaMusica\StoreUser');
    }
    
    public function products() {
        return $this->hasMany('LAngoloDellaMusica\Product');
    }
}

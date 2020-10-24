<?php

namespace LAngoloDellaMusica;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\CanResetPassword;

class StoreUser extends Model
{
    public $timestamps = false;
    
//    protected $fillable =[''];
    
    public function wishlists() {
        return $this->hasOne('LAngoloDellaMusica\Wishlist');
    }
}

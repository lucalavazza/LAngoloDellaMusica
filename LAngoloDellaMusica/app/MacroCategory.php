<?php

namespace LAngoloDellaMusica;

use Illuminate\Database\Eloquent\Model;

class MacroCategory extends Model
{
    public $timestamps = false;
    
//    protected $fillable =[''];
    
    public function specific_categories() {
        return $this->hasMany('LAngoloDellaMusica\SpecificCategory');
    }
    
    public function products() {
        return $this->hasMany('LAngoloDellaMusica\Product');
    }
}

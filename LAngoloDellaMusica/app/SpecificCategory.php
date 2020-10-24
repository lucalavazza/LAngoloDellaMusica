<?php

namespace LAngoloDellaMusica;

use Illuminate\Database\Eloquent\Model;

class SpecificCategory extends Model
{
    public $timestamps = false;
    
//    protected $fillable =[''];
    
    public function macro_categories() {
        return $this->belongsTo('LAngoloDellaMusica\MacroCategory');
    }
    
    public function products() {
        return $this->hasMany('LAngoloDellaMusica\Product');
    }
}

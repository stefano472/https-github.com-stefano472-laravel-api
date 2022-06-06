<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $table = 'tags';

    // utilizzo funzione public non static xk dovró richiamarla solo 
    // nell'istanza (ovvero quando avró giá creato la classe category
    // che qua per ora é solo definita
    public function posts() {
        return $this->belongsToMany('App\Post');
    }

}

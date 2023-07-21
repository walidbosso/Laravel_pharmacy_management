<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class achat extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\user'); //this produit belongs to this fournisseur
    }
}

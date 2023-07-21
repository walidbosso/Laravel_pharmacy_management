<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    use HasFactory;

    public function fournisseur(){
        return $this->belongsTo('App\Models\fournisseur'); //this produit belongs to this fournisseur
    }
    
}

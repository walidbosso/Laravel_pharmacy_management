<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fournisseur extends Model
{
    use HasFactory;
    
    public function produits(){
        return $this->hasMany('App\Models\produit'); //this fournisseur has many produits
    }
}

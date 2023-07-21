<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();//+1fk fourn
            $table->string('nom');
            $table->string('nom_scientifique');
            $table->string('packing'); // format: 10tab/75mg
            $table->float('prix'); // 22.5
            $table->integer('stock'); // quantite
            $table->string('armoire'); // A,B,C
            $table->string('categorie'); //paracetamol, douleur
            $table->string('date_expiration');
            $table->string('nom_fournisseur'); // peut ajouter foreign key, id
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
};

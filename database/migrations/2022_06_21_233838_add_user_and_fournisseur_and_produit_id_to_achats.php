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
        Schema::table('achats', function (Blueprint $table) {
            $table->integer('user_id');//realise par:
            $table->integer('fournisseur_id');//j'achete d'un fournisseur
            $table->integer('produit_id');//des produits
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('achats', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('fournisseur_id');
            $table->dropColumn('produit_id');
        });
    }
};

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
        Schema::table('produits', function (Blueprint $table) {
            $table->unsignedBigInteger('fournisseur_id')->index()->change(); 
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produits', function (Blueprint $table) {
            $table->dropForeign('produits_fournisseur_id_foreign');
            $table->dropIndex('produits_fournisseur_id_index');
            $table->dropColumn('fournisseur_id');
        });
    }
};

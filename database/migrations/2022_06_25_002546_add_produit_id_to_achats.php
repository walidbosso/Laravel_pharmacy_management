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
            $table->unsignedBigInteger('produit_id')->index()->change(); 
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade'); 
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
            $table->dropForeign('achats_produit_id_foreign');
            $table->dropIndex('achats_produit_id_index');
            $table->dropColumn('produit_id');
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouleurproduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('couleurproduits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('produit_id')->index()->unsigned();
            $table->bigInteger('couleur_id')->index()->unsigned();
            $table->foreign('produit_id')->on('produits')->references('id')->onDelete('cascade');
            $table->foreign('couleur_id')->on('couleurs')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('couleurproduits');
    }
}

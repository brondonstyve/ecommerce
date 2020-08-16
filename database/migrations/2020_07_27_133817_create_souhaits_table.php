<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSouhaitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('souhaits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('produit')->index()->unsigned();
            $table->bigInteger('compte')->index()->unsigned();
            $table->integer('quantite')->default(1);
            $table->foreign('produit')->on('produits')->references('id')->onDelete('cascade');
            $table->foreign('compte')->on('comptes')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('souhaits');
    }
}

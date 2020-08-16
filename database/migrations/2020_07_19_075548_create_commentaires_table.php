<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('produit')->index()->unsigned();
            $table->bigInteger('compte')->index()->unsigned();
            $table->string('email');
            $table->text('commentaire');
            $table->integer('etoile');
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
        Schema::dropIfExists('commentaires');
    }
}

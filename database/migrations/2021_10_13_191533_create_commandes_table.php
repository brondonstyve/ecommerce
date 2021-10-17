<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('codeCom');
            $table->bigInteger('compte')->unsigned()->index();
            $table->bigInteger('produit')->unsigned()->index();
            $table->integer('quantite');
            $table->string('nom');
            $table->string('prenom')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone');
            $table->string('adresse');
            $table->string('ville');
            $table->string('pays');
            $table->string('note')->nullable();
            $table->string('typePaiement');
            $table->float('montant');
            $table->float('montant_total');
            $table->string('devise');
            $table->boolean('status')->default(false);
            $table->foreign('compte')->references('id')->on('comptes')->onDelete('cascade');
            $table->foreign('produit')->references('id')->on('produits');
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
        Schema::dropIfExists('commandes');
    }
}

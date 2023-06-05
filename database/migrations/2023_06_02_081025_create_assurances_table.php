<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assurances', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('marque');
            $table->string('model');
            $table->string('year');
            $table->string('color');
            $table->string('immatriculation');
            $table->date('date_assurance_debut');
            $table->date('date_assurance_fin');
            $table->integer('price');
            $table->string('period');
            $table->string('type_assurance');
            $table->string('etat');
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
        Schema::dropIfExists('assurances');
    }
}

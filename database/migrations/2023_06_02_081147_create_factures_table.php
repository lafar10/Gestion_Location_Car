<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('fullname_a');
            $table->string('adress');
            $table->string('adress_a');
            $table->string('phone');
            $table->string('car_marque');
            $table->date('date_contract_debut');
            $table->date('date_contract_fin');
            $table->integer('price');
            $table->string('oil_size');
            $table->string('passport_id')->nullable();
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
        Schema::dropIfExists('factures');
    }
}

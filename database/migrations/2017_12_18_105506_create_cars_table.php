<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            //car important data
            $table->string('brand'); //Marke
            $table->string('car_type'); //Type
            $table->string('color'); //text
            $table->string('licence_plate');// kennzeichen
            $table->tinyInteger('nr_of_seats');
            $table->mediumInteger('weight'); //Eigengewicht (kg)
            $table->mediumInteger('capacity'); //hubraum (cm3)
            $table->mediumInteger('power'); //leistung(kw)
            $table->mediumInteger('design_speed'); //bauartgeschwindigkeit
            $table->mediumInteger('payload'); //nutzlast (kg)
            $table->mediumInteger('vertical_load'); //Sattellast (kg)
            $table->mediumInteger('axe_load'); //Achslasten (kg)
            //car additional data
            $table->boolean('animal_allowed'); //yes,no
            $table->boolean('smoking_allowed'); //yes no
            $table->text('description'); //additional user infromation
            $table->integer('price'); //per day in Euro
            $table->geometry('position'); //hopefully
            //belongs to user
            $table->integer('user_id');
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
        Schema::dropIfExists('cars');
    }
}

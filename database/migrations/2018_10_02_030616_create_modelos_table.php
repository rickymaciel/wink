<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('Name_model');
            $table->integer('Age_model');
            $table->string('E_mail_model');
            $table->bigInteger('Whatsappnumber');
            $table->bigInteger('Whatsappnumber2')->nullable();
            $table->integer('Hight_model');
            $table->integer('Bust_model');
            $table->integer('Waist_model');
            $table->string('Skin_color_model');
            $table->string('Address1_model')->nullable();
            $table->string('Address2_model')->nullable();
            $table->string('Language_model')->nullable();
            $table->string('City_model');
            $table->string('Country_model');
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
        Schema::dropIfExists('modelos');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('modelo_id');
            $table->string('Name_anuncio');
            $table->date('Date_anuncio');
            $table->string('Services_anuncio')->nullable();
            $table->string('Schedule_anuncio')->nullable();
            $table->string('Work_days_begining');
            $table->string('Work_days_end');
            $table->string('Work_hour_begining');
            $table->string('Work_hour_end');
            $table->integer('Rate_anuncio')->nullable();
            $table->string('Places_work_anuncio')->nullable();
            $table->longText('Video_anuncio', 255)->nullable();
            $table->longText('Pictures_anuncio', 255)->nullable();
            $table->bigInteger('Whatsappnumber');
            $table->string('Address1_anuncio');
            $table->string('Text_anuncio');
            $table->decimal('Price_service_anuncio',10,2)->nullable();
            $table->string('Language_anuncio')->nullable();
            $table->string('City_anuncio');
            $table->string('Country_anuncio');
            $table->timestamps();

            $table->foreign('modelo_id')->references('id')->on('modelos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anuncios');
    }
}

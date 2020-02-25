<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tutor')->nullable();
            $table->string('location')->nullable();
            $table->string('days')->nullable();
            $table->string('duration')->nullable();
            $table->string('meet')->nullable();
            $table->string('age')->nullable();
            $table->string('contact_type')->nullable();
            $table->string('start')->nullable();
            $table->string('contact')->nullable();
            $table->string('phone')->nullable();
            $table->integer('service_charge')->nullable();
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
        Schema::dropIfExists('surveys');
    }
}

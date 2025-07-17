<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internship', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('proposal');
            $table->string('application_letter')->nullable();
            $table->string('response_letter')->nullable();
            $table->string('agency')->nullable();
            $table->unsignedBigInteger('supervisor')->nullable();
            $table->foreign('supervisor')->references('id')->on('users');
            $table->date('start_an_internship')->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('internship');
    }
}

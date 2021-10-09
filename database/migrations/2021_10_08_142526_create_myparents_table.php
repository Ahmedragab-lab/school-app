<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyparentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myparents', function (Blueprint $table) {
            $table->id();
            $table->string('Email')->unique();
            $table->string('Password');
            //Fatherinformation
            $table->string('Name_Father');
            $table->string('National_ID_Father');
            $table->string('Passport_ID_Father');
            $table->string('Phone_Father');
            $table->string('Job_Father');
            $table->string('Address_Father');
            //Mother information
            $table->string('Name_Mother');
            $table->string('National_ID_Mother');
            $table->string('Passport_ID_Mother');
            $table->string('Phone_Mother');
            $table->string('Job_Mother');
            $table->string('Address_Mother');
             // foreign key
            $table->foreignId('Nationality_Father_id')->references('id')->on('nationalities');
            $table->foreignId('Blood_Type_Father_id')->references('id')->on('type__bloods');
            $table->foreignId('Religion_Father_id')->references('id')->on('religions');
            $table->foreignId('Nationality_Mother_id')->references('id')->on('nationalities');
            $table->foreignId('Blood_Type_Mother_id')->references('id')->on('type__bloods');
            $table->foreignId('Religion_Mother_id')->references('id')->on('religions');
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
        Schema::dropIfExists('myparents');
    }
}

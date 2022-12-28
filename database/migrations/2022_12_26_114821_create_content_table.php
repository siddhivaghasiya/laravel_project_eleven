<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->longText('home_title')->nullable();
            $table->longText('home_description')->nullable();
            $table->longText('about_title')->nullable();
            $table->longText('about_description')->nullable();
            $table->longText('gellary_title')->nullable();
            $table->longText('gellary_description')->nullable();
            $table->longText('service_title')->nullable();
            $table->longText('service_description')->nullable();
            $table->longText('contact_title')->nullable();
            $table->longText('contact_description')->nullable();
            $table->longText('testimonial_title')->nullable();
            $table->longText('testimonial_description')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content');
    }
}

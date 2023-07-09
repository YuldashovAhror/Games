<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->nullable();
            $table->integer('padcategory_id')->nullable();
            $table->string('photos');
            $table->string('name_uz');
            $table->string('name_ru');
            $table->string('name_en');
            $table->string('sertificat')->nullable();
            $table->string('title_uz')->nullable();
            $table->string('title_ru')->nullable();
            $table->string('title_en')->nullable();
            $table->string('article')->nullable();
            $table->string('discription_uz')->nullable();
            $table->string('discription_ru')->nullable();
            $table->string('discription_en')->nullable();
            $table->string('star')->nullable();
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
        Schema::dropIfExists('products');
    }
};

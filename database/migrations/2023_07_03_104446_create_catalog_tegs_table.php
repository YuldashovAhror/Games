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
        Schema::create('catalog_tegs', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->string('name');
            $table->text('discription');
            $table->string('catalog_photo');
            $table->string('catalog_name');
            $table->text('catalog_discription');
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
        Schema::dropIfExists('catalog_tegs');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyCharacteristicsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('property_characteristics', function (Blueprint $table) {
      $table->unsignedBigInteger('property_id')->unique();
      $table->float('price')->required();
      $table->integer('bedrooms')->required();
      $table->integer('bathrooms')->required();
      $table->float('sqft')->required();
      $table->float('price_sqft')->required();
      $table->string('property_type');

      $table->string('status')->required();
      $table->timestamps();

      $table->foreign('property_id')
        ->references('id')
        ->on('properties')
        ->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('property_characteristics');
  }
}

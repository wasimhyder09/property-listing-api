<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('properties', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('broker_id');
      $table->string('address');
      $table->string('listing_type')->default('open');
      $table->string('city');
      $table->string('zip_code');
      $table->longText('description');
      $table->year('build_year');
      $table->timestamps();

      $table->unique(['address']);

      $table->foreign('broker_id')
        ->references('id')
        ->on('brokers')
        ->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('properties');
  }
}

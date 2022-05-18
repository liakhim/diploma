<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->string('name');
            $table->integer('rating');
            $table->string('address');
            $table->string('description');
            $table->string('concept');
            $table->string('tag');
            $table->integer('min_guest_quantity');
            $table->integer('max_guest_quantity');
            $table->integer('budget');
            $table->integer('time_open');
            $table->integer('time_close');
            $table->string('phone');
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
        Schema::dropIfExists('locations');
    }
}

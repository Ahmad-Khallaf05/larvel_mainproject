<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('guides', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('description');
            $table->string('age');
            $table->string('gender');
            $table->timestamps();
        });
        Schema::create('guide_trip', function (Blueprint $table){
           $table->unsignedBigInteger('trip_id');
           $table->foreign('trip_id')->references('id')->on('trips');
           $table->unsignedBigInteger('guide_id');
           $table->foreign('guide_id')->references('id')->on('guides');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guides');
    }
};

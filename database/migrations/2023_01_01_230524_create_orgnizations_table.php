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
        Schema::create('orgnizations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('national_id')->nullable();
            $table->string('ministry')->nullable();
            $table->string('founding_date')->nullable();
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
        Schema::dropIfExists('orgnizations');
    }
};

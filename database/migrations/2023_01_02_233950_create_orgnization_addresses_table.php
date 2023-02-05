<?php

use App\Models\Orgnization;
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
        Schema::create('orgnization_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Orgnization::class);
            $table->string('governorate')->nullable();
            $table->string('provenance')->nullable();
            $table->string('district')->nullable();
            $table->string('area')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('residential_type')->nullable();
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
        Schema::dropIfExists('orgnization_addresses');
    }
};

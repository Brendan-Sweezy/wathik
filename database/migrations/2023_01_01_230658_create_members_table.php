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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Orgnization::class);
            $table->string('name')->nullable();
            $table->string('national_id')->nullable();
            $table->string('birthday')->nullable();
            $table->string('work')->nullable();
            $table->string('degree')->nullable();
            $table->string('major')->nullable();
            $table->string('phone')->nullable();
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
        Schema::dropIfExists('members');
    }
};

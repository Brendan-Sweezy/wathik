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
        Schema::create('authority_meetings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Orgnization::class);
            $table->string('meeting_num')->nullable();
            $table->string('date')->nullable();
            $table->string('type')->nullable();
            $table->string('attendees')->nullable();
            $table->string('alternate')->nullable();
            $table->string('decisions')->nullable();
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
        Schema::dropIfExists('authority_meetings');
    }
};

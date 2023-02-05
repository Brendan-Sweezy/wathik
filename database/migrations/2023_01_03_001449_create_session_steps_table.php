<?php

use App\Models\WhatsappSession;
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
        Schema::create('session_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(WhatsappSession::class);
            $table->string('action')->nullable();
            $table->string('type')->nullable();
            $table->string('value')->nullable();
            $table->boolean('saved');
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
        Schema::dropIfExists('session_steps');
    }
};

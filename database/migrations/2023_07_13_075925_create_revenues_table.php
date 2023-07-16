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
        Schema::create('revenues', function (Blueprint $table) {
            $table->id();

            $table->integer('organization_id');
            $table->integer('quarter');
            $table->double('local_financing');
            $table->double('foreign_financing');
            $table->double('project_revenue');
            $table->double('subscriptions');
            $table->double('bank_interest');
            $table->double('immoveable_properties');
            $table->double('other');

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
        Schema::dropIfExists('revenues');
    }
};

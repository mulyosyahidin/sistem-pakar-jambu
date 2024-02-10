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
        Schema::create('solusi_hama', function (Blueprint $table) {
            $table->unsignedInteger('id_solusi')->nullable();
            $table->unsignedInteger('id_hama')->nullable();

            $table->foreign('id_hama')->references('id')->on('hama')->onUpdate('NO ACTION')->onDelete('CASCADE');
            $table->foreign('id_solusi')->references('id')->on('solusi')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solusi_hama');
    }
};

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
        Schema::create('gejala_diagnosa', function (Blueprint $table) {
            $table->unsignedInteger('id_diagnosa')->nullable();
            $table->unsignedInteger('id_gejala')->nullable();

            $table->foreign('id_diagnosa')->references('id')->on('diagnosa')->onUpdate('NO ACTION')->onDelete('CASCADE');
            $table->foreign('id_gejala')->references('id')->on('gejala')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gejala_diagnosa');
    }
};

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
        Schema::create('gejala', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_kategori')->nullable();
            $table->string('kode', 4);
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->decimal('bobot')->nullable();
            $table->enum('media_type', ['image', 'video'])->nullable();
            $table->string('media_url')->nullable();

            $table->foreign('id_kategori')->references('id')->on('kategori_gejala')->onUpdate('NO ACTION')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gejala');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDtksdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dtksd', function (Blueprint $table) {
            $table->id();
            $table->date('periode');
            $table->string('id_dtks');
            $table->string('kk', 16);
            $table->string('nik', 16);
            $table->string('nama', 64);
            $table->tinyInteger('jenis_kelamin')->comment('1: Laki-laki, 2: Perempuan');
            $table->string('alamat')->nullable();
            $table->unsignedBigInteger('dusun_id')->nullable();
            $table->foreign('dusun_id')->references('id')->on('dusun')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('rts_id')->nullable();
            $table->foreign('rts_id')->references('id')->on('rts')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('rws_id')->nullable();
            $table->foreign('rws_id')->references('id')->on('rws')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_ibu', 64)->nullable();
            $table->string('nama_ayah', 64)->nullable();
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
        Schema::dropIfExists('dtksd');
    }
}

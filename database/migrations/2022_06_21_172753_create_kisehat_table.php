<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKisehatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kisehat', function (Blueprint $table) {
            $table->id();
            $table->string('id_dtks')->unique();
            $table->unsignedBigInteger('dusun_id')->nullable();
            $table->foreign('dusun_id')->references('id')->on('dusun')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('rts_id')->nullable();
            $table->foreign('rts_id')->references('id')->on('rts')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('rws_id')->nullable();
            $table->foreign('rws_id')->references('id')->on('rws')->onUpdate('cascade')->onDelete('cascade');
            $table->string('alamat')->nullable();
            $table->string('noka_bpjs')->nullable();
            $table->string('psnoka_bpjs')->nullable();
            $table->string('nama', 64);
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir', 32);
            $table->tinyInteger('jenis_kelamin')->comment('1: Laki-laki, 2: Perempuan');
            $table->string('nik', 16)->unique();
            $table->string('kk', 16);
            $table->foreignId('status_hubungan_dalam_keluarga_id')->constrained('status_hubungan_dalam_keluarga')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_ibu', 64)->nullable();
            $table->string('status', 64)->nullable();
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
        Schema::dropIfExists('kisehat');
    }
}

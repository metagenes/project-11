<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kip', function (Blueprint $table) {
            $table->id();
            $table->string('peserta_didik_id');
            $table->string('sekolah_id');
            $table->string('npsn',8);
            $table->string('nomenklatur');
            $table->unsignedBigInteger('rombel_id')->nullable();
            $table->foreign('rombel_id')->references('id')->on('rombel')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_pd',64);
            $table->string('nama_ibu', 64)->nullable();
            $table->string('nama_ayah', 64)->nullable();
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir',32);
            $table->string('nisn',10);
            $table->tinyInteger('jenis_kelamin')->comment('1: Laki-laki, 2: Perempuan');
            $table->integer('nominal');
            $table->string('no_rekening',32);
            $table->integer('tahap_id');
            $table->string('nomor_sk',32);
            $table->date('tanggal_sk');
            $table->string('nama_rekening',64)->nullable();
            $table->date('tanggal_cair')->nullable();
            $table->tinyInteger('status_cair')->comment('1: Cair, 2: Belum Cair');
            $table->string('no_kip',16)->nullable();
            $table->string('no_kks',32)->nullable();
            $table->string('no_kps',32)->nullable();
            $table->string('virtual_acc',32);
            $table->string('nama_kartu',64)->nullable();
            $table->integer('semester_id');
            $table->tinyInteger('layak_pip')->comment('1: Ya, 2: Tidak');
            $table->string('keterangan_pencairan')->nullable();
            $table->string('confirmation_text')->nullable();
            $table->string('tahap_keterangan')->nullable();
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
        Schema::dropIfExists('kip');
    }
}

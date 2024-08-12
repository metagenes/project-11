<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditKisehatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kisehat', function (Blueprint $table) {
            $table->string('nik', 16)->nullable()->change();//
            $table->string('nama_ibu', 64)->nullable()->change();
            $table->string('alamat')->nullable()->change();
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kisehat', function (Blueprint $table) {
            $table->string('nama_ibu', 64)->change();
            $table->string('alamat')->change();
        });
    }
}

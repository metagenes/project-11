<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditKipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kip', function (Blueprint $table) {
            $table->string('nisn', 10)->nullable()->change();
            $table->string('nama_ibu', 64)->nullable()->change();
            $table->string('nama_ayah',64)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kip', function (Blueprint $table) {
            $table->string('nama_ibu', 64)->change();
            $table->string('nama_ayah',64)->change();
        });
    }
}

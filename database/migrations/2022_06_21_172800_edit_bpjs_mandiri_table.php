<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditBpjsMandiriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bpjs_mandiri', function (Blueprint $table) {
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
        Schema::table('bpjs_mandiri', function (Blueprint $table) {
            $table->string('nama_ibu', 64)->change();
            $table->string('alamat')->change();
        });
    }
}

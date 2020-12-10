<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePengumuman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengumuman', function (Blueprint $table) {
            $table->increments('Id_pengumuman')->start_from(116000);
            $table->string('Judul_pengumuman',50);
            $table->date('Tanggal_pengumuman');
            $table->string('File_pengumuman',50);
            $table->integer('Id_administrasi')->unsigned();
            $table->date('deleted_at')->nullable();
            $table->foreign('Id_administrasi')->references('Id_administrasi')->on('administrasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengumuman');
    }
}

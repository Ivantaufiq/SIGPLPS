<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah');
            $table->string('jenis_sekolah');
            $table->string('status');
            $table->string('npsn')->unique();
            $table->text('alamat');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->integer('jumlah_siswa');
            $table->integer('jumlah_guru');
            $table->integer('jumlah_kelas');
            $table->string('latitude');
            $table->string('longitude');
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
        Schema::dropIfExists('profils');
    }
}

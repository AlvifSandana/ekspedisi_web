<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('muatan', function (Blueprint $table) {
            $table->id('idMuatan');
            $table->string('nama_muatan');
            $table->foreignId('pengirim_id')->constrained('pengirim', 'idPengirim')->onUpdate('cascade');
            $table->date('tanggal_muat');
            $table->string('lokasi_kirim');
            $table->string('catatan_muatan')->nullable();
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
        Schema::dropIfExists('muatan');
    }
}

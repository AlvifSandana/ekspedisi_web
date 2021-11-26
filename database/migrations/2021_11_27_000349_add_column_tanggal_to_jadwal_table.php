<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTanggalToJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jadwal', function (Blueprint $table) {
            // tambahkan kolom tanggal ke tabel jadwal
            $table->date('tanggal_pemberangkatan')->after('Kendaraan_Supir_idSupir')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jadwal', function (Blueprint $table) {
            // hapus kolom tanggal
            $table->removeColumn('tanggal_pemberangkatan');
        });
    }
}

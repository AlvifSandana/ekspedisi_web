<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Kendaraan', function (Blueprint $table) {
            $table->id('idKendaraan');
            $table->string('jenis_kendaraan', 45);
            $table->string('plat_kendaraan', 45);
            $table->string('tahun_kendaraan', 45);
            $table->foreignId('Supir_idSupir')->constrained('Supir', 'idSupir')->onDelete('cascade');
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
        Schema::dropIfExists('Kendaraan');
    }
}

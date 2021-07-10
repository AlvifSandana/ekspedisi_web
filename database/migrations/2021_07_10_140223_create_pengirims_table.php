<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengirimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Pengirim', function (Blueprint $table) {
            $table->id('idPengirim');
            $table->string('nama_pengirim', 45);
            $table->string('alamat_pengirim', 45);
            $table->string('nomor_telpon', 12);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('api_token');
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
        Schema::dropIfExists('Pengirim');
    }
}

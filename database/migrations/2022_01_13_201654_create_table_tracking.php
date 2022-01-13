<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTracking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracking', function (Blueprint $table) {
            $table->id('idTracking');
            $table->string('lat');
            $table->string('long');
            $table->foreignId('Supir_idSupir')->constrained('supir', 'idSupir')->onUpdate('cascade');
            $table->foreignId('muatan_idMuatan')->constrained('muatan', 'idMuatan')->onUpdate('cascade');
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
        Schema::dropIfExists('tracking');
    }
}

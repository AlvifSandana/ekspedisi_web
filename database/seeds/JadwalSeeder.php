<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 6; $i++) {
            DB::table('jadwal')->insert([
            'idJadwal' => $i,
            'Admin_idAdmin' => 1,
            'Kendaraan_idKendaraan' => $i,
            'Kendaraan_Supir_idSupir' => $i,
            'tanggal_pemberangkatan' => '2021-11-27',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
            ]);
        }
    }
}

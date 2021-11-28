<?php

use App\Muatan;
use Illuminate\Database\Seeder;

class MuatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seed muatan
        for ($i=1; $i < 4; $i++) {
            $muatan = new Muatan;
            $muatan->nama_muatan = 'Buah Naga '.$i;
            $muatan->pengirim_id = 1;
            $muatan->tanggal_muat = '2021-12-01';
            $muatan->lokasi_kirim = 'Jatisari, Banyuwangi';
            $muatan->catatan_muatan = '--';
            $muatan->save();
        }
    }
}

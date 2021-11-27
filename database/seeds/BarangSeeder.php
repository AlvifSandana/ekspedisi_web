<?php

use App\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // barang seeder
        for ($i=1; $i < 4; $i++) {
            $barang = new Barang;
            $barang->nama_barang = 'Barang A'.$i;
            $barang->jenis_barang = 'Makanan';
            $barang->berat_barang = '50kg';
            $barang->Pengirim_idPengirim = $i;
            $barang->save();
        }
    }
}

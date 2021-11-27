<?php

use App\Transaksi;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // transaksi seeder
        for ($i=1; $i < 4; $i++) {
            $transaksi = new Transaksi;
            $transaksi->Admin_idAdmin = 1;
            $transaksi->Barang_idBarang = $i;
            $transaksi->Barang_Pengirim_idPengirim = $i;
            $transaksi->status = 'tertunda';
            $transaksi->save();
        }
    }
}

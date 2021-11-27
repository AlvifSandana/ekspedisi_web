<?php

use App\Invoice;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // invoice seeder
        for ($i=1; $i < 4; $i++) {
            $invoice = new Invoice;
            $invoice->Transaksi_id_Transaksi = $i;
            $invoice->Transaksi_Admin_idAdmin = 1;
            $invoice->Transaksi_Barang_idBarang = $i;
            $invoice->Transaksi_Barang_Pengirim_idPengirim = $i;
            $invoice->Jadwal_idJadwal = $i;
            $invoice->Jadwal_Admin_idAdmin = 1;
            $invoice->Jadwal_Kendaraan_idKendaraan = $i;
            $invoice->Jadwal_Kendaraan_Supir_idSupir = $i;
            $invoice->save();
        }
    }
}

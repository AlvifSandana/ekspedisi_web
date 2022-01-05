<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(SupirSeeder::class);
        $this->call(KendaraanSeeder::class);
        $this->call(PengirimSeeder::class);
        $this->call(TarifSeeder::class);
        $this->call(BarangSeeder::class);
        $this->call(MuatanSeeder::class);
        $this->call(TransaksiSeeder::class);
        $this->call(JadwalSeeder::class);
    }
}

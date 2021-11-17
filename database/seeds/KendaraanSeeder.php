<?php

use App\Kendaraan;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seed with dummies data
        $faker = Faker::create();
        for ($i=0; $i < 10; $i++) {
            $kendaraan = new Kendaraan();
            $kendaraan->jenis_kendaraan = $faker->randomElement(['truk', 'pickup']);
            $kendaraan->plat_kendaraan = 'P '.$faker->numberBetween(1111, 9999).' VR';
            $kendaraan->tahun_kendaraan = $faker->numberBetween(2000, 2020);
            $kendaraan->Supir_idSupir = $i + 1;
            $kendaraan->save();
        }
    }
}

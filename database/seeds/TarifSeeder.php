<?php

use App\Tarif;
use Illuminate\Database\Seeder;

class TarifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seed with dummies data
        factory(Tarif::class, 50)->create();
    }
}

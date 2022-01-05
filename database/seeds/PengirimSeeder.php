<?php

use App\Pengirim;
use Illuminate\Database\Seeder;

class PengirimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Pengirim::class, 10)->create();
    }
}

<?php

use Illuminate\Database\Seeder;

class SupirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seed with dummy data
        factory(App\Supir::class, 10)->create();
    }
}

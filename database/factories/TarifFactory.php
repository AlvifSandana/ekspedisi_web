<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tarif;
use Faker\Generator as Faker;

$factory->define(Tarif::class, function (Faker $faker) {
    return [
        'titik_pengiriman' => $faker->state,
        'tujuan_pengiriman' => $faker->state,
        'tarif' => $faker->randomElement([1000000, 2000000, 3000000, 4000000, 5000000, 10000000, 20000000]),
        'status' => 'Tersimpan',
        'keterangan' => '---',
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ];
});

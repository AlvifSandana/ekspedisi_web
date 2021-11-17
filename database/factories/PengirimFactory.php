<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pengirim;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(Pengirim::class, function (Faker $faker) {
    return [
        'nama_pengirim' => $faker->name(),
        'alamat_pengirim' => $faker->address,
        'nomor_telpon' => '08'.$faker->numberBetween(123456789, 999999999),
        'email' => $faker->email,
        'password' => Hash::make('12345678'),
        'api_token' => Hash::make($faker->email),
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Supir;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(Supir::class, function (Faker $faker) {
    return [
        'nama_supir' => $faker->name(),
        'nama_supircadang' => $faker->name(),
        'alamat_supir' => $faker->address,
        'nomor_telpon' => '08'.$faker->numberBetween(123456789, 999999999),
        'email' => $faker->email,
        'password' => Hash::make('12345678'),
        'status' => 'baru',
        'api_token' => Hash::make('12345678'),
        'created_at' => Carbon::now('Asia/Jakarta'),
        'updated_at' => Carbon::now('Asia/Jakarta'),
    ];
});

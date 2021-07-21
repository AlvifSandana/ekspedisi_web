<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            'nama_admin'    => 'Admin',
            'alamat_admin'  => 'rahasia',
            'nomor_telpon'  => '081234567890',
            'email'         => 'admin@mail.com',
            'password'      => Hash::make('12345678'),
            'remember_token'=> ''
        ]);
    }
}

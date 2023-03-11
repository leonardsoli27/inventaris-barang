<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama' => 'Leonard',
            'email' => 'los@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'Admin'
        ]);

        DB::table('pemasok')->insert([
            'nama' => 'Indomaret',
            'alamat' => 'Surabaya',
            'email' => 'los@gmail.com',
            'telepon' => '082228821700'
        ]);

        DB::table('pemasok')->insert([
            'nama' => 'Ramayana',
            'alamat' => 'Surabaya',
            'email' => 'loss@gmail.com',
            'telepon' => '082228821701'
        ]);

    }
}

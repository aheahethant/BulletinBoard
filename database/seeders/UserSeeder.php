<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Aung Aung',
                'email' => 'aungaung@gmail.com',
                'password' => Hash::make('password'),
                'profile' => '',
                'phone' => '092334555',
                'address' => 'Mandalay',
                'dob' => '1998/12/27',
                'create_user_id' => 1,
                'updated_user_id' => 1,
            ]
        );
        DB::table('users')->insert([
            'name' => 'Su Su',
            'email' => 'susu@gmail.com',
            'password' => Hash::make('password'),
            'profile' => '',
            'phone' => '092334555',
            'address' => 'Mandalay',
            'dob' => '1998/12/27',
            'create_user_id' => 1,
            'updated_user_id' => 1,
        ]);
        DB::table('users')->insert(
            [
                'name' => 'Nandar',
                'email' => 'nandar@gmail.com',
                'password' => Hash::make('password'),
                'profile' => '',
                'phone' => '092334555',
                'address' => 'Mandalay',
                'dob' => '1998/12/27',
                'create_user_id' => 1,
                'updated_user_id' => 1,
            ]
        );
    }
}

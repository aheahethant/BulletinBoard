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
            'name' => Str::random(3),
            'email' => Str::random(3).'@gmail.com',
            'password' => Hash::make('password'),
            'profile' => '',
            'type' => '1',
            'phone' => '092334555',
            'address' => 'Mandalay',
            'dob' => '1998/12/27',
            'create_user_id' => 1,
            'updated_user_id' => 1,
            'deleted_user_id' => 1,
            'deleted_at' => '9999-12-31 23:59:59',
        ],
            [
            'name' => Str::random(5),
            'email' => Str::random(5).'@gmail.com',
            'password' => Hash::make('password'),
            'profile' => '',
            'type' => '1',
            'phone' => '092334555',
            'address' => 'Mandalay',
            'dob' => '1998/12/27',
            'create_user_id' => 1,
            'updated_user_id' => 1,
            'deleted_user_id' => 1,
            'deleted_at' => '9999-12-31 23:59:59',
        ],
            [
            'name' => Str::random(3),
            'email' => Str::random(3).'@gmail.com',
            'password' => Hash::make('password'),
            'profile' => '',
            'type' => '1',
            'phone' => '092334555',
            'address' => 'Mandalay',
            'dob' => '1998/12/27',
            'create_user_id' => 1,
            'updated_user_id' => 1,
            'deleted_user_id' => 1,
            'deleted_at' => '9999-12-31 23:59:59',
        ]
        );
    }
}

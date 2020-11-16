<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

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
                'email' => 'scm.aheahethant@gmail.com',
                'password' => Hash::make('password'),
                'profile' => '',
                'type' => 0,
                'phone' => '092334555',
                'address' => 'Mandalay',
                'dob' => '1998/12/27',
                'create_user_id' => 1,
                'updated_user_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );
        DB::table('users')->insert([
            'name' => 'Su Su',
            'email' => 'aheahethant8450@gmail.com',
            'password' => Hash::make('password'),
            'profile' => '',
            'type' => 1,
            'phone' => '092334555',
            'address' => 'Mandalay',
            'dob' => '1998/12/27',
            'create_user_id' => 1,
            'updated_user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert(
            [
                'name' => 'Nandar',
                'email' => 'scm.aungpyaesone@gmail.com',
                'password' => Hash::make('password'),
                'profile' => '',
                'type' => 1,
                'phone' => '092334555',
                'address' => 'Mandalay',
                'dob' => '1998/12/27',
                'create_user_id' => 1,
                'updated_user_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert(
            [
                'title' => 'Hello World!',
                'description' => 'A migration class contains two methods:',
                'create_user_id' => 1,
                'updated_user_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ]
        );
        DB::table('posts')->insert(
            [
                'title' => 'PHP',
                'description' => 'A migration class contains two methods:',
                'create_user_id' => 2,
                'updated_user_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );
        DB::table('posts')->insert(
            [
                'title' => 'Java',
                'description' => 'A migration class contains two methods:',
                'create_user_id' => 3,
                'updated_user_id' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );
    }
}

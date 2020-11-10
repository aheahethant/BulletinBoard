<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            ]
        );
        DB::table('posts')->insert(
            [
                'title' => 'PHP',
                'description' => 'A migration class contains two methods:',
                'create_user_id' => 1,
                'updated_user_id' => 1,
            ]
        );
        DB::table('posts')->insert(
            [
                'title' => 'Java',
                'description' => 'A migration class contains two methods:',
                'create_user_id' => 1,
                'updated_user_id' => 1,
            ]
        );
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
            'title' => Str::random(10),
            'description' => Str::random(20),
            'status' => 1,
            'create_user_id' => 1,
            'updated_user_id' => 1,
            'deleted_user_id' => 1,
            'deleted_at' => '9999-12-31 23:59:59',
        ],
            [
            'title' => Str::random(10),
            'description' => Str::random(20),
            'status' => 1,
            'create_user_id' => 1,
            'updated_user_id' => 1,
            'deleted_user_id' => 1,
            'deleted_at' => '9999-12-31 23:59:59',
        ],
            [
            'title' => Str::random(10),
            'description' => Str::random(20),
            'status' => 1,
            'create_user_id' => 1,
            'updated_user_id' => 1,
            'deleted_user_id' => 1,
            'deleted_at' => '9999-12-31 23:59:59',
        ]
        );
    }
}

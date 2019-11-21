<?php

use Illuminate\Database\Seeder;

class PostLikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('like_post')->insert([
            'post_id' => 1,
            'user_id' => 1,
        ]);

        DB::table('like_post')->insert([
            'post_id' => 1,
            'user_id' => 2,
        ]);

        DB::table('like_post')->insert([
            'post_id' => 2,
            'user_id' => 1,
        ]);
    }
}

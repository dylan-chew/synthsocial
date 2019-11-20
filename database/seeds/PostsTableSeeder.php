<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'Roland Jupiter 8 Demo',
            'body' => 'A neat video showcasing some Jupiter sounds.',
            'youtube_id' => '5KV2O9bphM4',
            'created_by' => 2,
            'last_modified_by' => null,
            'deleted_by' => null,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        DB::table('posts')->insert([
            'title' => 'Prophet 8 vs Rev2',
            'body' => 'Different patches from a Prophet Rev 2 being compared with a prophet 8.',
            'youtube_id' => '97lWx_NwdKE',
            'created_by' => 1,
            'last_modified_by' => null,
            'deleted_by' => null,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        DB::table('posts')->insert([
            'title' => '808 Drum Beats',
            'body' => 'Some famous sounds from the Roland 808.',
            'youtube_id' => 'YeZZk2czG1c',
            'created_by' => 1,
            'last_modified_by' => null,
            'deleted_by' => null,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
    }
}

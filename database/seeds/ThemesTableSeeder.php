<?php

use Illuminate\Database\Seeder;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('themes')->insert([
            'name' => 'Cosmo',
            'cdn' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cosmo/bootstrap.min.css',
            'description' => 'An ode to Metro',
            'is_default' => true,
            'created_by' => null,
            'last_modified_by' => null,
            'deleted_by' => null
        ]);

        DB::table('themes')->insert([
            'name' => 'Minty',
            'cdn' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/minty/bootstrap.min.css',
            'description' => 'A fresh feel',
            'is_default' => false,
            'created_by' => null,
            'last_modified_by' => null,
            'deleted_by' => null
        ]);

        DB::table('themes')->insert([
            'name' => 'Sandstone',
            'cdn' => 'https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/sandstone/bootstrap.min.css',
            'description' => 'A touch of warmth',
            'is_default' => false,
            'created_by' => null,
            'last_modified_by' => null,
            'deleted_by' => null
        ]);

    }
}

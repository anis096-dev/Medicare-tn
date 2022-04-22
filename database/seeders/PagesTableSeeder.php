<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pages')->delete();
        
        \DB::table('pages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'is_default_home' => 1,
                'is_default_not_found' => NULL,
                'title' => 'home',
                'slug' => 'home',
                'content' => '<div>The home page.</div>',
                'created_at' => '2021-03-21 07:21:45',
                'updated_at' => '2021-03-21 07:21:45',
            ),
            1 => 
            array (
                'id' => 2,
                'is_default_home' => NULL,
                'is_default_not_found' => NULL,
                'title' => 'about',
                'slug' => 'about',
                'content' => '<div>The about page.</div>',
                'created_at' => '2021-03-21 07:22:05',
                'updated_at' => '2021-03-21 07:22:05',
            ),
            2 => 
            array (
                'id' => 3,
                'is_default_home' => NULL,
                'is_default_not_found' => 1,
                'title' => 'not-found',
                'slug' => 'not-found',
                'content' => '<div>The not found page.</div>',
                'created_at' => '2021-03-21 07:22:36',
                'updated_at' => '2021-03-21 07:22:36',
            ),
            3 => 
            array (
                'id' => 4,
                'is_default_home' => NULL,
                'is_default_not_found' => NULL,
                'title' => 'contact',
                'slug' => 'contact',
                'content' => 'The contact page.',
                'created_at' => '2021-05-25 01:27:44',
                'updated_at' => '2021-05-25 01:27:44',
            ),
            4 => 
            array (
                'id' => 5,
                'is_default_home' => NULL,
                'is_default_not_found' => NULL,
                'title' => 'f-a-qs',
                'slug' => 'f-a-qs',
                'content' => 'the FaQs page.',
                'created_at' => '2022-04-22 22:16:44',
                'updated_at' => '2022-04-22 22:18:37',
            ),
        ));
        
        
    }
}
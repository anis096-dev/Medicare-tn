<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NavigationMenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('navigation_menus')->delete();
        
        \DB::table('navigation_menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'sequence' => 1,
                'type' => 'TopNav',
                'label' => 'Home',
                'slug' => 'home',
                'created_at' => '2021-03-21 07:23:05',
                'updated_at' => '2021-03-21 07:23:05',
            ),
            1 => 
            array (
                'id' => 2,
                'sequence' => 2,
                'type' => 'TopNav',
                'label' => 'About',
                'slug' => 'about',
                'created_at' => '2021-03-21 07:23:25',
                'updated_at' => '2021-03-21 07:23:25',
            ),
            2 => 
            array (
                'id' => 3,
                'sequence' => 3,
                'type' => 'TopNav',
                'label' => 'Contact',
                'slug' => 'contact',
                'created_at' => '2021-05-25 01:28:09',
                'updated_at' => '2021-05-25 01:28:09',
            ),
        ));
        
        
    }
}
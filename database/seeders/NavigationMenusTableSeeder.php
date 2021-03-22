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
        ));
        
        
    }
}
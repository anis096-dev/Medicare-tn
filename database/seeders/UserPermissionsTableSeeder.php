<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserPermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_permissions')->delete();
        
        \DB::table('user_permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role' => 'admin',
                'route_name' => 'dashboard',
                'created_at' => '2021-03-21 07:20:00',
                'updated_at' => '2021-03-21 07:20:00',
            ),
            1 => 
            array (
                'id' => 2,
                'role' => 'admin',
                'route_name' => 'pages',
                'created_at' => '2021-03-21 07:20:11',
                'updated_at' => '2021-03-21 07:20:11',
            ),
            2 => 
            array (
                'id' => 3,
                'role' => 'admin',
                'route_name' => 'navigation-menus',
                'created_at' => '2021-03-21 07:20:20',
                'updated_at' => '2021-03-21 07:20:20',
            ),
            3 => 
            array (
                'id' => 4,
                'role' => 'admin',
                'route_name' => 'users',
                'created_at' => '2021-03-21 07:20:29',
                'updated_at' => '2021-03-21 07:20:29',
            ),
        ));
        
        
    }
}
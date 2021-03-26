<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'created_at' => '2021-03-21 07:19:17',
                'updated_at' => '2021-03-21 07:19:17',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Patient',
                'created_at' => '2021-03-24 23:23:59',
                'updated_at' => '2021-03-24 23:23:59',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'E-health Care',
                'created_at' => '2021-03-24 23:24:15',
                'updated_at' => '2021-03-24 23:24:15',
            ),
        ));
        
        
    }
}
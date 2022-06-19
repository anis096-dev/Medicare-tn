<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('locations')->delete();
        
        \DB::table('locations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'delegation_id' => 1,
                'name' => 'Residence Kortoba',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
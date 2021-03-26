<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SpecialtiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('specialties')->delete();
        
        \DB::table('specialties')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Nurse',
                'description' => 'have many duties, including caring for patients, communicating with doctors, administering medicine and checking vital signs. nurses play a vital role in medical facilities and enjoy a large number of job opportunities.',
                'created_at' => '2021-03-24 23:42:39',
                'updated_at' => '2021-03-24 23:42:39',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Physiotherapist',
                'description' => 'Treatment to restore, maintain, and make the most of a patient\'s mobility, function, and well-being. It helps through physical rehabilitation, injury prevention, and health and fitness. Physiotherapists get you involved in your own recovery.',
                'created_at' => '2021-03-24 23:44:27',
                'updated_at' => '2021-03-24 23:44:27',
            ),
        ));
        
        
    }
}
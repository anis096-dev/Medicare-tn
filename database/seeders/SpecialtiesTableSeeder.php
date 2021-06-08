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
            2 => 
            array (
                'id' => 3,
                'name' => 'Audioprosthetist',
                'description' => 'The hearing aid acoustician is a professional health technician. He designs, manufactures and adapts hearing aids intended for hearing-impaired or deaf patients.',
                'created_at' => '2021-06-08 18:03:39',
                'updated_at' => '2021-06-08 18:11:35',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Care-giver',
                'description' => 'it ensures the hygiene and comfort of the patient under the responsibility of the nurse. It contributes to the care of the sick.',
                'created_at' => '2021-06-08 18:08:40',
                'updated_at' => '2021-06-08 18:12:42',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Child care assistant',
                'description' => 'Participates in the learning of babies, while ensuring their well-being, provides routine care to newborns, which "initiates" mothers to the care of toddlers.',
                'created_at' => '2021-06-08 18:17:24',
                'updated_at' => '2021-06-08 18:17:24',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Pedicure-podiatrist',
                'description' => 'On the other hand, it treats benign pathologies of the epidermis, without bloodshed. Plantar warts, ingrown toenails, calluses, corns and partridge eye are part of the daily life of the chiropodist.',
                'created_at' => '2021-06-08 18:20:32',
                'updated_at' => '2021-06-08 18:20:32',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Speech Therapist',
                'description' => 'The speech therapist, who can only intervene on medical prescription, specializes in correcting communication disorders, written and oral, in children as well as in adults. A young and booming profession.',
                'created_at' => '2021-06-08 18:25:30',
                'updated_at' => '2021-06-08 18:25:30',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Psychomotor therapist',
                'description' => 'Rehabilitation specialist, works with children and adolescents in difficulty, but also with the elderly or disabled, to help them recover their bodily capacities. He or she plays on two tables: the physical and the psychological.',
                'created_at' => '2021-06-08 18:29:42',
                'updated_at' => '2021-06-08 18:29:42',
            ),
        ));
        
        
    }
}
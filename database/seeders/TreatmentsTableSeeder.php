<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TreatmentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('treatments')->delete();
        
        \DB::table('treatments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Injection',
                'description' => 'une injection est une méthode instrumentale utilisée pour introduire dans l\'organisme une substance à visée thérapeutique ou diagnostique.',
                'specialty' => 'Nurse',
                'created_at' => '2021-03-31 05:40:39',
                'updated_at' => '2021-03-31 05:46:27',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Pansement',
                'description' => 'Un pansement est un dispositif de protection permettant de recouvrir une plaie située sur la peau. ',
                'specialty' => 'Nurse',
                'created_at' => '2021-03-31 05:47:36',
                'updated_at' => '2021-03-31 05:47:36',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Ablabation points de surture/agrafes',
                'description' => 'La suture est un acte médical réalisée avec du fils ou des agrafes. Une fois la plaie cicatrisée, les fils non résorbables et les agrafes sont retirés. Ce soin peut être réalisé à domicile par une infirmière libérale.',
                'specialty' => 'Nurse',
                'created_at' => '2021-03-31 06:00:41',
                'updated_at' => '2021-03-31 06:00:41',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Aide à la toilette/aide à l\'habillage',
                'description' => 'Prendre en charge une personne très dépendante et de l’aider dans des actes simples mais essentiels, sécuriser ou rassurer la personne, à faire en sorte que les soins d’hygiène de base soient réalisés.',
                'specialty' => 'Nurse',
                'created_at' => '2021-03-31 06:09:35',
                'updated_at' => '2021-03-31 06:09:35',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Srveillance glycémie/diabète',
            'description' => 'Surveiller le glycémie de manière très régulière pour s\'assurer qu\'elle n\'est ni trop élevée (hyperglycémie), ni trop basse (hypoglycémie). L\'hyperglycémie est la cause de complications futures.',
                'specialty' => 'Nurse',
                'created_at' => '2021-03-31 06:14:07',
                'updated_at' => '2021-03-31 07:49:21',
            ),
        ));
        
        
    }
}
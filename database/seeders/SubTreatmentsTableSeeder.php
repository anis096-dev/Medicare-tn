<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubTreatmentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sub_treatments')->delete();
        
        \DB::table('sub_treatments')->insert(array (
            0 => 
            array (
                'id' => 1,
            'name' => 'Anticoagulant ( +controle des plaquettes)',
                'description' => 'La surveillance des anticoagulants par voie injectable.',
                'treatment' => 'Injection',
                'created_at' => '2021-03-31 08:14:37',
                'updated_at' => '2021-03-31 08:14:37',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Anti-inflammatoire',
            'description' => 'Les anti-inflammatoires non stéroïdiens (AINS) sont une classe de médicaments étendue, comprenant de nombreuses molécules telles que l\'ibuprofène. Ils agissent en bloquant la formation des prostaglandines, les substances responsables de l\'inflammation.',
                'treatment' => 'Injection',
                'created_at' => '2021-03-31 08:16:35',
                'updated_at' => '2021-03-31 08:16:35',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Antibiotique',
                'description' => 'Le diagnostic rapide et le traitement par injection intravitréenne d\'antibiotiques sont déterminants dans le pronostic évolutif du patient atteint d\'endophtalmie.',
                'treatment' => 'Injection',
                'created_at' => '2021-03-31 08:18:33',
                'updated_at' => '2021-03-31 08:18:33',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Vitamine',
                'description' => 'L\'injection de vitamines pour hydrater et donner de l\'éclat au visage se banalise, jusqu\'à devenir un soin comme les autres.',
                'treatment' => 'Injection',
                'created_at' => '2021-03-31 08:21:07',
                'updated_at' => '2021-03-31 08:21:07',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Vaccin',
            'description' => 'Il consiste à injecter dans le corps un agent infectieux (virus ou bactérie), sous une forme inoffensive mais stimulant la réponse immunitaire de l\'organisme. une exposition ultérieure à l\'agent infectieux déclenchera une réponse rapide et efficace.',
                'treatment' => 'Injection',
                'created_at' => '2021-03-31 08:24:10',
                'updated_at' => '2021-03-31 08:24:10',
            ),
        ));
        
        
    }
}
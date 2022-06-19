<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DelegationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('delegations')->delete();
        
        \DB::table('delegations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'governorate_id' => 1,
                'name' => 'Ariana Ville',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'governorate_id' => 1,
                'name' => 'Sidi Thabet',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'governorate_id' => 1,
                'name' => 'La Soukra',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'governorate_id' => 1,
                'name' => 'Kalaat Landlous',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'governorate_id' => 1,
                'name' => 'Raoued',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'governorate_id' => 1,
                'name' => 'Mnihla',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'governorate_id' => 1,
                'name' => 'Ettadhamen',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'governorate_id' => 2,
                'name' => 'Testour',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'governorate_id' => 2,
                'name' => 'Teboursouk',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'governorate_id' => 2,
                'name' => 'Beja Nord',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'governorate_id' => 2,
                'name' => 'Mejez El Bab',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'governorate_id' => 2,
                'name' => 'Nefza',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'governorate_id' => 2,
                'name' => 'Beja Sud',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'governorate_id' => 2,
                'name' => 'Thibar',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'governorate_id' => 2,
                'name' => 'Amdoun',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'governorate_id' => 2,
                'name' => 'Goubellat',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'governorate_id' => 3,
                'name' => 'Fouchana',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'governorate_id' => 3,
                'name' => 'Hammam Lif',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'governorate_id' => 3,
                'name' => 'El Mourouj',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'governorate_id' => 3,
                'name' => 'Bou Mhel El Bassatine',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'governorate_id' => 3,
                'name' => 'Rades',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'governorate_id' => 3,
                'name' => 'Mohamadia',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'governorate_id' => 3,
                'name' => 'Megrine',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'governorate_id' => 3,
                'name' => 'Nouvelle Medina',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'governorate_id' => 3,
                'name' => 'Hammam Chatt',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'governorate_id' => 3,
                'name' => 'Mornag',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'governorate_id' => 3,
                'name' => 'Ezzahra',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'governorate_id' => 3,
                'name' => 'Ben Arous',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'governorate_id' => 4,
                'name' => 'Menzel Jemil',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'governorate_id' => 4,
                'name' => 'Bizerte Sud',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'governorate_id' => 4,
                'name' => 'Sejnane',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'governorate_id' => 4,
                'name' => 'Ghar El Melh',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'governorate_id' => 4,
                'name' => 'Menzel Bourguiba',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'governorate_id' => 4,
                'name' => 'Ras Jebel',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'governorate_id' => 4,
                'name' => 'Ghezala',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'governorate_id' => 4,
                'name' => 'Joumine',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'governorate_id' => 4,
                'name' => 'Utique',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'governorate_id' => 4,
                'name' => 'Bizerte Nord',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'governorate_id' => 4,
                'name' => 'El Alia',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'governorate_id' => 4,
                'name' => 'Mateur',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'governorate_id' => 4,
                'name' => 'Jarzouna',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'governorate_id' => 4,
                'name' => 'Tinja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'governorate_id' => 5,
                'name' => 'Gabes Sud',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'governorate_id' => 5,
                'name' => 'Matmata',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'governorate_id' => 5,
                'name' => 'Mareth',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'governorate_id' => 5,
                'name' => 'El Hamma',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'governorate_id' => 5,
                'name' => 'Nouvelle Matmata',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'governorate_id' => 5,
                'name' => 'Gabes Medina',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'governorate_id' => 5,
                'name' => 'Gabes Ouest',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'governorate_id' => 5,
                'name' => 'El Metouia',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'governorate_id' => 5,
                'name' => 'Ghannouche',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'governorate_id' => 5,
                'name' => 'Menzel Habib',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'governorate_id' => 6,
                'name' => 'Belkhir',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'governorate_id' => 6,
                'name' => 'Gafsa Nord',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
                'governorate_id' => 6,
                'name' => 'Sned',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
                'governorate_id' => 6,
                'name' => 'Redeyef',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'governorate_id' => 6,
                'name' => 'Gafsa Sud',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
                'governorate_id' => 6,
                'name' => 'El Guettar',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
                'governorate_id' => 6,
                'name' => 'El Ksar',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
                'governorate_id' => 6,
                'name' => 'Moulares',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 61,
                'governorate_id' => 6,
                'name' => 'El Mdhilla',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 62,
                'governorate_id' => 6,
                'name' => 'Metlaoui',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 63,
                'governorate_id' => 6,
                'name' => 'Sidi Aich',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 74,
                'governorate_id' => 7,
                'name' => 'Jendouba Nord',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 75,
                'governorate_id' => 7,
                'name' => 'Jendouba',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 76,
                'governorate_id' => 7,
                'name' => 'Ghardimaou',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 77,
                'governorate_id' => 7,
                'name' => 'Fernana',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 78,
                'governorate_id' => 7,
                'name' => 'Ain Draham',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 79,
                'governorate_id' => 7,
                'name' => 'Tabarka',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 80,
                'governorate_id' => 7,
                'name' => 'Bou Salem',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 81,
                'governorate_id' => 7,
                'name' => 'Balta Bou Aouene',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 82,
                'governorate_id' => 7,
                'name' => 'Oued Mliz',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 83,
                'governorate_id' => 8,
                'name' => 'Chebika',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 84,
                'governorate_id' => 8,
                'name' => 'El Ala',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 85,
                'governorate_id' => 8,
                'name' => 'Oueslatia',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 86,
                'governorate_id' => 8,
                'name' => 'Hajeb El Ayoun',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 87,
                'governorate_id' => 8,
                'name' => 'Sbikha',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 88,
                'governorate_id' => 8,
                'name' => 'Bou Hajla',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 89,
                'governorate_id' => 8,
                'name' => 'Kairouan Nord',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 90,
                'governorate_id' => 8,
                'name' => 'Kairouan Sud',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 91,
                'governorate_id' => 8,
                'name' => 'Haffouz',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 92,
                'governorate_id' => 8,
                'name' => 'Nasrallah',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 93,
                'governorate_id' => 8,
                'name' => 'Cherarda',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 94,
                'governorate_id' => 9,
                'name' => 'Sbeitla',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 95,
                'governorate_id' => 9,
                'name' => 'Foussana',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 96,
                'governorate_id' => 9,
                'name' => 'Kasserine Nord',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 97,
                'governorate_id' => 9,
                'name' => 'Haidra',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 98,
                'governorate_id' => 9,
                'name' => 'Thala',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 99,
                'governorate_id' => 9,
                'name' => 'Sbiba',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 100,
                'governorate_id' => 9,
                'name' => 'Feriana',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 101,
                'governorate_id' => 9,
                'name' => 'Mejel Bel Abbes',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 102,
                'governorate_id' => 9,
                'name' => 'Kasserine Sud',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 103,
                'governorate_id' => 9,
                'name' => 'El Ayoun',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 104,
                'governorate_id' => 9,
            'name' => 'Ezzouhour (Kasserine)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 105,
                'governorate_id' => 9,
                'name' => 'Jediliane',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 106,
                'governorate_id' => 9,
                'name' => 'Hassi El Frid',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 107,
                'governorate_id' => 10,
                'name' => 'Kebili Nord',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 108,
                'governorate_id' => 10,
                'name' => 'Kebili Sud',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 109,
                'governorate_id' => 10,
                'name' => 'Souk El Ahad',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 110,
                'governorate_id' => 10,
                'name' => 'Douz',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            100 => 
            array (
                'id' => 111,
                'governorate_id' => 10,
                'name' => 'El Faouar',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            101 => 
            array (
                'id' => 112,
                'governorate_id' => 11,
                'name' => 'Tajerouine',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            102 => 
            array (
                'id' => 113,
                'governorate_id' => 11,
                'name' => 'Dahmani',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            103 => 
            array (
                'id' => 114,
                'governorate_id' => 11,
                'name' => 'Le Kef Est',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            104 => 
            array (
                'id' => 115,
                'governorate_id' => 11,
                'name' => 'Sakiet Sidi Youssef',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            105 => 
            array (
                'id' => 116,
                'governorate_id' => 11,
                'name' => 'Le Sers',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            106 => 
            array (
                'id' => 117,
                'governorate_id' => 11,
                'name' => 'Nebeur',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            107 => 
            array (
                'id' => 118,
                'governorate_id' => 11,
                'name' => 'Touiref',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            108 => 
            array (
                'id' => 119,
                'governorate_id' => 11,
                'name' => 'El Ksour',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            109 => 
            array (
                'id' => 120,
                'governorate_id' => 11,
                'name' => 'Kalaa El Khasba',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            110 => 
            array (
                'id' => 121,
                'governorate_id' => 11,
                'name' => 'Kalaat Sinane',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            111 => 
            array (
                'id' => 122,
                'governorate_id' => 11,
                'name' => 'Jerissa',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            112 => 
            array (
                'id' => 123,
                'governorate_id' => 11,
                'name' => 'Le Kef Ouest',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            113 => 
            array (
                'id' => 124,
                'governorate_id' => 12,
                'name' => 'Mahdia
',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            114 => 
            array (
                'id' => 125,
                'governorate_id' => 12,
                'name' => 'Chorbane',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            115 => 
            array (
                'id' => 126,
                'governorate_id' => 12,
                'name' => 'El Jem',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            116 => 
            array (
                'id' => 127,
                'governorate_id' => 12,
                'name' => 'La Chebba',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            117 => 
            array (
                'id' => 128,
                'governorate_id' => 12,
                'name' => 'Bou Merdes',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            118 => 
            array (
                'id' => 129,
                'governorate_id' => 12,
                'name' => 'Ksour Essaf',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            119 => 
            array (
                'id' => 130,
                'governorate_id' => 12,
                'name' => 'Sidi Alouene',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            120 => 
            array (
                'id' => 131,
                'governorate_id' => 12,
                'name' => 'Hbira',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            121 => 
            array (
                'id' => 132,
                'governorate_id' => 12,
                'name' => 'Melloulech',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            122 => 
            array (
                'id' => 133,
                'governorate_id' => 12,
                'name' => 'Souassi',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            123 => 
            array (
                'id' => 134,
                'governorate_id' => 12,
                'name' => 'Ouled Chamakh',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            124 => 
            array (
                'id' => 135,
                'governorate_id' => 13,
                'name' => 'Jedaida',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            125 => 
            array (
                'id' => 136,
                'governorate_id' => 13,
                'name' => 'Tebourba',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            126 => 
            array (
                'id' => 137,
                'governorate_id' => 13,
                'name' => 'Mornaguia',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            127 => 
            array (
                'id' => 138,
                'governorate_id' => 13,
                'name' => 'Borj El Amri',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            128 => 
            array (
                'id' => 139,
                'governorate_id' => 13,
                'name' => 'El Battan',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            129 => 
            array (
                'id' => 140,
                'governorate_id' => 13,
                'name' => 'Oued Ellil',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            130 => 
            array (
                'id' => 141,
                'governorate_id' => 13,
                'name' => 'Douar Hicher',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            131 => 
            array (
                'id' => 142,
                'governorate_id' => 13,
                'name' => 'Mannouba',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            132 => 
            array (
                'id' => 143,
                'governorate_id' => 14,
                'name' => 'Medenine',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            133 => 
            array (
                'id' => 144,
                'governorate_id' => 15,
                'name' => 'Monastir',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            134 => 
            array (
                'id' => 145,
                'governorate_id' => 15,
                'name' => 'Sahline',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            135 => 
            array (
                'id' => 146,
                'governorate_id' => 15,
                'name' => 'Ksibet El Mediouni',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            136 => 
            array (
                'id' => 147,
                'governorate_id' => 15,
                'name' => 'Jemmal',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            137 => 
            array (
                'id' => 148,
                'governorate_id' => 15,
                'name' => 'Beni Hassen',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            138 => 
            array (
                'id' => 149,
                'governorate_id' => 15,
                'name' => 'Sayada Lamta Bou Hajar',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            139 => 
            array (
                'id' => 150,
                'governorate_id' => 15,
                'name' => 'Teboulba',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            140 => 
            array (
                'id' => 151,
                'governorate_id' => 15,
                'name' => 'Bembla',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            141 => 
            array (
                'id' => 152,
                'governorate_id' => 15,
                'name' => 'Zeramdine',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            142 => 
            array (
                'id' => 153,
                'governorate_id' => 15,
                'name' => 'Moknine',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            143 => 
            array (
                'id' => 154,
                'governorate_id' => 15,
                'name' => 'Ouerdanine',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            144 => 
            array (
                'id' => 155,
                'governorate_id' => 15,
                'name' => 'Bekalta',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            145 => 
            array (
                'id' => 156,
                'governorate_id' => 15,
                'name' => 'Beni Hassen',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            146 => 
            array (
                'id' => 158,
                'governorate_id' => 16,
                'name' => 'Beni Khiar',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            147 => 
            array (
                'id' => 159,
                'governorate_id' => 16,
                'name' => 'Takelsa',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            148 => 
            array (
                'id' => 160,
                'governorate_id' => 16,
                'name' => 'El Mida',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            149 => 
            array (
                'id' => 161,
                'governorate_id' => 16,
                'name' => 'Menzel Bouzelfa',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            150 => 
            array (
                'id' => 162,
                'governorate_id' => 16,
                'name' => 'Kelibia',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            151 => 
            array (
                'id' => 163,
                'governorate_id' => 16,
                'name' => 'Hammamet',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            152 => 
            array (
                'id' => 164,
                'governorate_id' => 16,
                'name' => 'Bou Argoub',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            153 => 
            array (
                'id' => 165,
                'governorate_id' => 16,
                'name' => 'Korba',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            154 => 
            array (
                'id' => 166,
                'governorate_id' => 16,
                'name' => 'Menzel Temime',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            155 => 
            array (
                'id' => 167,
                'governorate_id' => 16,
                'name' => 'Nabeul',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            156 => 
            array (
                'id' => 168,
                'governorate_id' => 16,
                'name' => 'El Haouaria',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            157 => 
            array (
                'id' => 169,
                'governorate_id' => 16,
                'name' => 'Hammam El Ghezaz',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            158 => 
            array (
                'id' => 170,
                'governorate_id' => 16,
                'name' => 'Soliman',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            159 => 
            array (
                'id' => 171,
                'governorate_id' => 16,
                'name' => 'Grombalia',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            160 => 
            array (
                'id' => 172,
                'governorate_id' => 16,
                'name' => 'Dar Chaabane Elfehri',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            161 => 
            array (
                'id' => 173,
                'governorate_id' => 16,
                'name' => 'Beni Khalled',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            162 => 
            array (
                'id' => 174,
                'governorate_id' => 17,
                'name' => 'Sfax Est',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            163 => 
            array (
                'id' => 175,
                'governorate_id' => 17,
                'name' => 'Sfax Sud',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            164 => 
            array (
                'id' => 176,
                'governorate_id' => 17,
                'name' => 'Agareb',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            165 => 
            array (
                'id' => 177,
                'governorate_id' => 17,
                'name' => 'El Hencha',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            166 => 
            array (
                'id' => 178,
                'governorate_id' => 17,
                'name' => 'Mahras',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            167 => 
            array (
                'id' => 179,
                'governorate_id' => 17,
                'name' => 'Sfax Ville',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            168 => 
            array (
                'id' => 180,
                'governorate_id' => 17,
                'name' => 'El Amra',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            169 => 
            array (
                'id' => 181,
                'governorate_id' => 17,
                'name' => 'Bir Ali Ben Khelifa',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            170 => 
            array (
                'id' => 182,
                'governorate_id' => 17,
                'name' => 'Kerkenah',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            171 => 
            array (
                'id' => 183,
                'governorate_id' => 17,
                'name' => 'Sakiet Eddaier',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            172 => 
            array (
                'id' => 184,
                'governorate_id' => 17,
                'name' => 'Jebeniana',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            173 => 
            array (
                'id' => 185,
                'governorate_id' => 17,
                'name' => 'Sakiet Ezzit',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            174 => 
            array (
                'id' => 186,
                'governorate_id' => 17,
                'name' => 'Menzel Chaker',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            175 => 
            array (
                'id' => 187,
                'governorate_id' => 17,
                'name' => 'Esskhira',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            176 => 
            array (
                'id' => 188,
                'governorate_id' => 17,
                'name' => 'Ghraiba',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            177 => 
            array (
                'id' => 189,
                'governorate_id' => 18,
                'name' => 'Sidi Bouzid Ouest',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            178 => 
            array (
                'id' => 190,
                'governorate_id' => 18,
                'name' => 'Sidi Bouzid Est',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            179 => 
            array (
                'id' => 191,
                'governorate_id' => 18,
                'name' => 'Menzel Bouzaiene',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            180 => 
            array (
                'id' => 192,
                'governorate_id' => 18,
                'name' => 'Ben Oun',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            181 => 
            array (
                'id' => 193,
                'governorate_id' => 18,
                'name' => 'Ouled Haffouz',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            182 => 
            array (
                'id' => 194,
                'governorate_id' => 18,
                'name' => 'Regueb',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            183 => 
            array (
                'id' => 195,
                'governorate_id' => 18,
                'name' => 'Maknassy',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            184 => 
            array (
                'id' => 196,
                'governorate_id' => 18,
                'name' => 'Jilma',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            185 => 
            array (
                'id' => 197,
                'governorate_id' => 18,
                'name' => 'Souk Jedid',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            186 => 
            array (
                'id' => 198,
                'governorate_id' => 18,
                'name' => 'Mezzouna',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            187 => 
            array (
                'id' => 199,
                'governorate_id' => 18,
                'name' => 'Bir El Haffey',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            188 => 
            array (
                'id' => 200,
                'governorate_id' => 18,
                'name' => 'Cebbala',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            189 => 
            array (
                'id' => 201,
                'governorate_id' => 19,
                'name' => 'Siliana Nord',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            190 => 
            array (
                'id' => 202,
                'governorate_id' => 19,
                'name' => 'Siliana Sud',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            191 => 
            array (
                'id' => 203,
                'governorate_id' => 19,
                'name' => 'Makthar',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            192 => 
            array (
                'id' => 204,
                'governorate_id' => 19,
                'name' => 'Bou Arada',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            193 => 
            array (
                'id' => 205,
                'governorate_id' => 19,
                'name' => 'Sidi Bou Rouis',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            194 => 
            array (
                'id' => 206,
                'governorate_id' => 19,
                'name' => 'Kesra',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            195 => 
            array (
                'id' => 207,
                'governorate_id' => 19,
                'name' => 'Bargou',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            196 => 
            array (
                'id' => 208,
                'governorate_id' => 19,
                'name' => 'El Aroussa',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            197 => 
            array (
                'id' => 209,
                'governorate_id' => 19,
                'name' => 'Le Krib',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            198 => 
            array (
                'id' => 210,
                'governorate_id' => 19,
                'name' => 'Rohia',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            199 => 
            array (
                'id' => 211,
                'governorate_id' => 19,
                'name' => 'Gaafour',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            200 => 
            array (
                'id' => 212,
                'governorate_id' => 20,
                'name' => 'Sousse Ville',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            201 => 
            array (
                'id' => 213,
                'governorate_id' => 20,
                'name' => 'Sousse Jaouhara',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            202 => 
            array (
                'id' => 214,
                'governorate_id' => 20,
                'name' => 'Sousse Riadh',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            203 => 
            array (
                'id' => 215,
                'governorate_id' => 20,
                'name' => 'Sidi El Heni',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            204 => 
            array (
                'id' => 216,
                'governorate_id' => 20,
                'name' => 'Bou Ficha',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            205 => 
            array (
                'id' => 217,
                'governorate_id' => 20,
                'name' => 'Enfidha',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            206 => 
            array (
                'id' => 218,
                'governorate_id' => 20,
                'name' => 'Kalaa El Kebira',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            207 => 
            array (
                'id' => 219,
                'governorate_id' => 20,
                'name' => 'Hammam Sousse',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            208 => 
            array (
                'id' => 220,
                'governorate_id' => 20,
                'name' => 'Hergla',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            209 => 
            array (
                'id' => 221,
                'governorate_id' => 20,
                'name' => 'Msaken',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            210 => 
            array (
                'id' => 222,
                'governorate_id' => 20,
                'name' => 'Kondar',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            211 => 
            array (
                'id' => 223,
                'governorate_id' => 20,
                'name' => 'Sidi Bou Ali',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            212 => 
            array (
                'id' => 224,
                'governorate_id' => 20,
                'name' => 'Kalaa Essghira',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            213 => 
            array (
                'id' => 225,
                'governorate_id' => 20,
                'name' => 'Akouda',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            214 => 
            array (
                'id' => 226,
                'governorate_id' => 21,
                'name' => 'Tataouine Nord',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            215 => 
            array (
                'id' => 227,
                'governorate_id' => 21,
                'name' => 'Tataouine Sud',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            216 => 
            array (
                'id' => 228,
                'governorate_id' => 21,
                'name' => 'Smar',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            217 => 
            array (
                'id' => 229,
                'governorate_id' => 21,
                'name' => 'Bir Lahmar',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            218 => 
            array (
                'id' => 230,
                'governorate_id' => 21,
                'name' => 'Ghomrassen',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            219 => 
            array (
                'id' => 231,
                'governorate_id' => 21,
                'name' => 'Remada',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            220 => 
            array (
                'id' => 232,
                'governorate_id' => 21,
                'name' => 'Dhehiba',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            221 => 
            array (
                'id' => 233,
                'governorate_id' => 22,
                'name' => 'Tozeur',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            222 => 
            array (
                'id' => 234,
                'governorate_id' => 22,
                'name' => 'Degueche',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            223 => 
            array (
                'id' => 235,
                'governorate_id' => 22,
                'name' => 'Tameghza',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            224 => 
            array (
                'id' => 236,
                'governorate_id' => 22,
                'name' => 'Hezoua',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            225 => 
            array (
                'id' => 237,
                'governorate_id' => 22,
                'name' => 'Nefta',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            226 => 
            array (
                'id' => 238,
                'governorate_id' => 23,
                'name' => 'Jebel Jelloud',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            227 => 
            array (
                'id' => 239,
                'governorate_id' => 23,
                'name' => 'Carthage',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            228 => 
            array (
                'id' => 240,
                'governorate_id' => 23,
                'name' => 'La Marsa',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            229 => 
            array (
                'id' => 241,
                'governorate_id' => 23,
                'name' => 'Bab Bhar',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            230 => 
            array (
                'id' => 242,
                'governorate_id' => 23,
                'name' => 'La Goulette',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            231 => 
            array (
                'id' => 243,
                'governorate_id' => 23,
                'name' => 'Le Bardo',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            232 => 
            array (
                'id' => 244,
                'governorate_id' => 23,
                'name' => 'La Medina',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            233 => 
            array (
                'id' => 245,
                'governorate_id' => 23,
                'name' => 'El Menzah',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            234 => 
            array (
                'id' => 246,
                'governorate_id' => 23,
                'name' => 'El Omrane Superieur',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            235 => 
            array (
                'id' => 247,
                'governorate_id' => 23,
                'name' => 'Cite El Khadra',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            236 => 
            array (
                'id' => 248,
                'governorate_id' => 23,
                'name' => 'El Hrairia',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            237 => 
            array (
                'id' => 249,
                'governorate_id' => 23,
                'name' => 'El Kabbaria',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            238 => 
            array (
                'id' => 250,
                'governorate_id' => 23,
                'name' => 'Bab Souika',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            239 => 
            array (
                'id' => 251,
                'governorate_id' => 23,
                'name' => 'El Omrane',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            240 => 
            array (
                'id' => 252,
                'governorate_id' => 23,
            'name' => 'Ezzouhour (Tunis)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            241 => 
            array (
                'id' => 253,
                'governorate_id' => 23,
                'name' => 'Sidi El Bechir',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            242 => 
            array (
                'id' => 254,
                'governorate_id' => 23,
                'name' => 'El Kram',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            243 => 
            array (
                'id' => 255,
                'governorate_id' => 23,
                'name' => 'Sidi Hassine',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            244 => 
            array (
                'id' => 256,
                'governorate_id' => 23,
                'name' => 'Essijoumi',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            245 => 
            array (
                'id' => 257,
                'governorate_id' => 23,
                'name' => 'Ettahrir',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            246 => 
            array (
                'id' => 258,
                'governorate_id' => 23,
                'name' => 'El Ouerdia',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            247 => 
            array (
                'id' => 259,
                'governorate_id' => 24,
                'name' => 'Zaghouan',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            248 => 
            array (
                'id' => 260,
                'governorate_id' => 24,
                'name' => 'Ennadhour',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            249 => 
            array (
                'id' => 261,
                'governorate_id' => 24,
                'name' => 'El Fahs',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            250 => 
            array (
                'id' => 262,
                'governorate_id' => 24,
                'name' => 'Bir Mcherga',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            251 => 
            array (
                'id' => 263,
                'governorate_id' => 24,
                'name' => 'Hammam Zriba',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            252 => 
            array (
                'id' => 264,
                'governorate_id' => 24,
                'name' => 'Saouef',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
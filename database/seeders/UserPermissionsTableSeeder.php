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
            4 => 
            array (
                'id' => 5,
                'role' => 'admin',
                'route_name' => 'roles',
                'created_at' => '2021-03-24 23:24:29',
                'updated_at' => '2021-03-24 23:24:29',
            ),
            5 => 
            array (
                'id' => 6,
                'role' => 'admin',
                'route_name' => 'user-permissions',
                'created_at' => '2021-03-24 23:24:29',
                'updated_at' => '2021-03-24 23:24:29',
            ),
            6 => 
            array (
                'id' => 7,
                'role' => 'admin',
                'route_name' => 'Specialties',
                'created_at' => '2021-03-24 23:24:29',
                'updated_at' => '2021-03-24 23:24:29',
            ),
            7 => 
            array (
                'id' => 8,
                'role' => 'admin',
                'route_name' => 'treatments',
                'created_at' => '2021-03-24 23:24:29',
                'updated_at' => '2021-03-24 23:24:29',
            ),
            8 => 
            array (
                'id' => 9,
                'role' => 'admin',
                'route_name' => 'sub-treatments',
                'created_at' => '2021-03-24 23:24:29',
                'updated_at' => '2021-03-24 23:24:29',
            ),
            9 => 
            array (
                'id' => 10,
                'role' => 'admin',
                'route_name' => 'all-appointments',
                'created_at' => '2021-03-24 23:24:29',
                'updated_at' => '2021-03-24 23:24:29',
            ),
            10 => 
            array (
                'id' => 11,
                'role' => 'admin',
                'route_name' => 'contacts-from-website',
                'created_at' => '2021-03-24 23:24:29',
                'updated_at' => '2021-03-24 23:24:29',
            ),
            11 => 
            array (
                'id' => 12,
                'role' => 'Patient',
                'route_name' => 'dashboard',
                'created_at' => '2021-03-24 23:24:38',
                'updated_at' => '2021-03-24 23:24:38',
            ),
            12 => 
            array (
                'id' => 13,
                'role' => 'Patient',
                'route_name' => 'patient-appointments',
                'created_at' => '2021-05-25 01:22:54',
                'updated_at' => '2021-05-25 01:22:54',
            ),
            13 => 
            array (
                'id' => 14,
                'role' => 'Health specialist',
                'route_name' => 'dashboard',
                'created_at' => '2021-03-24 23:24:47',
                'updated_at' => '2021-03-24 23:24:47',
            ),
            14 => 
            array (
                'id' => 15,
                'role' => 'Health specialist',
                'route_name' => 'user-experience',
                'created_at' => '2021-03-24 23:24:47',
                'updated_at' => '2021-03-24 23:24:47',
            ),
            15 => 
            array (
                'id' => 16,
                'role' => 'Health specialist',
                'route_name' => 'user-education',
                'created_at' => '2021-03-24 23:24:47',
                'updated_at' => '2021-03-24 23:24:47',
            ),
            16 => 
            array (
                'id' => 17,
                'role' => 'Health specialist',
                'route_name' => 'user-time-settings',
                'created_at' => '2021-03-24 23:24:47',
                'updated_at' => '2021-03-24 23:24:47',
            ),
            17 => 
            array (
                'id' => 18,
                'role' => 'Health specialist',
                'route_name' => 'e-health-appointments',
                'created_at' => '2021-05-25 01:22:44',
                'updated_at' => '2021-05-25 01:22:44',
            ),
            18 => 
            array (
                'id' => 19,
                'role' => 'Patient',
                'route_name' => 'treatments-prices',
                'created_at' => '2022-04-23 00:10:31',
                'updated_at' => '2022-04-23 00:10:31',
            ),
            19 => 
            array (
                'id' => 20,
                'role' => 'Health specialist',
                'route_name' => 'treatments-prices',
                'created_at' => '2022-04-23 00:10:49',
                'updated_at' => '2022-04-23 00:10:49',
            ),
            20 => 
            array (
                'id' => 21,
                'role' => 'Patient',
                'route_name' => 'register-step2',
                'created_at' => '2022-05-11 12:00:10',
                'updated_at' => '2022-05-11 12:00:10',
            ),
            21 => 
            array (
                'id' => 22,
                'role' => 'Health specialist',
                'route_name' => 'register-step2',
                'created_at' => '2022-05-11 12:00:41',
                'updated_at' => '2022-05-11 12:00:41',
            ),
            22 => 
            array (
                'id' => 23,
                'role' => 'Health specialist',
                'route_name' => 'ensure-identity',
                'created_at' => '2022-05-11 12:00:55',
                'updated_at' => '2022-05-11 12:00:55',
            ),
            23 => 
            array (
                'id' => 26,
                'role' => 'admin',
                'route_name' => 'user.show',
                'created_at' => '2022-05-11 12:22:58',
                'updated_at' => '2022-05-11 12:22:58',
            ),
            24 => 
            array (
                'id' => 27,
                'role' => 'Patient',
                'route_name' => 'user.show',
                'created_at' => '2022-05-11 12:23:36',
                'updated_at' => '2022-05-11 12:23:36',
            ),
            25 => 
            array (
                'id' => 28,
                'role' => 'Health specialist',
                'route_name' => 'user.show',
                'created_at' => '2022-05-11 12:23:45',
                'updated_at' => '2022-05-11 12:23:45',
            ),
            26 => 
            array (
                'id' => 29,
                'role' => 'admin',
                'route_name' => 'add-phone',
                'created_at' => '2022-05-11 12:24:49',
                'updated_at' => '2022-05-11 12:24:49',
            ),
            27 => 
            array (
                'id' => 30,
                'role' => 'Patient',
                'route_name' => 'add-phone',
                'created_at' => '2022-05-11 12:25:00',
                'updated_at' => '2022-05-11 12:25:00',
            ),
            28 => 
            array (
                'id' => 31,
                'role' => 'Health specialist',
                'route_name' => 'add-phone',
                'created_at' => '2022-05-11 12:25:08',
                'updated_at' => '2022-05-11 12:25:08',
            ),
            29 => 
            array (
                'id' => 32,
                'role' => 'admin',
                'route_name' => 'admin-faqs',
                'created_at' => '2022-05-13 08:56:15',
                'updated_at' => '2022-05-13 08:56:15',
            ),
        ));
        
        
    }
}
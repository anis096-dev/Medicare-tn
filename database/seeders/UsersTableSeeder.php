<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role' => 'admin',
                'specialty' => NULL,
                'name' => 'Admin',
                'gender' => 'male',
                'date_of_birth' => NULL,
                'tel' => NULL,
                'adresse' => 'Rue el mar, Tunis, تونس, Tunisia',
                'bio' => NULL,
                'email' => 'admin@admin.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$idmPr5ADvyGmiEKHW.Xnu.LMZsMLUK0KAkoSpvEyp8DYJlkAsmk2e',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => 'BDmxyOmUU5YQvwpX8DSr1RyIe20Po5OF6RavTjDYbXkev5DF5P4sW3MYizjx',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2021-03-21 07:16:51',
                'updated_at' => '2021-04-07 21:00:47',
                'last_seen' => '2021-04-07 21:00:47',
            ),
            1 => 
            array (
                'id' => 2,
                'role' => 'E-health Care',
                'specialty' => 'Nurse',
                'name' => 'anis',
                'gender' => 'male',
                'date_of_birth' => '1996-05-09',
                'tel' => '25219853',
                'adresse' => 'Tunis, تونس, Tunisia',
                'bio' => 'A person who cares for the sick or infirm specifically : a licensed health-care professional who practices independently or is supervised by a physician, surgeon, ...',
                'email' => 'Anis@test.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$S4C/7LipCyDhLdBQXyi3p.ScWPNoNKIolWFkqBYaV9M819.LGCsyu',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => '6EE7bS3uptnedgMlmK53mmdu9oVMa2hT7RtxeQ4M3X5v8Ax8HqYlfIlxt9bK',
                'current_team_id' => NULL,
                'profile_photo_path' => 'profile-photos/Cp3yUEtXQMFLNkXwzobJQT0wfc2lwAbZnVZZXES5.jpg',
                'created_at' => '2021-03-31 07:43:49',
                'updated_at' => '2021-04-07 07:52:25',
                'last_seen' => '2021-04-04 09:13:12',
            ),
            2 => 
            array (
                'id' => 3,
                'role' => 'E-health Care',
                'specialty' => 'Nurse',
                'name' => 'ahmed',
                'gender' => 'male',
                'date_of_birth' => '2017-03-02',
                'tel' => '22222222',
                'adresse' => 'Tunis, تونس, Tunisia',
                'bio' => NULL,
                'email' => 'Ahmed@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$5PlMleN8Yfel1wuwWRqp1u1KcKRaMq99qqROE8.c4BEV6lChLmByi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2021-04-03 22:35:26',
                'updated_at' => '2021-04-04 04:44:26',
                'last_seen' => '2021-04-03 23:22:09',
            ),
            3 => 
            array (
                'id' => 4,
                'role' => 'Patient',
                'specialty' => NULL,
                'name' => 'amina',
                'gender' => 'female',
                'date_of_birth' => '1996-05-07',
                'tel' => '23451244',
                'adresse' => 'rue 10808, Tunis, تونس, Tunisia',
                'bio' => NULL,
                'email' => 'amina@test.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$vN/vJjnA6k/.kMY1cmE8R.2TWpSB..fNFObxpb0QGVccWACjREvFm',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2021-04-03 23:23:33',
                'updated_at' => '2021-04-03 23:28:09',
                'last_seen' => '2021-04-03 23:28:09',
            ),
            4 => 
            array (
                'id' => 5,
                'role' => 'E-health Care',
                'specialty' => 'Physiotherapist',
                'name' => 'amin',
                'gender' => 'male',
                'date_of_birth' => '1995-01-01',
                'tel' => '23456788',
                'adresse' => 'Borj Cédria, Tunisia, بن عروس, Tunisia',
                'bio' => 'Nurse from Tunisia!',
                'email' => 'amin@test.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$p4MrnVrLDCFP2J4dQuQ0f.I3V0.dHbOLsgNEliHTpDTA2ItZGemfW',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => 'qJaZZCBSeTd3udIAKLvsrZrDEbHMM0PTcB4qz2wlvqKn3Zi6ZZMwdS4rxzRM',
                'current_team_id' => NULL,
                'profile_photo_path' => 'profile-photos/gNojfdXc3THoP0ix7ghVQ9RaiuxQxush8wKkRA32.jpg',
                'created_at' => '2021-04-05 04:28:55',
                'updated_at' => '2021-04-07 07:52:18',
                'last_seen' => '2021-04-07 07:51:41',
            ),
            5 => 
            array (
                'id' => 6,
                'role' => 'E-health Care',
                'specialty' => 'Nurse',
                'name' => 'Nour',
                'gender' => 'female',
                'date_of_birth' => '1990-02-01',
                'tel' => '12222222',
                'adresse' => 'Monastir, المنستير, Tunisia',
                'bio' => 'NOYR4S PRRR',
                'email' => 'nour@test.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$u4jSIMfbmj8dwjdM.MEjSeGhGxQBmusS2u7jSGqLhFQVfpkg1Pb26',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2021-04-05 04:55:34',
                'updated_at' => '2021-04-05 05:12:27',
                'last_seen' => '2021-04-05 05:12:27',
            ),
            6 => 
            array (
                'id' => 7,
                'role' => 'E-health Care',
                'specialty' => 'Nurse',
                'name' => 'mohamed',
                'gender' => 'male',
                'date_of_birth' => '1993-02-02',
                'tel' => '34567728',
                'adresse' => 'Tabursuq, Bājah, Tunisia',
                'bio' => 'JVDLJVVLJV JLHGDLJHG LDJHGDJH GLDJHOJH',
                'email' => 'mohamed@test.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$CIWOsqhrJqBzJ7Q4voxyPe7YF4BrOUe8yDgQDtDmE1BcEv/JugMga',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2021-04-05 05:16:54',
                'updated_at' => '2021-04-05 05:39:37',
                'last_seen' => '2021-04-05 05:39:37',
            ),
            7 => 
            array (
                'id' => 8,
                'role' => 'E-health Care',
                'specialty' => 'Nurse',
                'name' => 'mohamed',
                'gender' => 'male',
                'date_of_birth' => '1993-02-02',
                'tel' => '34567728',
                'adresse' => 'Tabursuq, Bājah, Tunisia',
                'bio' => 'JVDLJVVLJV JLHGDLJHG LDJHGDJH GLDJHOJH',
                'email' => 'moh.ahmed@test.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$CIWOsqhrJqBzJ7Q4voxyPe7YF4BrOUe8yDgQDtDmE1BcEv/JugMga',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2021-04-05 05:16:54',
                'updated_at' => '2021-04-05 05:39:37',
                'last_seen' => '2021-04-05 05:39:37',
            ),
            8 => 
            array (
                'id' => 9,
                'role' => 'E-health Care',
                'specialty' => 'Physiotherapist',
                'name' => 'moufid',
                'gender' => 'male',
                'date_of_birth' => '1993-02-02',
                'tel' => '34567728',
                'adresse' => 'Tabursuq, Bājah, Tunisia',
                'bio' => 'JVDLJVVLJV JLHGDLJHG LDJHGDJH GLDJHOJH',
                'email' => 'meddebMoufid@test.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$CIWOsqhrJqBzJ7Q4voxyPe7YF4BrOUe8yDgQDtDmE1BcEv/JugMga',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2021-04-05 05:16:54',
                'updated_at' => '2021-04-05 05:39:37',
                'last_seen' => '2021-04-05 05:39:37',
            ),
            9 => 
            array (
                'id' => 10,
                'role' => 'E-health Care',
                'specialty' => 'Physiotherapist',
                'name' => 'moufida',
                'gender' => 'male',
                'date_of_birth' => '1993-02-02',
                'tel' => '34567728',
                'adresse' => 'Tabursuq, Bājah, Tunisia',
                'bio' => 'JVDLJVVLJV JLHGDLJHG LDJHGDJH GLDJHOJH',
                'email' => 'moufida@test.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$CIWOsqhrJqBzJ7Q4voxyPe7YF4BrOUe8yDgQDtDmE1BcEv/JugMga',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2021-04-05 05:16:54',
                'updated_at' => '2021-04-05 05:39:37',
                'last_seen' => '2021-04-05 05:39:37',
            ),
            10 => 
            array (
                'id' => 11,
                'role' => 'E-health Care',
                'specialty' => 'Nurse',
                'name' => 'moemen',
                'gender' => 'male',
                'date_of_birth' => '1993-02-02',
                'tel' => '34567728',
                'adresse' => 'Tabursuq, Bājah, Tunisia',
                'bio' => 'JVDLJVVLJV JLHGDLJHG LDJHGDJH GLDJHOJH',
                'email' => 'moemen@test.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$CIWOsqhrJqBzJ7Q4voxyPe7YF4BrOUe8yDgQDtDmE1BcEv/JugMga',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2021-04-05 05:16:54',
                'updated_at' => '2021-04-05 05:39:37',
                'last_seen' => '2021-04-05 05:39:37',
            ),
            11 => 
            array (
                'id' => 12,
                'role' => 'E-health Care',
                'specialty' => 'Physiotherapist',
                'name' => 'Marwen',
                'gender' => 'male',
                'date_of_birth' => '1993-02-02',
                'tel' => '34567728',
                'adresse' => 'Tabursuq, Bājah, Tunisia',
                'bio' => 'JVDLJVVLJV JLHGDLJHG LDJHGDJH GLDJHOJH',
                'email' => 'marwen@test.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$CIWOsqhrJqBzJ7Q4voxyPe7YF4BrOUe8yDgQDtDmE1BcEv/JugMga',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2021-04-05 05:16:54',
                'updated_at' => '2021-04-05 05:39:37',
                'last_seen' => '2021-04-05 05:39:37',
            ),
        ));
        
        
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(NavigationMenusTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(UserPermissionsTableSeeder::class);
        $this->call(SpecialtiesTableSeeder::class);
        $this->call(TreatmentsTableSeeder::class);
        $this->call(SubTreatmentsTableSeeder::class);
        $this->call(GovernoratesTableSeeder::class);
        $this->call(DelegationsTableSeeder::class);
    }
}

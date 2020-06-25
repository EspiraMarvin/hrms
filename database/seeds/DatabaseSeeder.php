<?php

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
        $this->call(UsersTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UserRolesSeeder::class);
        $this->call(UserSupervisorSeeder::class);
        $this->call(DirectoratesTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(LeavesTypeTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(CountiesTableSeeder::class);
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(UserRolesSeeder::class);
        $this->call(JobTypesSeeder::class);
        $this->call(DepartmentsSeeder::class);
        $this->call(PositionsSeeder::class);
        $this->call(SkillTypesSeeder::class);
        $this->call(EducationStatusesSeeder::class);
        $this->call(CareerStatusesSeeder::class);
        $this->call(SkillsSeeder::class);
        $this->call(JobsSeeder::class);
        $this->call(JobRequirementsSeeder::class);
    }
}

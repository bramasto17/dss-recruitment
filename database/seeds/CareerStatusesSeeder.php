<?php

use Illuminate\Database\Seeder;

class CareerStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        \DB::table('career_statuses')->truncate();
        \DB::table('career_statuses')->insert([
            [
                'name' => 'Volunteer',
                'grade' => 1,
            ],
            [
                'name' => 'Intern',
                'grade' => 2,
            ],
            [
                'name' => 'Part Time',
                'grade' => 3,
            ],
            [
                'name' => 'Contract Staff',
                'grade' => 4,
            ],
            [
                'name' => 'Permanent Staff',
                'grade' => 5,
            ],
            [
                'name' => 'Manager or Team Leader',
                'grade' => 6,
            ],
            [
                'name' => 'Board Member',
                'grade' => 7,
            ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}

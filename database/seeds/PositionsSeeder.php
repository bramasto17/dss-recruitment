<?php

use Illuminate\Database\Seeder;

class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        \DB::table('positions')->truncate();
        \DB::table('positions')->insert([
            [
                'department_id' => 1,
                'name' => 'Chief Executive Officer',
            ],
            [
                'department_id' => 1,
                'name' => 'Chief Technology Officer',
            ],
            [
                'department_id' => 1,
                'name' => 'Chief Financial Officer',
            ],
            [
                'department_id' => 2,
                'name' => 'Front End Developer',
            ],
            [
                'department_id' => 2,
                'name' => 'Back End Developer',
            ],
            [
                'department_id' => 3,
                'name' => 'Human Resource Leader',
            ],
            [
                'department_id' => 3,
                'name' => 'Recruitment Officer',
            ],
            [
                'department_id' => 4,
                'name' => 'Project Manager',
            ],
            [
                'department_id' => 5,
                'name' => 'Purchase Officer',
            ],
            [
                'department_id' => 5,
                'name' => 'Customer Service',
            ],
            [
                'department_id' => 6,
                'name' => 'Sales',
            ],
            [
                'department_id' => 9,
                'name' => 'Head of Research and Development',
            ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}

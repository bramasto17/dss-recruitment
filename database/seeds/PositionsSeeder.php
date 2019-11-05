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
                'name' => 'General Affairs',
            ],
            [
                'department_id' => 3,
                'name' => 'Recruitment Officer',
            ],
            [
                'department_id' => 4,
                'name' => 'Sales',
            ],
            [
                'department_id' => 5,
                'name' => 'Design',
            ],
            [
                'department_id' => 5,
                'name' => 'Welder',
            ]
        ]);
        Schema::enableForeignKeyConstraints();
    }
}

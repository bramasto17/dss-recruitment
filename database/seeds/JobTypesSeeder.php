<?php

use Illuminate\Database\Seeder;

class JobTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        \DB::table('job_types')->truncate();
        \DB::table('job_types')->insert([
            [
                'name' => 'Permanent',
            ],
            [
                'name' => 'Contract',
            ],
            [
                'name' => 'Part Time',
            ],
            [
                'name' => 'Internship',
            ]
        ]);
        Schema::enableForeignKeyConstraints();
    }
}

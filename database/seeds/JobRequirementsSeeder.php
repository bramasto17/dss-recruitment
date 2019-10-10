<?php

use Illuminate\Database\Seeder;

class JobRequirementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        \DB::table('job_requirements')->truncate();
        \DB::table('job_requirements')->insert([
            [
                'job_id' => 1,
                'job_requirement_type_id' => 1,
                'name' => 'CompSci graduate',
                'priority' => 1,
            ],
            [
                'job_id' => 1,
                'job_requirement_type_id' => 2,
                'name' => 'PHP',
                'priority' => 0,
            ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}

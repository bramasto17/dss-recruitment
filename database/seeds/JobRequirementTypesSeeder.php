<?php

use Illuminate\Database\Seeder;

class JobRequirementTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        \DB::table('job_requirement_types')->truncate();
        \DB::table('job_requirement_types')->insert(
            [
                'name' => 'Boolean',
            ],
            [
                'name' => 'Range',
            ]
        );
        Schema::enableForeignKeyConstraints();
    }
}

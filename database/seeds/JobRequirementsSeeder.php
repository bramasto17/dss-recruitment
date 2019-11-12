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
            // [
            //     'job_id' => 1,
            //     'skill_id' => 25,
            // ],
            // [
            //     'job_id' => 1,
            //     'skill_id' => 26,
            // ],
            // [
            //     'job_id' => 1,
            //     'skill_id' => 27,
            // ],
            // [
            //     'job_id' => 1,
            //     'skill_id' => 32,
            // ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}

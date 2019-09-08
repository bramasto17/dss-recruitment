<?php

use Illuminate\Database\Seeder;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        \DB::table('jobs')->truncate();
        \DB::table('jobs')->insert([
            [
                'position_id' => 4,
                'job_type_id' => 2,
            ],
            [
                'position_id' => 5,
                'job_type_id' => 2,
            ],
            [
                'position_id' => 10,
                'job_type_id' => 2,
            ],
            [
                'position_id' => 8,
                'job_type_id' => 3,
            ],
            [
                'position_id' => 9,
                'job_type_id' => 4,
            ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}

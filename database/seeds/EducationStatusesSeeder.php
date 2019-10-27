<?php

use Illuminate\Database\Seeder;

class EducationStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        \DB::table('education_statuses')->truncate();
        \DB::table('education_statuses')->insert([
            [
                'name' => 'SMP',
                'grade' => 1,
            ],
            [
                'name' => 'SMA',
                'grade' => 2,
            ],
            [
                'name' => 'D3',
                'grade' => 3,
            ],
            [
                'name' => 'S1',
                'grade' => 4,
            ],
            [
                'name' => 'S2',
                'grade' => 5,
            ],
            [
                'name' => 'S3',
                'grade' => 6,
            ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}

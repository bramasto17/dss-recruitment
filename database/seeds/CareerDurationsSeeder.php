<?php

use Illuminate\Database\Seeder;

class CareerDurationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        \DB::table('career_durations')->truncate();
        \DB::table('career_durations')->insert([
            [
                'name' => '< 1 Tahun',
                'grade' => 1,
            ],
            [
                'name' => '1 Tahun',
                'grade' => 2,
            ],
            [
                'name' => '2 Tahun',
                'grade' => 3,
            ],
            [
                'name' => '3 Tahun',
                'grade' => 4,
            ],
            [
                'name' => '4 Tahun',
                'grade' => 5,
            ],
            [
                'name' => '5 Tahun',
                'grade' => 6,
            ],
            [
                'name' => '> 5 Tahun',
                'grade' => 7,
            ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}

<?php

use Illuminate\Database\Seeder;

class ScoringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scoring = [
            // [
            //     'name' => 'requirement_score',
            //     'weight' => 3,
            //     'type' => 'benefit',
            // ],
            [
                'name' => 'education_score',
                'weight' => 1.5,
                'type' => 'benefit',
            ],
            [
                'name' => 'career_score',
                'weight' => 2,
                'type' => 'benefit',
            ],
            [
                'name' => 'skill_score',
                'weight' => 2.5,
                'type' => 'benefit',
            ],
            [
                'name' => 'age_score',
                'weight' => 0.5,
                'type' => 'cost',
            ],
            // [
            //     'name' => 'marital_score',
            //     'weight' => 0.5,
            //     'type' => 'bool_cost',
            // ]
        ];

        $scoring = json_encode($scoring);

        Schema::disableForeignKeyConstraints();
        \DB::table('scoring')->truncate();
        \DB::table('scoring')->insert([
            [
                'scoring' => $scoring,
            ]
        ]);
        Schema::enableForeignKeyConstraints();
    }
}

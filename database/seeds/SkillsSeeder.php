<?php

use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        \DB::table('skills')->truncate();
        \DB::table('skills')->insert([
            [
                'skill_type_id' => 1,
                'name' => 'English',
            ],
            [
                'skill_type_id' => 1,
                'name' => 'Bahasa Indonesia',
            ],
            [
                'skill_type_id' => 1,
                'name' => 'Bahasa Melayu',
            ],
            [
                'skill_type_id' => 1,
                'name' => 'Chinese',
            ],
            [
                'skill_type_id' => 1,
                'name' => 'Portuguese',
            ],
            [
                'skill_type_id' => 1,
                'name' => 'Latin',
            ],
            [
                'skill_type_id' => 1,
                'name' => 'French',
            ],
            [
                'skill_type_id' => 1,
                'name' => 'German',
            ],
            [
                'skill_type_id' => 1,
                'name' => 'Dutch',
            ],
            [
                'skill_type_id' => 1,
                'name' => 'Arabic',
            ],
            [
                'skill_type_id' => 1,
                'name' => 'Thai',
            ],
            [
                'skill_type_id' => 1,
                'name' => 'Vietnamese',
            ],
            [
                'skill_type_id' => 1,
                'name' => 'Filipino',
            ],
            [
                'skill_type_id' => 2,
                'name' => 'Communication',
            ],
            [
                'skill_type_id' => 2,
                'name' => 'Teamwork',
            ],
            [
                'skill_type_id' => 2,
                'name' => 'Adaptability',
            ],
            [
                'skill_type_id' => 2,
                'name' => 'Problem Solving',
            ],
            [
                'skill_type_id' => 2,
                'name' => 'Creativity',
            ],
            [
                'skill_type_id' => 2,
                'name' => 'Time Management',
            ],
            [
                'skill_type_id' => 2,
                'name' => 'Efficient',
            ],
            [
                'skill_type_id' => 2,
                'name' => 'Leadership',
            ],
            [
                'skill_type_id' => 2,
                'name' => 'Attention to Detail',
            ],
            [
                'skill_type_id' => 3,
                'name' => 'HTML',
            ],
            [
                'skill_type_id' => 3,
                'name' => 'JavaScript',
            ],
            [
                'skill_type_id' => 3,
                'name' => 'CSS',
            ],
            [
                'skill_type_id' => 3,
                'name' => 'JQuery',
            ],
            [
                'skill_type_id' => 3,
                'name' => 'AJAX',
            ],
            [
                'skill_type_id' => 3,
                'name' => 'MySQL',
            ],
            [
                'skill_type_id' => 3,
                'name' => 'PHP',
            ],
            [
                'skill_type_id' => 3,
                'name' => 'Laravel',
            ],
            [
                'skill_type_id' => 3,
                'name' => 'Lumen',
            ],
            [
                'skill_type_id' => 3,
                'name' => 'VueJS',
            ],
            [
                'skill_type_id' => 3,
                'name' => 'ReactJS',
            ],
            [
                'skill_type_id' => 3,
                'name' => 'AngularJS',
            ],
            [
                'skill_type_id' => 3,
                'name' => 'Database',
            ],
            [
                'skill_type_id' => 3,
                'name' => 'AWS',
            ],
            [
                'skill_type_id' => 3,
                'name' => 'Google Cloud Platform (GCP)',
            ],
            [
                'skill_type_id' => 3,
                'name' => 'Data Visualization',
            ],
            [
                'skill_type_id' => 3,
                'name' => 'Adobe Photoshop',
            ],
            [
                'skill_type_id' => 3,
                'name' => 'Adobe Illustrator',
            ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}

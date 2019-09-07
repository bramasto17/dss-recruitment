<?php

use Illuminate\Database\Seeder;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        \DB::table('departments')->truncate();
        \DB::table('departments')->insert([
            [
                'name' => 'Boards',
            ],
            [
                'name' => 'IT',
            ],
            [
                'name' => 'Human Resource',
            ],
            [
                'name' => 'Business',
            ],
            [
                'name' => 'Commercial',
            ],
            [
                'name' => 'Marketing',
            ],
            [
                'name' => 'Engineers',
            ]
        ]);
        Schema::enableForeignKeyConstraints();
    }
}

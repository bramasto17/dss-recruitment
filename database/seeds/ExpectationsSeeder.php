<?php

use Illuminate\Database\Seeder;

class ExpectationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        \DB::table('expectations')->truncate();
        \DB::table('expectations')->insert([
            [
                'name' => 'Mau di tempatkan dimana saja',
            ],
            [
                'name' => 'Gaji yang di harapkan',
            ],
            [
                'name' => 'Fasilitas yang di harapkan',
            ]
        ]);
        Schema::enableForeignKeyConstraints();
    }
}

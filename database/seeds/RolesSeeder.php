<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        \DB::table('roles')->truncate();
        \DB::table('roles')->insert([
            [
                'name' => 'Admin',
                'description' => 'Has all the rights',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]
        ]);
        Schema::enableForeignKeyConstraints();
    }
}

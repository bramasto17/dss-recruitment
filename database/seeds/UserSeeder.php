<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        \DB::table('users')->truncate();
        \DB::table('users')->insert([
            'name' => 'HR Manager',
            'email' => 'test@demo.com',
            'password' => bcrypt('123456'),
        ]);
        Schema::enableForeignKeyConstraints();
    }
}

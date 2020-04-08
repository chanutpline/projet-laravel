<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

     //appelle la fonction run() de la classe UserTableSeeder
    public function run()
    {
        $this->call(UsersTableSeeder::class);
    }
}

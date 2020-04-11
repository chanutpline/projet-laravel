<?php

use Illuminate\Database\Seeder;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        crée 20 utilisateurs à partir de la classe User et les entre dans la base de données
        pour chacun d'entre eux :
        crée des post à partir de la classe Post et les entre dans la base de données
        lie ces post avec les utilisateurs avec la fonction posts() de la classe User
        */ 
        factory(App\User::class, 20)->create()->each(function ($user) {
            $user->posts()->save(factory(App\Post::class)->create());
        });
    }
}
<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/


$factory->define(App\Post::class, function (Faker $faker) {
    $users = App\User::pluck('id')->toArray();//récupère dans un tableau tous les id de la table user
    //rempli les données avec les contraintes de la classe Post (modèle), ici toutefois les contraintes sont indiquées directement
    return [
        'user_id' => $faker->randomElement($users),//prend un élément aléatoirement dans $user
        'post_date' => now(),
        'post_content' => $faker->paragraph(),
        'post_title' => $faker->sentence(),
        'post_name' => $faker->unique()->word(),
        'post_type' => 'article',
        'post_status' => $faker->paragraph(),
        'post_category'=>$faker->paragraph()
    ];
});
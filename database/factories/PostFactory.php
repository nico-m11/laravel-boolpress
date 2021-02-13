<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PostModel;
use Faker\Generator as Faker;

$factory->define(PostModel::class, function (Faker $faker) {
    return [
        'title'=>$faker->word,
        'author'=>$faker->name,
        'image'=>$faker->imageUrl(200, true),
        'category_id'=>$faker->unique()->numberBetween(1, 20),
        'user_id'=>1
    ];
});

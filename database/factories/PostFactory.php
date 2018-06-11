<?php

use Faker\Generator as Faker;

$factory->define(\App\Post::class, function (Faker $faker) {

    $tags = collect(['php', 'ruby', 'java', 'javascript', 'bash'])
        ->random(3)
        ->values()
        ->all();

    return [
        'title' => $faker->sentence,
        'body' => $faker->text,
        'tags' => $tags,
    ];

});



<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use App\Models\User;
use Faker\Generator as Faker;
use App\Image;
use Illuminate\Http\UploadedFile;

$factory->define(Article::class, function (Faker $faker) {

    $file = UploadedFile::fake()->image('item.jpg'); 
    $path = $file->store('public');
    $read_temp_path = str_replace('public/', '/storage/', $path);

    return [
        'title' => $faker->text(50),
        'body' => $faker->text(500),
        'article_image_file_name' => $read_temp_path,
        'user_id' => function() {
            return factory(User::class);
        }
    ];
});

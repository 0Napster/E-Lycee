<?php
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    $roleTable = ['teacher', 'final_class', 'first_class'];
    $rand = rand(0, 2);

    return [
        'username' => $faker->name,
        'password' => $password = bcrypt('soleil'),
        'remember_token' => str_random(10),
        'role' => $roleTable[$rand]
    ];
});

$factory->define(\App\Post::class, function (Faker\Generator $faker) {
    $statusTable = ['published', 'unpublished', 'trashed'];
    $rand = rand(0, 2);

    $date = new DateTime($faker->date);
    $date = strval($date->format('d/m/Y'));

    return [
        'user_id' => 1,
        'title' => $faker->sentence,
        'abstract' => $faker->sentence,
        'content' => $faker->text(255),
        'url_thumbnail' => $faker->imageUrl(),
        'date' => $date,
        'status' => $statusTable[$rand]
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    $id = rand(1,9);
    return [
        'title' => $faker->sentence($nbWords = 1, $variableNbWords = true),
        'content' => $faker->paragraph(1),
        'post_id' => $id,
        'date' => $faker->dateTime($max = 'now'),
    ];
});

$factory->define(\App\Question::class, function (Faker\Generator $faker) {
    $statusTable = ['published', 'unpublished'];
    $rand = rand(0, 1);
    $class_levelTable = ['terminale', 'premiere'];
    $rand2 = rand(0, 1);

    return [
        'title' => $faker->sentence,
        'content' => $faker->paragraph(),
        'class_level' => $class_levelTable[$rand2],
        'status' => $statusTable[$rand]
    ];
});

$factory->define(\App\Choice::class, function (Faker\Generator $faker) {
    $rand = rand(1, 4);
    $statusTable = ['yes', 'no'];
    $rand2 = rand(0, 1);

    return [
        'question_id' => $rand,
        'content' => $faker->paragraph(),
        'status' => $statusTable[$rand2]
    ];
});


$factory->define(\App\Score::class, function (Faker\Generator $faker) {
    $userID = rand(2, 7);
    $questionID = rand(1, 4);
    $statusTable = ['done', 'undone'];
    $rand2 = rand(0, 1);
    if ($rand2 != 1) {
        $randNote = rand(0, 1);
    } else {
        $randNote = 0;
    }

    return [
        'user_id' => $userID,
        'question_id' => $questionID,
        'status_question' => $statusTable[$rand2],
        'note' => $randNote
    ];
});

<?php

use App\Model\TeamModel;
use Faker\Generator as Faker;

$factory->define(TeamModel::class, function (Faker $faker) {
    return [
        'name'=>$faker->firstName,
    ];
});

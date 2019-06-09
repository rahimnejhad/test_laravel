<?php

use App\Model\PlayerModel;
use App\Model\TeamModel;
use Faker\Generator as Faker;

$factory->define(PlayerModel::class, function (Faker $faker) {
    return [
        //
        'fname'=>$faker->firstName,
        'lname'=>$faker->lastName,
        'team_id' => function() {
            return factory(TeamModel::class)->create()->id;
        },
    ];
});

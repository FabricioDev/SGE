<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\UserProfile::class, function (Faker\Generator $faker) {
    return [
        'address' => $faker->address,
        'cep' => function() use($faker){
            $cep = preg_replace('/[^0-9]/','',$faker->postcode());
            return $cep;
        },
        'number' => rand(1,100),
        'complement' => rand(1,10)%2==0?null:$faker->sentence,
        'city' => $faker->city,
        'neighborhood' => $faker->city,
        'state' => collect(App\Models\State::$states)->random(),
    ];
});

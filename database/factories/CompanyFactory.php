<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'telephone' => $faker->String,
        'address' => $faker->text,
        'CEP' => $faker->number_format,
        'CNPJ' => $faker->number_format,
    ];
    $factory->state(App\user::class, 'delinquent', [
        'account_status' => 'delinquent',
    ]);
    $factory->state(App\User::class, 'address', function ($faker) {
        return [
            'address' => $faker->address,
        ];
    });
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Empresa;
use Faker\Generator as Faker;

$factory->define(Empresa::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'telefone' => $faker->String,
        'endereco' => $faker->text,
        'CEP' => $faker->number_format,
        'CNPJ' => $faker->number_format
    ];
});

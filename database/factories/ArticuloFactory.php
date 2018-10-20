<?php

use Faker\Generator as Faker;
use App\Marca;
use App\Categoria;

$factory->define(App\Articulo::class, function (Faker $faker) {
    $foto = '/img/articulos/noimage.png';
    return [
        'articulo'=>$faker->sentence(2),
        'codArticulo'=>$faker->randomNumber($nbDigits = 6, $strict = true),
        'descripcion'=>$faker->sentence(3),
        'cantidad'=>$faker->randomDigit,
        'stockMinimo'=>$faker->randomNumber($nbDigits = 1, $strict = true),
        'precio'=>$faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 999),
        'marca_id'=>$faker->boolean($chanceOfGettingTrue = 50),
        'foto'=>$foto,
        'categoria_id'=>Categoria::all()->random()->id,
        'marca_id'=>Marca::all()->random()->id,
        
    ];
});
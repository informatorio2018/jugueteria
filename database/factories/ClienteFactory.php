<?php

use Faker\Generator as Faker;


$factory->define(App\Cliente::class, function (Faker $faker) {
    $foto = '/img/clientes/noimage.png';
    return [
        'RazonSocial'=>$faker->name,
        
        'NroDocumento'=>$faker->randomNumber($nbDigits = 8, $strict = true),
        'DireccionFiscal'=>$faker->address,
        'CodigoPostal'=>$faker->postcode,
        'PercibeIVA'=>$faker->boolean($chanceOfGettingTrue = 50),
        'PercibeIIBB'=>$faker->boolean($chanceOfGettingTrue = 50),
        'CondicionPago'=>$faker->randomElement(['Contado','Cta Cte']),
        'EnviarComprobante'=>$faker->boolean($chanceOfGettingTrue = 50),
        'MailFacturacion'=>$faker->email,
        
        'Telefono'=>$faker->phoneNumber,
        'Estado'=>$faker->boolean($chanceOfGettingTrue = 50),
        'foto'=>$foto,
        'id_documento'=>rand(1,2),
        'id_tratamiento'=>rand(1,2),
    ];
});

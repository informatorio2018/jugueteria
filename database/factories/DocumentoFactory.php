<?php



$factory->define(App\Documento::class, function (Faker $faker) {
    
    return [
        'RazonSocial'=>$faker->name,    
        'TipoDocumento'=>rand(1,2),
        'NroDocumento'=>$faker->randomNumber($nbDigits = 8, $strict = true),
        'DireccionFiscal'=>$faker->address,
        'CodigoPostal'=>$faker->postcode,
        'PercibeIVA'=>$faker->boolean($chanceOfGettingTrue = 50),
        'PercibeIIBB'=>$faker->boolean($chanceOfGettingTrue = 50),
        'CondicionPago'=>$faker->randomElement(['Contado', 'Cta Cte']),
        'TratamientoImpositivo',
        'EnviarComprobante'=>$faker->boolean($chanceOfGettingTrue = 50),
        'MailFacturacion'=>$faker->email,
        'MailContacto'=>$faker->email,
        'Contacto'=>$faker->name,
        'Telefono'=>$faker->phoneNumber,
        'Estado'=>$faker->boolean($chanceOfGettingTrue = 50)
        

    ];
});

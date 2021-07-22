<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {

    return [

        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),

    ];

});

$factory->define(App\Models\Evento::class, function (Faker\Generator $faker) {

    return [

        'evento' => $faker->catchPhrase,
        'organizador' => $faker->name,
        'fecha' => '2016-06-'.$faker->dayOfMonth($max = 'now'),
        'estado' => 'activo',
        'color' => $faker->randomElement(['#1abc9c', '#2ecc71', '#3498db', '#9b59b6','#f39c12','#f1c40f','#7f8c8d']),
    ];
});

$factory->define(App\Models\ReservaHora::class, function (Faker\Generator $faker) {

    return [
        'Entrada' => '08:00:00',
        'Salida' => '12:00:00',
        'evento_id' =>$faker->numberBetween(1,15),
        'espaciofisico_id' =>$faker-> numberBetween(1,10),
    ];
});
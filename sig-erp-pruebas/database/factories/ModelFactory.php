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

$factory->define(App\TipoPago::class, function(Faker\Generator $faker){
	return[
			'nombre'	=> 'Transferencia'
	];
});

$factory->define(App\Banco::class, function(Faker\Generator $faker){
	return [
				'nombre' 	=> 'Bancomer',
				'cuenta'	=> '1234657890'				
	];
});

$factory->define(App\Facturadora::class, function(Faker\Generator $faker){
	return [
				'nombre' 		=> $faker->name
				
	];
});


$factory->define(App\Puesto::class, function(Faker\Generator $faker){
	return [
				'nombre' 		=> 'Administrador',
				'descripcion'	=> 'Descripcion del puesto '
	];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt('testeando'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\CentroNegocio::class,function(Faker\Generator $faker){
	return [
				'nombre'		=> 'Aguascalientes',
            	'nomenclatura'	=> 'CN'
	];
});



$factory->define(App\Ejecutivo::class,function(Faker\Generator $faker){
	return [
				'id_cn'			=> 1,
            	'id_puesto'		=> 1,
	            'nombre'		=> $faker->name,
	            'ap_paterno'	=> $faker->firstNameMale,
	            'ap_materno'	=> $faker->lastName
	];
});

$factory->define(App\Cliente::class,function(Faker\Generator $faker){
	return [
   
				'id_cn'					=> 1,
				'id_ejecutivo'       	=> 1,
				'contrato_a'			=> 1,
				'id_user'				=> 1,
				'db_forma_pago'			=> 1,
				'db_banco'				=> 1,
	            'nombre' 				=> $faker->name,                 
	            'apellido_paterno' 		=> $faker->firstNameMale,
	            'apellido_materno' 		=> $faker->lastName,  
	            'razon_social' 			=> $faker->name,           
	                
	            
	];


});

<?php
	
	require_once '../vendor/autoload.php';

	$faker = Faker\Factory::create();
	$fakeres = Faker\Factory::create(es_ES_yha);

	$s = "<br>";

	$user = [
		'name' => $name = $fakeres->firstName($gender = null),
		'ap1' => $ap = $fakeres->lastName,
		'ap2' => $fakeres->lastName,
		'pass' => $fakeres->regexify('[A-Z0-9._%+-]+@[A-Z0-9._%+-]+\.[A-Z]{2,4}'),
		'type' => $fakeres->randomElement($array = array ('estudiante','docente','secre','admin')),
		'status' => $fakeres->randomElement($array = array ('ACTIVO','BAJA POR ART 33','ALUMNO EN ARTICULO 34','BAJA ADMINISTRATIVA','BAJA')),
		'ciclo' => $fakeres->randomElement($array = array ('2010A','2010B','2011A','2011B','2012A','2012B','2013A','2013B','2014A','2014B','2015A','2015B','2016A','2016B','2017A','2017B')),
		// 'email' => $name.'.'.$ap.'@'.$fakeres->freeemaildomain
	];

	echo '<pre>';
	print_r($user);
	echo '</pre>';


	echo "ingles";
	echo $s.$s;
	for ($i=0; $i <10 ; $i++) { 
	echo $faker->name.$s;
	}
	echo $s.$s;
	echo "Español";
	echo $s.$s;
	for ($i=0; $i <10 ; $i++) { 
	echo $fakeres->name($gender = null).$s;
	}
	
	$name = $fakeres->firstName($gender = null);
	$ap = $fakeres->lastName;
	$ap2 =$fakeres->lastName;
	$fakeres->regexify('[A-Z0-9._%+-]+@[A-Z0-9._%+-]+\.[A-Z]{2,4}');
	$fakeres->randomElement($array = array ('estudiante','docente','secre','admin'));
	$fakeres->randomElement($array = array ('ACTIVO','BAJA POR ART 33','ALUMNO EN ARTICULO 34','BAJA ADMINISTRATIVA','BAJA'));
	$fakeres->randomElement($array = array ('2010A','2010B','2011A','2011B','2012A','2012B','2013A','2013B','2014A','2014B','2015A','2015B','2016A','2016B','2017A','2017B'));
	// 'email' => $name.'.'.$ap.'@'.$fakeres->freeemaildomain
?>
<?php
	require_once 'config.php';

	$fakeres = Faker\Factory::create(es_ES_yha);

	$name = $fakeres->firstName($gender = null);
	$ap = $fakeres->lastName;
	$ap2 =$fakeres->lastName;
	$fakeres->regexify('[A-Z0-9._%+-]+@[A-Z0-9._%+-]+\.[A-Z]{2,4}');
	$fakeres->randomElement($array = array ('estudiante','docente','secre','admin'));
	$fakeres->randomElement($array = array ('ACTIVO','BAJA POR ART 33','ALUMNO EN ARTICULO 34','BAJA ADMINISTRATIVA','BAJA'));
	$fakeres->randomElement($array = array ('2010A','2010B','2011A','2011B','2012A','2012B','2013A','2013B','2014A','2014B','2015A','2015B','2016A','2016B','2017A','2017B'));
		// 'email' => $name.'.'.$ap.'@'.$fakeres->freeemaildomain

	$user = [
		'user' => $name.' '.$ap.' '. $ap2,
		'codigo' => $fakeres->numberBetween($min=200000000,$max=300000000),
		'status' => $fakeres->randomElement($array = array ('ACTIVO','BAJA POR ART 33','ALUMNO EN ARTICULO 34','BAJA ADMINISTRATIVA','BAJA')),
		'cicload' => $fakeres->randomElement($array = array ('2010A','2010B','2011A','2011B','2012A','2012B','2013A','2013B','2014A','2014B','2015A','2015B','2016A','2016B','2017A','2017B')),
		'ciclol' => '2017A',

	];
	$title = 'alta de usuario';

	echo "<pre class='container-fluid'><div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'>";
	print_r($user);
	echo '</div></pre>';

	echo $twig->render('index3.twig',compact('user','title'));

?>

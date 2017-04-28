<?php
	require_once 'config.php';
	require_once 'functions.php';
	$fakeres = Faker\Factory::create(es_ES_yha);

	$name = $fakeres->firstName($gender = null);
	$namee = $name;
	if (preg_match('/\s/',$namee)){
		$namen = str_replace(' ',"_",$namee);
		echo $namen;
	}else {
		$namen=$name;
	}
	$ap = $fakeres->lastName;
	$ap2 = $fakeres->lastName;
	$pass = $fakeres->regexify('[A-Z0-9._%+-]+@[a-z0-9._%+-]+\.[a-z]{2,4}');
	$mail = $fakeres->freeEmail;
	$carrera = $fakeres->randomElement($array = array ('Lic. en Ing. Informática','Lic. en Informática','Lic. en Ing. en Computación','Lic. en Ing. en Comunicaciones y Electrónica','Lic. en Ing. en Ciencias Computacionales','Lic. en Ing. Biomédica','Lic. en Ing. en Electrónica y Computación'));
	$admit = $fakeres->randomElement($array = array ('2010A','2010B','2011A','2011B','2012A','2012B','2013A','2013B','2014A','2014B','2015A','2015B','2016A','2016B','2017A','2017B'));
	$mailac = strtolower($namen).'.'.strtolower($ap).'@schoolduck.com';
	$stud =[
		'name' => $name,
		'ap' => $ap,
		'ap2' => $ap2,
		'email' => $mail,
		'email_acad' => $mailac,
		'pass' => $pass,
		'type' => '1',
		'status' => '1',
		'carrera' => $carrera,
		'admition' => $admit
	];


	$title = '';

	echo "<pre class='container-fluid'><div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 '>";
	print_r($stud);
	echo "</pre>";

	echo $twig->render('index3.twig',compact('title','stud'));
?>

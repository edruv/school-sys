<?php
	require_once '../vendor/autoload.php';

	$fakeres = Faker\Factory::create(es_ES_yha);

	$loader = new Twig_Loader_Filesystem('../views');
	$twig = new Twig_Environment($loader, array());

	$name = $fakeres->firstName($gender = null);
	$ap = $fakeres->lastName;
	$ap2 =$fakeres->lastName;
	$fakeres->regexify('[A-Z0-9._%+-]+@[A-Z0-9._%+-]+\.[A-Z]{2,4}');
	$fakeres->randomElement($array = array ('estudiante','docente','secre','admin'));
	$fakeres->randomElement($array = array ('ACTIVO','BAJA POR ART 33','ALUMNO EN ARTICULO 34','BAJA ADMINISTRATIVA','BAJA','BAJA VOLUNTARIA'));
	$fakeres->randomElement($array = array ('2010A','2010B','2011A','2011B','2012A','2012B','2013A','2013B','2014A','2014B','2015A','2015B','2016A','2016B','2017A','2017B'));
	$type = $fakeres->randomElement($array = array ('Lic. en ','Lic. en Ing. en ','Lic. en Ing. de '));
	$carr = $fakeres->randomElement($array = array ('Ciencia de Materiales','Física','Informática','Matemáticas','Química','Químico Farmacéutico Biólogo','Diseño Molecular de Materiales','Sistemas Biológicos','Administración Industrial','Ciencias Computacionales','Computación','Comunicación Multimedia','Comunicaciones y Electrónica','Electrónica y Computación','Energía','Instrumentación Electrónica y Nanosensores','Nanotecnología','Obras y Servicios','Teleinformática','Telemática','Procesos y Comercio Internacional','Fotónica','Geofísica','Biomédica','Bioquímica','Civil','Industrial','Informática','Mecánica Eléctrica','Mecatrónica','Química','Topográfica'));
	// $carrera = $type.$carr;
	$carrera = $fakeres->randomElement($array = array ('Lic. en Ciencia de Materiales','Lic. en Física','Lic. en Informática','Lic. en Matemáticas','Lic. en Química','Lic. en Químico Farmacéutico Biólogo','Lic. en Ing. en Diseño Molecular de Materiales','Lic. en Ing. en Sistemas Biológicos','Lic. en Ing. en Administración Industrial','Lic. en Ing. en Ciencias Computacionales','Lic. en Ing. en Computación','Lic. en Ing. en Comunicación Multimedia','Lic. en Ing. en Comunicaciones y Electrónica','Lic. en Ing. en Electrónica y Computación','Lic. en Ing. en Energía','Lic. en Ing. en Instrumentación Electrónica y Nanosensores','Lic. en Ing. en Nanotecnología','Lic. en Ing. en Obras y Servicios','Lic. en Ing. en Teleinformática','Lic. en Ing. en Telemática','Lic. en Ing. de Procesos y Comercio Internacional','Lic. en Ing. Fotónica','Lic. en Ing. Geofísica','Lic. en Ing. Biomédica','Lic. en Ing. Bioquímica','Lic. en Ing. Civil','Lic. en Ing. Industrial','Lic. en Ing. Informática','Lic. en Ing. Mecánica Eléctrica','Lic. en Ing. Mecatrónica','Lic. en Ing. Química','Lic. en Ing. Topográfica'));
	// 'email' => '$name.'.'.$ap.'@'.$fakeres->freeemaildomain

	$user = [
		'user' => $name.' '.$ap.' '. $ap2,
		'codigo' => $fakeres->numberBetween($min=200000000,$max=300000000),
		'status' => $fakeres->randomElement($array = array ('ACTIVO','BAJA POR ART 33','ALUMNO EN ARTICULO 34','BAJA ADMINISTRATIVA','BAJA','BAJA VOLUNTARIA')),
		'cicload' => $fakeres->randomElement($array = array ('2010A','2010B','2011A','2011B','2012A','2012B','2013A','2013B','2014A','2014B','2015A','2015B','2016A','2016B','2017A','2017B')),
		'ciclol' => '2017A',
		'carrera' => $carrera
	];
	echo "<pre class='container-fluid'><div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 '>";
	print_r($user);
	echo '</div></pre>';

	echo $twig->render('index3.twig',compact('user'));

?>

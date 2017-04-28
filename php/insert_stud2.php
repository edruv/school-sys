<?php
	require_once 'config.php';
	require_once 'functions.php';
	$fakeres = Faker\Factory::create(es_ES_yha);

	// $name = $fakeres->firstName($gender = null);
	// $name2 = strtolower($name);
	// $ap = $fakeres->lastName;
	// $app2 = strtolower($ap);
	// $namee = $name;
	// $app = $ap;
	// (preg_match('/\s/',$namee)) ? $namen = str_replace(' ',"_",$namee) : $namen=$name ;
	// (preg_match('/\s/',$app)) ? $apn = str_replace(' ',"_",$app) : $apn=$ap ;
	// $ap2 = $fakeres->lastName;
	// $aapp2 = strtolower($ap2);
	// $pass = $fakeres->regexify('[A-Z0-9._%+-]+@[a-z0-9._%+-]+\.[a-z]{2,4}');
	// $pass2 = $pass;
	// // $mail = $fakeres->freeEmail;
	// $mail = strtolower($namen).'.'.strtolower($apn).'-'.strtolower($ap2n).'@'.$fakeres->freeEmailDomain;
	// // $carrera = $fakeres->randomElement($array = array ('Lic. en Ing. Informática','Lic. en Informática','Lic. en Ing. en Computación','Lic. en Ing. en Comunicaciones y Electrónica','Lic. en Ing. en Ciencias Computacionales','Lic. en Ing. Biomédica','Lic. en Ing. en Electrónica y Computación'));
	// $carrera = $fakeres->randomElement($array = array ('1','2','3','4','5','6','7'));
	// $status = $fakeres->randomElement($array = array ('1','2','3','4','5'));
	// $admit = $fakeres->randomElement($array = array ('09A','09B','10A','10B','11A','11B','12A','12B','13A','13B','14A','14B','15A','15B','16A','16B','17A','17B'));
	// $mailac = strtolower($namen).'.'.strtolower($apn).'@schoolduck.com';
	//
	// $stud =[
	// 	'name' => $name,
	// 	'ap' => $ap,
	// 	'ap2' => $ap2,
	// 	'email' => $mail,
	// 	'email_acad' => $mailac,
	// 	'pass' => $pass,
	// 	'passh' => sha1($pass),
	// 	'type' => '1',
	// 	'status' => '1',
	// 	'carrera' => $carrera,
	// 	'admition' => $admit
	// ];

	for ($i=0; $i < 10; $i++) {

		$name = $fakeres->firstName($gender = null);
		$name2 = strtolower($name);
		$namee = $name;
		$ap = $fakeres->lastName;
		$app2 = strtolower($ap);
		$app = $ap;
		$ap2 = $fakeres->lastName;
		$aapp2 = strtolower($ap2);
		(preg_match('/\s/',$namee)) ? $namen = str_replace(' ',"_",limpiar($namee)) : $namen=limpiar($name);
		(preg_match('/\s/',$app)) ? $apn = str_replace(' ',"_",limpiar($app)) : $apn=limpiar($ap);
		(preg_match('/\s/',$aapp2)) ? $ap2n = str_replace(' ',"_",limpiar($aapp2)) : $ap2n=limpiar($ap2) ;
		$pass = $fakeres->regexify('[A-Z0-9._%+-]+@[a-z0-9._%+-]+\.[a-z]{2,4}');
		$pass2 = $pass;
		// $mail = $fakeres->freeEmail;
		$mail = strtolower($namen).'.'.strtolower($apn).'-'.strtolower($ap2n).'@'.$fakeres->freeEmailDomain;
		$carrera = $fakeres->randomElement($array = array ('1','2','3','4','5','6','7'));
		$status = $fakeres->randomElement($array = array ('1','2','3','4','5'));
		$admit = $fakeres->randomElement($array = array ('09A','09B','10A','10B','11A','11B','12A','12B','13A','13B','14A','14B','15A','15B','16A','16B','17A','17B'));
		$mailac = strtolower($namen).'.'.strtolower($apn).'@schoolduck.com';

		$stud =[
			'name' => $name,
			'ap' => $ap,
			'ap2' => $ap2,
			'email' => $mail,
			'email_acad' => $mailac,
			'pass' => $pass2,
			'passh' => $pass,
			'type' => '1',
			'status' => $status,
			'carrera' => $carrera,
			'admition' => $admit
		];
		echo "<pre>";
		print_r($stud);
		echo "</pre>";
	}

	/*	resgistra un usuario tipo estudiante, activo	*/
	// $inus = "INSERT into user(nombre,ap1,ap2,email,email_acad,pass,type,status) values(:nombre,:ap1,:ap2,:email,:email_acad,:pass,:type,:status)";
	// $pass = sha1($pass);
	// $stat = $conn->prepare($inus);
	// $stat->execute(array(
	// 	':nombre' => "$name2",
	// 	':ap1' => "$app2",
	// 	':ap2' => "$aapp2",
	// 	':email' => "$mail",
	// 	':email_acad' => "$mailac",
	// 	':pass' => "$pass",
	// 	':type' => '1',
	// 	':status' => '1'
	// ));

	/*	busca id del usuario registrado	*/
	// $serid = "SELECT * from user where email_acad=:email_acad";
	// $stat = $conn->prepare($serid);
	// $stat->execute(array(
	// 	':email_acad' => $email_acad
	// ));
	// $gid = $stat->fetch();

	/*	registra a estudiante	*/
	// $rest = "INSERT into student(carrera,admition,user) values(:carrera,:admition,:user)";
	// $stat = $conn->prepare($rest);
	// $stat->execute(array(
	// 	':carrera' => $carrera,
	// 	':admition' => $admit,
	// 	':user' => $gid[0]
	// ));

	/*	registra pass sin encriptar	*/
	// $repa = "INSERT into pass(id_us,pass) values(:id_us,:pass)";
	// $stat = $conn->prepare($repa);
	// $stat->execute(array(
	// 	':id_us' => $gid[0],
	// 	':pass' => $pass2
	// ));

	$title = '';

	// echo "<pre class='container-fluid'><div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 '>";
	// echo "<pre>";
	// print_r($stud);
	// echo "</pre>";

	echo $twig->render('',compact('title','stud'));
?>

<?php
	require_once 'config.php';
	require_once 'functions.php';

	$title = 'agregar materia';

	$stat = $conn->prepare('SELECT * from carrera');
	$stat->execute();
	$carreras = $stat->fetchAll();

	if(isset($_POST['matadd'])) {
		$materia = $_POST['namat'];
		$cred = $_POST['cred'];
		$teoria = $_POST['hteo'];
		$pract = $_POST['hpra'];
		$carrera = $_POST['carr'];
		$errors = array();
		$messa = array();
		$post = array();

		(!empty($materia)) ? $a++ : array_push($errors,'ingresa un nombre a la materia') ;
		(!empty($cred)) ? (ctype_digit($cred)) ? $a++ : array_push($errors,'ingresa los creditos con un valor entero') : array_push($errors,'ingresa los creditos') ;
		(!empty($teoria)) ? (ctype_digit($teoria)) ? $a++ : array_push($errors,'ingresa las horas de teoria completas') : array_push($errors,'ingresa las horas teoricas') ;
		(!empty($pract)) ? (ctype_digit($pract)) ? $a++ : array_push($errors,'ingresa las horas de practica completas')  : array_push($errors,'ingresa las horas practica') ;
		(!empty($carrera)) ? $a++ : array_push($errors,'ingresa la carrera a la que pertenece') ;

		/*original*/
		// (!empty($materia)) ? $a++ : array_push($errors,'ingresa un nombre a la materia') ;
		// (ctype_digit($cred)) ? $a++ : array_push($errors,'ingresa los creditos con un valor entero') ;
		// (ctype_digit($teoria)) ? $a++ : array_push($errors,'ingresa las horas de teoria completas') ;
		// (ctype_digit($pract)) ? $a++ : array_push($errors,'ingresa las horas de practica completas') ;
		// (!empty($carrera)) ? $a++ : array_push($errors,'ingresa la carrera a la que pertenece') ;

		if ($a > 4) {
			$stat = $conn->prepare("SELECT * from materia where carrera=:carre and nombre=:materia");
			$stat->execute(array(':materia' => "$materia",':carre' => "$carrera"));
			$valmat = $stat->fetch();

			if ($valmat == 0) {
				$materia = strtolower($materia);
				$stat = $conn->prepare('INSERT into materia(nombre,creditos,hrs_teor,hrs_prac,carrera) values(:nombre,:creditos,:teoria,:pract,:carrera)');
				$regmat = $stat->execute(array(
					':nombre' => "$materia",
					':creditos' => "$cred",
					':teoria' => "$teoria",
					':pract' => "$pract",
					':carrera' => "$carrera"
				));
				if ($regmat) {
					$messa = [
						'type' => 'success',
						'message' => 'materia agregada exitosamente',
						'icon' => 'check-circle'
					];
				}
			}else {
				$messa = [
					'type' => 'danger',
					'message' => "la materia \"$materia\" ya esta registrada",
					'icon' => 'exclamation-triangle'
				];
			}
		}else {
			$post = [
				'materia' => $materia,
				'credi' => $cred,
				'teo' => $teoria,
				'pract' => $pract,
				'carre' => $carrera
			];
		}
	}

	echo $twig->render('matter_add.twig',compact('title','user','carreras','errors','post','messa'));
?>

<?php
	require_once 'config.php';
	require_once 'functions.php';

	$title = 'agregar carrera';

	if(isset($_POST['adca'])){
		$type = $_POST['tyca'];
		$join = $_POST['join'];
		$name = $_POST['ncar'];
		$errors = array();
		$messa = array();

		(!empty($type)) ? $a++ : array_push($errors,'Ingresa un tipo de carrera') ;
		(!empty($join) or $join == 'n/a') ? $a++ : array_push($errors,'Ingresa una preposicion') ;
		(!empty($name)) ? $a++ : array_push($errors,'Ingresa el nombre de la carrera') ;

		if ($a > 2 ) {
			(!empty($join) && $join != 'n/a') ? $car = $type.' '.$join.' '.$name : $car = $type.' '.$name ;
			$car = ucwords(strtolower($car));
			$stat = $conn->prepare("SELECT * from carrera where carrera=:carrera");
			$stat->execute(array(':carrera' => "$car"));
			$buscar = $stat->fetch();
			if ($buscar == 0) {
				$stat = $conn->prepare('insert into carrera(carrera) values(:carrera)');
				$regcar = $stat->execute(array(':carrera' => "$car"));
				if ($regcar) {
					$messa = [
						'type' => 'success',
						'message' => 'carrera agregada exitosamente',
						'icon' => 'check-circle'
					];
				}
			}else {
				$messa = [
					'type' => 'danger',
					'message' => "la carrera \"$car\" ya esta registrada",
					'icon' => 'exclamation-triangle'
				];
			}
		}

		if (!$errors) {
			$errors = array();
			unset($errors);
		}
	}

	echo $twig->render('career_addv2.twig',compact('title','user','errors','messa'));
?>

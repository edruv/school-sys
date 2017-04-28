<?php
	require_once 'config.php';
	require_once 'functions.php';

	$title = 'buscar alumno';

	if (isset($_POST['ssxcod'])) {
		$cod = trim($_POST['sxcod']);
		$errors = array();
		// (!empty($cod)) ? (ctype_digit($cod)) ? $a++ : array_push($errors,'ingresa solo datos numericos') : array_push($errors,'ingresa el codigo del estudiante');
		(!empty($cod)) ? (ctype_digit($cod)) ? $a++ :
		$messa = ['type' => 'danger','icon' => 'exclamation-triangule', 'message' => 'ingresa solo datos numericos'] :
		$messa = ['type' => 'danger','icon' => 'exclamation-triangule', 'message' => 'ingresa el codigo del estudiante'];
		if ($a == 1) {
			$stat = $conn->prepare('SELECT us.id, stu.id cod, us.nombre, us.ap1, us.ap2, ca.carrera from user us
				inner join student stu on us.id=stu.user
				inner join carrera ca on ca.id=stu.carrera where stu.id=:id');
			$stat->execute(array(':id'=>"$cod"));
			$estudiante = $stat->fetch(PDO::FETCH_ASSOC);

			if (empty($estudiante)) {
				$messa = [
					'type' => 'danger',
					'message' => 'no se ha encontrado a ningun estudiante con el #'.$cod,
					'icon' => 'exclamation-triangule'
				];
			}else {
				$stat = $conn->prepare('SELECT stu.id, us.nombre, us.ap1,us.ap2,us.email,us.email_acad, st.status,car.carrera, stu.admition from user us
					INNER JOIN student stu on us.id=stu.user
					INNER JOIN carrera car on car.id=stu.carrera
					inner JOIN status st on st.id=us.status where us.id=:id');
					$stat->execute(array(':id'=>$estudiante['id']));
					$studata = $stat->fetch(PDO::FETCH_ASSOC);
			}
		}
	}
	if (isset($_POST['ssxem'])) {
		$mail = trim($_POST['sxem']);
		$errors = array();
		// (!empty($mail)) ? (preg_match('/^([\w\.\-_]+)?\w+@[\w-_]+(\.\w+){1,}$/',$mail)) ? $a++ : array_push($errors,'ingresa un correo valido') : array_push($errors,'ingresa el correo academico');
		(!empty($mail)) ? (preg_match('/^([\w\.\-_]+)?\w+@[\w-_]+(\.\w+){1,}$/',$mail)) ? $a++ :
		$messa = ['type' => 'danger','icon' => 'exclamation-triangule', 'message' => 'ingresa un correo valido'] :
		$messa = ['type' => 'danger','icon' => 'exclamation-triangule', 'message' => 'ingresa el correo academico'] ;
		if ($a == 1) {
			$stat = $conn->prepare('SELECT us.id, stu.id cod, us.nombre, us.ap1, us.ap2, ca.carrera from user us
				inner join student stu on us.id=stu.user
				inner join carrera ca on ca.id=stu.carrera where us.email_acad=:mail');
			$stat->execute(array(':mail'=>"$mail"));
			$estudiante = $stat->fetch(PDO::FETCH_ASSOC);

			if (empty($estudiante)) {
				$messa = [
					'type' => 'danger',
					'message' => 'no se ha encontrado a ningun estudiante con el email'.$mail,
					'icon' => 'exclamation-triangule'
				];
			}else {
				$stat = $conn->prepare('SELECT stu.id, us.nombre, us.ap1,us.ap2,us.email,us.email_acad, st.status,car.carrera, stu.admition from user us
					INNER JOIN student stu on us.id=stu.user
					INNER JOIN carrera car on car.id=stu.carrera
					inner JOIN status st on st.id=us.status where us.id=:id');
					$stat->execute(array(':id'=>$estudiante['id']));
					$studata = $stat->fetch(PDO::FETCH_ASSOC);
			}
		}
	}

	// echo $twig->render('stud_search.twig', compact('title','estudiante','studata','messa'));
	echo $twig->render('stud_search.twig', compact('title','user','estudiante','studata','messa'));
?>

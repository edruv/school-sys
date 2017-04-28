<?php
	require_once 'config.php';
	require_once 'functions.php';
	
	$title = 'alumno a modificar';

	if (isset($_POST['ssxcod'])) {
		$cod = trim($_POST['sxcod']);
		$errors = array();
		(!empty($cod)) ? (ctype_digit($cod)) ? $a++ : array_push($errors,'ingresa solo datos numericos') : array_push($errors,'ingresa el codigo del estudiante');
		if ($a == 1) {
			$stat = $conn->prepare('SELECT us.id, stu.id cod, us.nombre, us.ap1, us.ap2, ca.carrera from user us
				inner join student stu on us.id=stu.user
				inner join carrera ca on ca.id=stu.carrera where stu.id=:id and us.type=:t');
			$stat->execute(array(':id'=>"$cod",':t'=>'1'));
			$estudiante = $stat->fetch(PDO::FETCH_ASSOC);
		}
	}
	if (isset($_POST['ssxem'])) {
		$mail = trim($_POST['sxem']);
		$errors = array();
		(!empty($mail)) ? (preg_match('/^([\w\.\-_]+)?\w+@[\w-_]+(\.\w+){1,}$/',$mail)) ? $a++ : array_push($errors,'ingresa un correo valido') : array_push($errors,'ingresa el correo academico');
		if ($a == 1) {
			$stat = $conn->prepare('SELECT us.id, stu.id cod, us.nombre, us.ap1, us.ap2, ca.carrera from user us
				inner join student stu on us.id=stu.user
				inner join carrera ca on ca.id=stu.carrera where us.email_acad=:mail and us.type=:t');
			$stat->execute(array(':mail'=>"$mail",':t'=>'1'));
			$estudiante = $stat->fetch(PDO::FETCH_ASSOC);
		}
	}

	echo $twig->render('stud_predit.twig',compact('title','user','estudiante'));
?>

<?php
	require_once 'config.php';
	require_once 'functions.php';

	$title = 'profesor a modificar';

	if (isset($_POST['ssxcod'])) {
		$cod = trim($_POST['sxcod']);
		$messa = array();
		// (!empty($cod)) ? (ctype_digit($cod)) ? $a++ : array_push($errors,'ingresa solo datos numericos') : array_push($errors,'ingresa el codigo del estudiante');
		(!empty($cod)) ? (ctype_digit($cod)) ? $a++ :
			$messa = ['type' => 'danger','icon' => 'exclamation-triangule', 'message' => 'ingresa solo datos numericos'] :
			$messa = ['type' => 'danger','icon' => 'exclamation-triangule', 'message' => 'ingresa el codigo del docente'];
		if ($a == 1) {
			$stat = $conn->prepare('SELECT us.id, emp.id cod, us.nombre, us.ap1, us.ap2 from user us
				inner join empleado emp on us.id=emp.id_user
				inner join maestro ma on ma.id_emp=emp.id
				where emp.id=:id and us.type=:t');
			$stat->execute(array(':id'=>"$cod",':t'=>'2'));
			$empleado = $stat->fetch(PDO::FETCH_ASSOC);
			if (empty($empleado)) {
				$messa = [
					'type' => 'danger',
					'message' => 'no se ha encontrado a ningun docente con el #'.$cod,
					'icon' => 'exclamation-triangule'
				];
			}else {
				$empleado['link'] = 'prof';
			}
		}
	}
	if (isset($_POST['ssxem'])) {
		$mail = trim($_POST['sxem']);
		$messa = array();
		// (!empty($mail)) ? (preg_match('/^([\w\.\-_]+)?\w+@[\w-_]+(\.\w+){1,}$/',$mail)) ? $a++ : array_push($errors,'ingresa un correo valido') : array_push($errors,'ingresa el correo academico');
		(!empty($mail)) ? (preg_match('/^([\w\.\-_]+)?\w+@[\w-_]+(\.\w+){1,}$/',$mail)) ? $a++ :
			$messa = ['type' => 'danger','icon' => 'exclamation-triangule', 'message' => 'ingresa un correo valido'] :
			$messa = ['type' => 'danger','icon' => 'exclamation-triangule', 'message' => 'ingresa el correo academico'] ;
		if ($a == 1) {
			$stat = $conn->prepare('SELECT us.id, emp.id cod, us.nombre, us.ap1, us.ap2 from user us
				inner join empleado emp on us.id=emp.id_user
				inner join maestro ma on ma.id_emp=emp.id
				where us.email_acad=:mail and us.type=:t');
			$stat->execute(array(':mail'=>"$mail",':t'=>'2'));
			$empleado = $stat->fetch(PDO::FETCH_ASSOC);
			if (empty($empleado)) {
				$messa = [
					'type' => 'danger',
					'message' => 'no se ha encontrado a ningun docente con el email'.$mail,
					'icon' => 'exclamation-triangule'
				];
			}else {
				$empleado['link'] = 'prof';
			}
		}
	}

	echo $twig->render('emp_predit.twig',compact('title','user','empleado','messa'));
?>

<?php
	require_once 'config.php';
	require_once 'functions.php';

	$title = 'buscar administrador';

	if (isset($_POST['ssxcod'])) {
		$cod = trim($_POST['sxcod']);
		$messa = array();
		// (!empty($cod)) ? (ctype_digit($cod)) ? $a++ : array_push($errors,'ingresa solo datos numericos') : array_push($errors,'ingresa el codigo del estudiante');
		(!empty($cod)) ? (ctype_digit($cod)) ? $a++ :
			$messa = ['type' => 'danger','icon' => 'exclamation-triangule', 'message' => 'ingresa solo datos numericos'] :
			$messa = ['type' => 'danger','icon' => 'exclamation-triangule', 'message' => 'ingresa el codigo del administrador'];
		if ($a == 1) {
			$stat = $conn->prepare('SELECT us.id, emp.id cod, us.nombre, us.ap1, us.ap2 from user us
				inner join empleado emp on us.id=emp.id_user
				inner join admin ad on emp.id=ad.id_emp
				where emp.id=:id and us.type=:t');
			$stat->execute(array(':id'=>"$cod",':t'=>'4'));
			$empleado = $stat->fetch(PDO::FETCH_ASSOC);

			if (empty($empleado)) {
				$messa = [
					'type' => 'danger',
					'message' => 'no se ha encontrado a ningun administrador con el #'.$cod,
					'icon' => 'exclamation-triangule'
				];
			}
			else {
				$stat = $conn->prepare('SELECT emp.id, us.nombre, us.ap1, us.ap2, us.email, us.email_acad, st.status from user us
					inner join empleado emp on us.id=emp.id_user
					inner join admin ad on emp.id=ad.id_emp
					inner join status st on us.status=st.id
					where us.id=:id');
				$stat->execute(array(':id'=>$empleado['cod']));
				$empdata = $stat->fetch(PDO::FETCH_ASSOC);
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
				inner join admin ad on ad.id_emp=emp.id
				where us.email_acad=:mail and us.type=:t');
			$stat->execute(array(':mail'=>"$mail",':t'=>'4'));
			$empleado = $stat->fetch(PDO::FETCH_ASSOC);

			if (empty($empleado)) {
				$messa = [
					'type' => 'danger',
					'message' => 'no se ha encontrado a ningun administrador con el email'.$mail,
					'icon' => 'exclamation-triangule'
				];
			}
			else {
				$stat = $conn->prepare('SELECT emp.id, us.nombre, us.ap1, us.ap2, us.email, us.email_acad, st.status from user us
					inner join empleado emp on us.id=emp.id_user
					inner join admin ad on emp.id=ad.id_emp
					inner join status st on us.status=st.id
					where us.id=:id');
				$stat->execute(array(':id'=>$empleado['cod']));
				$empdata = $stat->fetch(PDO::FETCH_ASSOC);
			}
		}
	}

	echo $twig->render('emp_search.twig',compact('title','user','empleado','empdata','messa'));
?>

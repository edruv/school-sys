<?php
	require_once 'config.php';
	require_once 'functions.php';

	$title = 'ingreso de empleados';

	if (isset($_POST['signin'])) {
		$cod = trim($_POST['signcod']);
		$ps = trim($_POST['signpass']);
		$errors = array();
		$messa = array();

		// if (preg_match('/^([\w\.\-_]+)?\w+@[\w-_]+(\.\w+){1,}$/',$cod)) {
			// (!empty($cod)) ? $a++ : array_push($errors,'ingresa tu correo academico') ;
		// }
		(!empty($cod)) ? (ctype_digit($cod)) ? $a++ : array_push($errors,'ingresa solo numeros') : array_push($errors,'ingresa tu codigo de empleado') ;
		(!empty($ps)) ? $a++ : array_push($errors,'ingresa tu contraseña') ;

		if ($a > 1) {
			$stat = $conn->prepare('SELECT emp.id codigo, us.email_acad, us.pass, us.type from user us
				inner join empleado emp on us.id=emp.id_user
				where emp.id=:id');
			$stat->execute(array(':id'=>$cod));
			$busid = $stat->fetch(PDO::FETCH_ASSOC);
			if (!empty($busid)) {
				$stat = $conn ->prepare('SELECT us.id, emp.id codigo, us.nombre, us.ap1, us.ap2, sta.status, us.type from user us
					inner join empleado emp on emp.id=us.id
					inner join status sta on us.status=sta.id
					where emp.id=:id');
				$stat->execute(array(':id' => $busid['codigo']));
				$fid = $stat->fetch(PDO::FETCH_ASSOC);
				$ps = sha1($ps);
				if ($ps == $busid['pass']) {
					session_start();
					$_SESSION['type'] = $busid['type'];
					$_SESSION['arse'] = $fid;
					header('Location: .');
				}
				else {
					$messa = [
						'type' => 'danger',
						'message' => 'el codigo o contraseña del empleado no son correctos',
						'icon' => 'exclamation-triangle'
					];
				}
			}else {
				$messa = [
					'type' => 'danger',
					'message' => 'el codigo o contraseña del empleado no son correctos',
					'icon' => 'exclamation-triangle'
				];
			}
		}
	}

	echo $twig->render('login.twig',compact('title','errors','messa'));
?>

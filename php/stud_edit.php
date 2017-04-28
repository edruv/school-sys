<?php
	require_once 'config.php';
	require_once 'functions.php';

	$id = $_GET['cod'];

	$stat = $conn->prepare('SELECT * from carrera');
	$stat->execute();
	$carreras = $stat->fetchAll(PDO::FETCH_ASSOC);

	$stat = $conn->prepare('SELECT * from status');
	$stat->execute();
	$status = $stat->fetchAll(PDO::FETCH_ASSOC);

	$stat = $conn->prepare('SELECT us.nombre, us.ap1, us.ap2, us.email, us.email_acad, us.status, stu.id cod, stu.carrera  from user us
		inner join student stu on us.id=stu.user
		where us.id=:id');
	$stat->execute(array(':id'=>"$id"));
	$post = $stat->fetch(PDO::FETCH_ASSOC);

	$postmp = explode('@',$post['email_acad']);
	$post['email_acad'] = $postmp[0];

	$title = 'editar alumno';

	if (isset($_POST['addstud'])) {
		$name = trim($_POST['nstu']);
		$ap = trim($_POST['apps']);
		$ap2 = trim($_POST['apms']);
		$mail = trim($_POST['emastu']);
		$mailac = trim($_POST['emstac']);
		$status = $_POST['stastu'];
		$errors = array();
		$messa = array();
		$post = array('nombre' => $name,'ap1' => $ap,'ap2' => $ap2,'mail' => $mail,'mailac' => $mailac);

		(!empty($name)) ? $a++ : array_push($errors,'ingresa el nombre');
		(!empty($ap)) ? $a++ : array_push($errors,'ingresa el apellido paterno');
		(!empty($ap2)) ? $a++ : array_push($errors,'ingresa el apellido materno');
		(!empty($mail)) ? (preg_match('/^([\w\.\-_]+)?\w+@[\w-_]+(\.\w+){1,}$/',$mail)) ? $a++ : array_push($errors,'el email "'.$mail.'" no es valido') : array_push($errors,'ingresa un email');
		(!empty($mailac)) ? (preg_match('/^([\w\.\-_]+)?\w$/',$mailac)) ? $a++ : array_push($errors,'el email "'.$mailac.'@alumnos.schoolduck.com" no es valido') : array_push($errors,'ingresa un email');
		(!empty($status)) ? $a++ : array_push($errors,'selecciona un status') ;

		if ($a > 5) {
			$name2 = strtolower($name);
			$ap1 = strtolower($ap);
			$ap22 = strtolower($ap2);
			(preg_match('/\s/',$name2)) ? $namen = str_replace(' ','_',limpiar($name2)) : $namen = limpiar($name2);
			(preg_match('/\s/',$ap1)) ? $apn = str_replace(' ','_',limpiar($ap1)) : $apn = limpiar($ap1);
			(preg_match('/\s/',$ap22)) ? $ap2n = str_replace(' ','_',limpiar($ap22)) : $ap2n = limpiar($ap22) ;

			$mailac = $mailac.'@alumnos.schoolduck.com';

			$stat = $conn->prepare('SELECT email_acad from user where type=:t and email_acad=:mailac and id!=:id');
			$stat->execute(array(':t'=>1,':mailac'=>"$mailac",':id'=>"$id"));
			$swmail = $stat->fetch(PDO::FETCH_ASSOC);

			if (!empty($swmail)) {
				$mailac = $namen.'.'.$apn.'-'.$ap2n.'@alumnos.schoolduck.com';
			}

			try {
				$stat = $conn->prepare('UPDATE user set
					nombre = :nombre,
					ap1 = :ap,
					ap2 = :ap2,
					email = :mail,
					email_acad = :mailac,
					status = :status
					where id=:id
				');
				$actus = $stat->execute(array(
					':nombre' => "$name",
					':ap' => "$ap",
					':ap2' => "$ap2",
					':mail' => "$mail",
					':mailac' => "$mailac",
					':status' => "$status",
					':id' => "$id"
				));
			} catch (Exception $e) {
				echo 'Exception -> ';
					var_dump($e->getMessage());
			}
			if ($actus) {
				$post = array();
				$messa = [
					'type' => 'success',
					'message' => 'datos actulizados exitosamente',
					'icon' => 'check-circle'
				];
				$stat = $conn->prepare('SELECT stu.id, us.nombre, us.ap1,us.ap2,us.email,us.email_acad, st.status,car.carrera, stu.admition from user us
				INNER JOIN student stu on us.id=stu.user
				INNER JOIN carrera car on car.id=stu.carrera
				inner JOIN status st on st.id=us.status where us.id=:id');
				$stat->execute(array(':id'=>$id));
				$studata = $stat->fetch(PDO::FETCH_ASSOC);
			}
		}
	}

	echo $twig->render('stud_edit.twig',compact('title','user','post','carreras','messa','status','studata'));
?>

<?php
	require_once 'config.php';
	require_once 'functions.php';

	$id = $_GET['cod'];

	$stat = $conn->prepare('SELECT us.nombre, us.ap1, us.ap2, us.email, us.email_acad, us.status, emp.id from user us
		inner join empleado emp on us.id=emp.id_user
		inner join admin ad on emp.id=ad.id_emp
		where us.id=:id');
	$stat->execute(array(':id'=> "$id"));
	$post = $stat->fetch(PDO::FETCH_ASSOC);
	$postmp = explode('@',$post['email_acad']);
	$post['email_acad'] = $postmp[0];
	$post['edomain'] = 'admin';

	$stat = $conn->prepare("SELECT * from status where id in ('1','3','4')");
	$stat->execute();
	$status = $stat->fetchAll(PDO::FETCH_ASSOC);

	$title = 'editar administrador';

	if (isset($_POST['ediemp'])) {
		$name = trim($_POST['naem']);
		$ap = trim($_POST['appe']);
		$ap2 = trim($_POST['apme']);
		$mail = trim($_POST['ememp']);
		$mailac = trim($_POST['ememac']);
		$status = $_POST['stastu'];
		$errors = array();
		$messa = array();
		$post = array('nombre' => $name,'ap1' => $ap,'ap2' => $ap2,'mail' => $mail,'email_acad' => $mailac);

		(!empty($name)) ? $a++ : array_push($errors,'ingresa el nombre');
		(!empty($ap)) ? $a++ : array_push($errors,'ingresa el apellido paterno');
		(!empty($ap2)) ? $a++ : array_push($errors,'ingresa el apellido materno');
		(!empty($mail)) ? (preg_match('/^([\w\.\-_]+)?\w+@[\w-_]+(\.\w+){1,}$/',$mail)) ? $a++ : array_push($errors,'el email "'.$mail.' no es valido') : array_push($errors,'ingresa un email');
		(!empty($mailac)) ? (preg_match('/^([\w\.\-_]+)?\w$/',$mailac)) ? $a++ : array_push($errors,'el email "'.$mailac.'@admin.schoolduck.com"" no es valido') : array_push($errors,'ingresa un email');
		(!empty($status)) ? $a++ : array_push($errors,'selecciona un status') ;

		if ($a > 5) {
			$name2 = strtolower($name);
			$ap1 = strtolower($ap);
			$ap22 = strtolower($ap2);
			(preg_match('/\s/',$name2)) ? $namen = str_replace(' ','_',limpiar($name2)) : $namen = limpiar($name2);
			(preg_match('/\s/',$ap1)) ? $apn = str_replace(' ','_',limpiar($ap1)) : $apn = limpiar($ap1);
			(preg_match('/\s/',$ap22)) ? $ap2n = str_replace(' ','_',limpiar($ap22)) : $ap2n = limpiar($ap22) ;

			$mailac = $mailac.'@admin.schoolduck.com';

			$stat = $conn->prepare('SELECT email_acad from user where type=:t and email_acad=:mailac and id!=:id');
			$stat->execute(array(':t'=>4,':mailac'=>"$mailac",':id'=>"$id"));
			$swmail = $stat->fetch(PDO::FETCH_ASSOC);

			if (!empty($swmail)) {
				$mailac = $namen.'.'.$apn.'-'.$ap2n.'@admin.schoolduck.com';
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
				$stat = $conn->prepare('SELECT emp.id from user us inner join empleado emp on us.id=emp.id_user where us.id=:id');
				$stat->execute(array(':id'=>"$id"));
				$idemp = $stat->fetch();
				$idemp = $idemp[0];

				/*	actuliza a admin*/
				$stat = $conn->prepare('UPDATE admin set
					email=:mail
					where id_emp=:id
				');
				$stat->execute(array(
					':mail' => "$mail",
					':id' => "$idemp"
				));
				$post = array();
				$messa = [
					'type' => 'success',
					'message' => 'datos actulizados exitosamente',
					'icon' => 'check-circle'
				];
				$stat = $conn->prepare('SELECT emp.id, us.nombre, us.ap1, us.ap2, us.email, us.email_acad, st.status from user us
					inner join empleado emp on us.id=emp.id_user
					inner join status st on st.id=us.status
					where us.id=:id');
				$stat->execute(array(':id'=>"$id"));
				$empdata = $stat->fetch(PDO::FETCH_ASSOC);
				$empdata['link'] = 'ad';
			}
		}
	}

	echo $twig->render('emp_edit.twig',compact('title','user','post','messa','status','empdata'));
?>

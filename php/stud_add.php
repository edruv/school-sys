<?php
	require_once 'config.php';
	require_once 'functions.php';

	$stat = $conn->prepare('SELECT id from student order by id desc');
	$stat->execute();
	$li = $stat->fetch(PDO::FETCH_ASSOC);
	$li = $li['id']+1;

	$title = 'agregar estudiante';

	$stat = $conn->prepare('SELECT * from carrera');
	$stat->execute();
	$carreras = $stat->fetchAll(PDO::FETCH_ASSOC);

	if (isset($_POST['addstud'])) {
		$name = trim($_POST['nstu']);
		$ap = trim($_POST['apps']);
		$ap2 = trim($_POST['apms']);
		$mail = trim($_POST['emastu']);
		$ps = trim($_POST['psst']);
		$psc = trim($_POST['psstc']);
		$carr = $_POST['cast'];
		$errors = array();
		$messa = array();
		$post = array('nombre' => $name,'ap1' => $ap,'ap2' => $ap2,'mail' => $mail,'carrera' => $carr);


		(!empty($name)) ? $a++ : array_push($errors,'ingresa el nombre');
		(!empty($ap)) ? $a++ : array_push($errors,'ingresa el apellido paterno');
		(!empty($ap2)) ? $a++ : array_push($errors,'ingresa el apellido materno');
		(!empty($mail)) ? (preg_match('/^([\w\.\-_]+)?\w+@[\w-_]+(\.\w+){1,}$/',$mail)) ? $a++ : array_push($errors,'el email "'.$mail.'" no es valido') : array_push($errors,'ingresa un email');
		// (!empty($mail)) ? $a++ : array_push($errors,'ingresa un email');
		(!empty($ps)) ? $a++ : array_push($errors,'ingresa una contraseña');
		(!empty($psc)) ? $a++ : array_push($errors,'ingresa la confirmacion de la contraseña');
		(!empty($carr)) ? $a++ : array_push($errors,'selecciona una carrera');

		if ($a > 6) {
			if ($ps == $psc) {

				$cps = $ps;

				$stat = $conn->prepare('SELECT email from user where email=:mail and type=:t');
				$stat->execute(array(':mail'=>"$mail",':t'=>1));
				$buem = $stat->fetchAll(PDO::FETCH_ASSOC);

				if (empty($buem)) {
					$regest++;
				}
				else {
					$messa = [
						'type' => 'danger',
						'message' => 'el correo "'.$buem[0]['email'].'" ya esta registrado',
						'icon' => 'triangule-exclamation'
					];
				}

				if ($regest == 1) {
					$name2 = strtolower($name);
					$ap1 = strtolower($ap);
					$ap22 = strtolower($ap2);
					(preg_match('/\s/',$name2)) ? $namen = str_replace(' ','_',limpiar($name2)) : $namen = limpiar($name2);
					(preg_match('/\s/',$ap1)) ? $apn = str_replace(' ','_',limpiar($ap1)) : $apn = limpiar($ap1);
					(preg_match('/\s/',$ap22)) ? $ap2n = str_replace(' ','_',limpiar($ap22)) : $ap2n = limpiar($ap22) ;

					$mailac = $namen.'.'.$apn.'@alumnos.schoolduck.com';

					$stat = $conn->prepare('SELECT email_acad from user where type=:t and email_acad=:mailac');
					$stat->execute(array(':mailac'=>"$mailac",':t'=>1));
					$swmail = $stat->fetch(PDO::FETCH_ASSOC);

					if (!empty($swmail)) {
						$mailac = $namen.'.'.$apn.'-'.$ap2n.'@alumnos.schoolduck.com';
					}

					$ps = sha1($ps);

					try {
						/*	resgistra un usuario tipo estudiante, activo	*/
						$stat = $conn->prepare('INSERT into user(nombre,ap1,ap2,email,email_acad,pass,type,status) values(:nombre,:ap1,:ap2,:email,:email_acad,:pass,:type,:status)');
						$regus = $stat->execute(array(
							':nombre' => "$name",
							':ap1' => "$ap",
							':ap2' => "$ap2",
							':email' => "$mail",
							':email_acad' => "$mailac",
							':pass' => "$ps",
							':type' => '1',
							':status' => '1'
						));
					} catch (Exception $e) {
						echo 'Exception -> ';
							var_dump($e->getMessage());
					}
					print_r($regus);
					if ($regus) {
						/*	busca id del usuario registrado	*/
						$stat = $conn->prepare('SELECT id from user where type=:t and email_acad=:email_acad');
						$stat->execute(array(
							':t' => '1',
							':email_acad' => "$mailac"
						));
						$gid = $stat->fetch();
						$gid = $gid[0];

						/*	registra a estudiante	*/
						$ad = semestre();
						$stat = $conn->prepare('INSERT into student(carrera,admition,user) values(:carrera,:admition,:user)');
						$stat->execute(array(
							':carrera' => "$carr",
							':admition' => "$ad",
							':user' => "$gid"
						));
						$post = array();
						$messa = [
							'type' => 'success',
							'message' => 'estudiante registrado exitosamente',
							'icon' => 'check-circle'
						];
						$stat = $conn->prepare('SELECT stu.id, us.nombre, us.ap1,us.ap2,us.email,us.email_acad, st.status,car.carrera, stu.admition from user us
						INNER JOIN student stu on us.id=stu.user
						INNER JOIN carrera car on car.id=stu.carrera
						inner JOIN status st on st.id=us.status where us.id=:id');
						$stat->execute(array(':id'=>$gid));
						$studata = $stat->fetch(PDO::FETCH_ASSOC);

						/*	registra pass sin encriptar	*/
						$stat = $conn->prepare('INSERT into pass(id_us,pass) values(:id_us,:pass)');
						$stat->execute(array(
							':id_us' => "$gid",
							':pass' => "$cps"
						));
					}
				}
			}
			else {
				$messa = [
					'type' => 'warning',
					'message' => 'las contraseña no coinciden',
					'icon' => 'exclamation-circle'
				];
			}
		}
	}

	echo $twig->render('stud_add.twig',compact('title','li','carreras','errors','post','messa','studata'));
?>

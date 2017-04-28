<?php
	require_once 'config.php';
	require_once 'functions.php';


	$title = 'agregar administrador';

	if (isset($_POST['addemp'])) {
		$name = trim($_POST['naem']);
		$ap = trim($_POST['appe']);
		$ap2 = trim($_POST['apme']);
		$mail = trim($_POST['ememp']);
		$ps = trim($_POST['psemp']);
		$psc = trim($_POST['psempc']);
		$errors = array();
		$messa = array();
		$post = array('nombre' => $name,'ap1' => $ap,'ap2' => $ap2,'mail' => $mail);

		(!empty($name)) ? $a++ : array_push($errors,'ingresa el nombre');
		(!empty($ap)) ? $a++ : array_push($errors,'ingresa el apellido paterno');
		(!empty($ap2)) ? $a++ : array_push($errors,'ingresa el apellido materno');
		(!empty($mail)) ? (preg_match('/^([\w\.\-_]+)?\w+@[\w-_]+(\.\w+){1,}$/',$mail)) ? $a++ : array_push($errors,'el email "'.$mail.'" no es valido') : array_push($errors,'ingresa un email');
		(!empty($ps)) ? $a++ : array_push($errors,'ingresa una contraseña');
		(!empty($psc)) ? $a++ : array_push($errors,'ingresa la confirmacion de la contraseña');


		if ($a > 5) {
			if ($ps == $psc) {
				$cps = $ps;

				$stat = $conn->prepare('SELECT email from user where email=:mail and type=:t');
				$stat->execute(array(':mail'=>"$mail",':t'=>'2'));
				$buem = $stat->fetchAll(PDO::FETCH_ASSOC);

				if (empty($buem)) {
					$regemp++;
				}
				else {
					$messa = [
						'type' => 'danger',
						'message' => 'el correo "'.$buem[0]['email'].'" ya esta registrado',
						'icon' => 'triangule-exclamation'
					];
				}

				if ($regemp == 1) {
					$name2 = strtolower($name);
					$ap1 = strtolower($ap);
					$ap22 = strtolower($ap2);
					(preg_match('/\s/',$name2)) ? $namen = str_replace(' ','_',limpiar($name2)) : $namen = limpiar($name2);
					(preg_match('/\s/',$ap1)) ? $apn = str_replace(' ','_',limpiar($ap1)) : $apn = limpiar($ap1);
					(preg_match('/\s/',$ap22)) ? $ap2n = str_replace(' ','_',limpiar($ap22)) : $ap2n = limpiar($ap22) ;

					$mailac = $namen.'.'.$apn.'@docentes.schoolduck.com';

					$stat = $conn->prepare('SELECT email_acad from user where type=:t and email_acad=:mailac');
					$stat->execute(array(':mailac'=>"$mailac",':t'=>'3'));
					$swmail = $stat->fetch(PDO::FETCH_ASSOC);

					if (!empty($swmail)) {
						$mailac = $namen.'.'.$apn.'-'.$ap2n.'@docentes.schoolduck.com';
					}

					$ps = sha1($ps);

					try {
						/*	resgistra un usuario tipo secretaria, activo	*/
						$stat = $conn->prepare('INSERT into user(nombre,ap1,ap2,email,email_acad,pass,type,status) values(:nombre,:ap1,:ap2,:email,:email_acad,:pass,:type,:status)');
						$regus = $stat->execute(array(
							':nombre' => "$name",
							':ap1' => "$ap",
							':ap2' => "$ap2",
							':email' => "$mail",
							':email_acad' => "$mailac",
							':pass' => "$ps",
							':type' => '2',
							':status' => '1'
						));
					} catch (Exception $e) {
						echo 'Exception -> ';
							var_dump($e->getMessage());
					}

					if ($regus) {
						/*	busca id del usuario registrado	*/
						$stat = $conn->prepare('SELECT id from user where type=:t and email_acad=:email_acad');
						$stat->execute(array(
							':t' => '2',
							':email_acad' => "$mailac"
						));
						$gid = $stat->fetch();
						$gid = $gid[0];

						/*	registra a un empleado*/
						$stat = $conn->prepare('INSERT into empleado(id_user) values(:id_user)');
						$stat->execute(array(
							':id_user' => "$gid"
						));

						/*	busca id del empleado registrado*/
						$stat = $conn->prepare('SELECT * from empleado where id_user=:id_user');
						$stat->execute(array(':id_user' => "$gid"));
						$gide = $stat->fetch();
						$gide = $gide['id'];

						/*	registra a admin*/
						$stat = $conn->prepare("INSERT into admin(id_emp,email) values(:id_emp,:mail)");
						$stat->execute(array(
							':id_emp' => "$gide",
							':mail' => "$mail"
						));

						$post = array();
						$messa = [
							'type' => 'success',
							'message' => 'profesor registrada exitosamente',
							'icon' => 'check-circle'
						];

						$stat = $conn->prepare('SELECT emp.id, us.nombre, us.ap1, us.ap2, us.email, us.email_acad, st.status from user us
							inner join empleado emp on us.id=emp.id_user
							inner join secre sec on emp.id=sec.id_emp
							inner join status st on us.status=st.id
							where us.id=:id');
						$stat->execute(array(':id'=>"$gid"));
						$empdata = $stat->fetch(PDO::FETCH_ASSOC);
//NOTE: quitar luego
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

	echo $twig->render('emp_add.twig',compact('title','user','messa','errors','post','empdata'));
?>

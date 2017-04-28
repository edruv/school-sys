<?php
	require_once 'vendor/autoload.php';

	$dbd = array(
      'db' => 'schooltest',
      'us' => 'root',
      'ps' => 'kilo'
   );

	function conexion ($dbd){
		try {
			$conexion = new PDO('mysql:host=localhost;dbname='.$dbd['db'],$dbd['us'],$dbd['ps'],array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
			return $conexion;
		} catch (PDOException $e) {
			return false;
		}
	}

	$conn = conexion($dbd);

	$loader = new Twig_Loader_Filesystem('views');
	$twig = new Twig_Environment($loader);

	$title = 'Pagina de inicio';

	if (isset($_POST['signin'])) {
		$cod = trim($_POST['signcod']);
		$ps = trim($_POST['signpass']);
		$errors = array();
		$messa = array();

		// if (preg_match('/^([\w\.\-_]+)?\w+@[\w-_]+(\.\w+){1,}$/',$cod)) {
			// (!empty($cod)) ? $a++ : array_push($errors,'ingresa tu correo academico') ;
		// }
		(!empty($cod)) ? (ctype_digit($cod)) ? $a++ : array_push($errors,'ingresa solo numeros') : array_push($errors,'ingresa tu codigo de estudiante') ;
		(!empty($ps)) ? $a++ : array_push($errors,'ingresa tu contraseña') ;

		if ($a > 1) {
			$stat = $conn->prepare('SELECT stu.id codigo, us.email_acad, us.pass, us.type from user us
				inner join student stu on us.id=stu.user where stu.id=:id');
			$stat->execute(array(':id'=>$cod));
			$busid = $stat->fetch(PDO::FETCH_ASSOC);
			if (!empty($busid)) {
				$stat = $conn ->prepare('SELECT us.id, us.nombre, us.ap1, us.ap2, stu.id codigo, sta.status, ca.id cacod, ca.carrera, stu.admition, us.type from user us
					inner join student stu on us.id=stu.user
					inner join status sta on us.status=sta.id
					inner join status st on us.status=st.id
					inner join carrera ca on stu.carrera=ca.id
					where stu.id=:id');
				$stat->execute(array(':id' => $busid['codigo']));
				$fid = $stat->fetch(PDO::FETCH_ASSOC);
				$ps = sha1($ps);
				if ($ps == $busid['pass']) {
					session_start();
					$_SESSION['type'] = $busid['type'];
					$_SESSION['arse'] = $fid;
					header('Location: php/');
				}
				else {
					$messa = [
						'type' => 'danger',
						'message' => 'el codigo o contraseña del estudiante no son correctos',
						'icon' => 'exclamation-triangle'
					];
				}
			}else {
				$messa = [
					'type' => 'danger',
					'message' => 'el codigo o contraseña del estudiante no son correctos',
					'icon' => 'exclamation-triangle'
				];
			}
		}
	}

	echo $twig->render('index1.twig',compact('title','errors','messa'));
?>

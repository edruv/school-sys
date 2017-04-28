<?php
	require_once 'config.php';
	require_once 'functions.php';

	$title = 'agregar seccion';

	$stat = $conn->prepare("SELECT us.id, us.nombre,us.ap1,us.ap2, emp.id codigo FROM user us inner join empleado emp on emp.id_user=us.id inner join maestro ma on ma.id_emp=emp.id where us.status=1");
	$stat->execute();
	$profs = $stat->fetchAll();

	$stat = $conn->prepare("SELECT au.* from aula au order by au.edau");
	$stat->execute();
	$aued = $stat->fetchAll();

	$stat = $conn->prepare("SELECT mat.id,mat.nombre,car.carrera from materia mat inner join carrera car on mat.carrera=car.id");
	$stat->execute();
	$matters = $stat->fetchAll();

	$stat = $conn->prepare("SELECT namsec from seccion");
	$stat->execute();
	$nsp = $stat->fetch(PDO::FETCH_ASSOC);
	// print_r(substr($nsp['namsec'],-2)+3);

	// $hoini = array('07:00','08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00');
	// $hofin = array('07:55','08:55','09:55','10:55','11:55','12:55','13:55','14:55','15:55','16:55','17:55','18:55','19:55','20:55');
	$horarios = array('07:00'.'-'.'08:55','09:00'.'-'.'10:55','11:00'.'-'.'12:55','13:00'.'-'.'14:55','15:00'.'-'.'16:55','17:00'.'-'.'18:55','19:00'.'-'.'20:55');
	// $hofin = array('07:55','08:55','09:55','10:55','11:55','12:55','13:55','14:55','15:55','16:55','17:55','18:55','19:55','20:55');

	if (isset($_POST['addsec'])) {
		$materia = $_POST['rmat'];
		$cupo = $_POST['rcup'];
		$dias = $_POST['weekday'];
		$salon = $_POST['reau'];
		$hif = $_POST['hif'];
		$calen = $_POST['rper'];
		$prof = $_POST['rmae'];
		$errors = array();
		$messa = array();
		$post = array('materia' => $materia,'cupo' => $cupo,'dias' => $dias,'aula' => $salon,'hif'=>$hif,'peri' => $calen,'prof' => $prof);

		(!empty($materia)) ? $a++ : array_push($errors,"selecciona una materia para esta seccion");
		(!empty($cupo)) ? (ctype_digit($cupo)) ? $a++ : array_push($errors,'ingresa el cupo con un valor entero') : array_push($errors,'ingresa el cupo para esta seccion');
		(!empty($dias)) ? $a++ : array_push($errors,'ingresa los dias que se imparte esta seccion');
		(!empty($salon)) ? $a++ : array_push($errors,'selecciona un aula');
		(!empty($hif)) ? $a++ : array_push($errors,'selecciona el horario'); ;
		// (!empty($hini)) ? $a++ : array_push($errors,'selecciona la hora en que inicia la clase');
		// (!empty($hfin)) ? $a++ : array_push($errors,'selecciona la hora en que termina la clase');
		// ($hini > $hfin) ? array_push($errors,"horario invalido ($hini-$hfin)") : $a++ ;
		(!empty($calen)) ? $a++ : array_push($errors,'selecciona el semestre en que se va a impartir');
		(!empty($prof)) ? $a++ : array_push($errors,'selecciona a el profesor que va a impartir la clase');

		/**/
		switch ($calen) {
			case '17A':
			$fi = '16-01-2017';
			$ff = '02-06-2017';
			$fini = date('Y/m/d',strtotime($fi));
			$ffin = date('Y/m/d',strtotime($ff));
			break;
			case '17B':
			$fi = '14-08-2017';
			$ff = '15-12-2017';
			$fini = date('Y/m/d',strtotime($fi));
			$ffin = date('Y/m/d',strtotime($ff));
			break;
		}

		$hif = explode('-',$hif);
		$hini = $hif[0];
		$hfin = $hif[1];

		$hini = date('H:i',strtotime($hini));
		$hfin = date('H:i',strtotime($hfin));
		// $dias = implode(',',$dias);
		// print_r($dias."\n");
		// $dias = explode(',',$dias);
		// print_r($dias);


		// $stat = $conn->prepare('SELECT * from seccion where aula=:aula and hra_ini=:hini');
		// $stat->execute(array(':aula'=>"$salon",':hini'=>"$hini"));
		// $x = $stat->fetchAll(PDO::FETCH_ASSOC);

		// if ($x !=0) {
		// 	foreach ($x as $xx) {
		// 		$diast = explode(',',$xx['dias']);
		// 		// print_r($diast);
		// 		$inter = array_intersect($diast,$dias);
		// 		if ($inter) {
		// 			// print_r($inter);
		// 			$dia = $xx['id'];
		// 		}
		// 	}
		// }
		// echo 'tupla con dias repetidos: '.$dia."\n";

		// echo "<pre class='container-fluid'><div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'>";
		// print_r($x);
		// echo "</pre>";

		/**
		 *	validar que aula no este ocupado
		 *	validar la hora de la clase
		 *	validar la hora que se necesita el salon
		 *
		 *
		 *	validar profesor este disponible
		 */

		if ($a > 6) {
			/**
			*	select * from seccion
			*	filtrar por salon y hora de inicio (y si hay en las colisiones validar(comparar) los dias)
			*	y validar si el maestro tiene clase a la misma hora (disponibilidad)
			*/
			$stat = $conn->prepare('SELECT * from seccion where aula=:aula and hra_ini=:hini');
			$stat->execute(array(':aula'=>"$salon",':hini'=>"$hini"));
			$busec = $stat->fetchAll(PDO::FETCH_ASSOC);

			// echo "<pre class='container-fluid'><div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'>";
			// print_r($busec);
			// echo "</pre>";

			if ($busec != 0) {
				foreach ($busec as $busc) {
					$diast = explode(',',$busc['dias']);
					$inter = array_intersect($diast,$dias);
					if ($inter) {
						$idcol = $busc['id'];
					}
				}
				echo "<pre class='container-fluid'><div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'>";
				print_r($busec);
				echo "</pre>";

				$stat = $conn->prepare('SELECT * from seccion where id=:id');
				$stat->execute(array(':id'=>$idcol));
				$revmin = $stat->fetch(PDO::FETCH_ASSOC);



			}

			/*	add seccion name	*/
			$stat = $conn->prepare('SELECT namsec from seccion where materia=:materia');
			$stat->execute(array(':materia' => $materia));
			$snt = $stat->fetch(PDO::FETCH_ASSOC);
			$sn = substr($snt['namsec'],-2)+1;
			if ($sn < 10) {
				$sn = 'SD0'.$sn;
			}else {
				$sn = 'SD'.$sn;
			}

			// try {
			// 	/*	convert arrray dias to string	*/
			// 	$dias = implode(',',$dias);
			// 	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			// 	$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			// 	$stat = $conn->prepare("INSERT into seccion(namsec,materia,cupo,dias,aula,hra_ini,hra_fin,f_ini,f_fin,maestro) values(:nsec,:mater,:cupo,:dias,:aula,:hini,:hfin,:fini,:ffin,:maestro)");
			// 	$valreg = $stat->execute(array(
			// 		':nsec' => "$sn",
			// 		':mater' => "$materia",
			// 		':cupo' => "$cupo",
			// 		':dias' => "$dias",
			// 		':aula' => "$salon",
			// 		':hini' => "$hini",
			// 		':hfin' => "$hfin",
			// 		':fini' => "$fini",
			// 		':ffin' => "$ffin",
			// 		':maestro' => "$prof"
			// 	));
			// } catch (Exception $e) {
			// 	echo 'Exception -> ';
			// 	var_dump($e->getMessage());
			// }
			if ($valreg) {
				$post = array();
				$messa = [
					'type' => 'success',
					'message' => "seccion $sn agregada exitosamente",
					'icon' => 'check-circle'
				];
			}
		}else {
			$post;
		}
	}

	echo $twig->render('secc_addv2.twig',compact('title','profs','aued','matters','horarios','errors','messa','post'));
?>

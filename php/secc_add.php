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

	$horarios = array('07:00'.'-'.'08:55','09:00'.'-'.'10:55','11:00'.'-'.'12:55','13:00'.'-'.'14:55','15:00'.'-'.'16:55','17:00'.'-'.'18:55','19:00'.'-'.'20:55');

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

		if ($a > 6) {
			$stat = $conn->prepare('SELECT * from seccion where aula=:aula and hra_ini=:hini');
			$stat->execute(array(':aula'=>$salon,':hini'=>$hini));
			$busec = $stat->fetchAll(PDO::FETCH_ASSOC);

			if (!empty($busec)) {
				foreach ($busec as $sec) {
					$diast = explode(',',$sec['dias']);
					$intersec = array_intersect($diast,$dias);
					if (!empty($intersec)) {
						$idcol = $sec['id'];
						$stat = $conn->prepare('SELECT sec.*, ma.nombre materia from seccion sec inner join materia ma on sec.materia=ma.id where sec.id=:id');
						$stat->execute(array(':id'=>$idcol));
						$sm = $stat->fetch(PDO::FETCH_ASSOC);
						$messa = [
							'type' => 'warning',
							'message' => "la materia de ".$sm['materia'].' ('.$sm['namsec'].'), ya esta utilizando esta aula('.$sm['aula'].') los dias '. implode(',',$intersec),
							'icon' => 'exclamation'
						];
					}
				}
				if (!$intersec) {
					$regsec++;
				}
			}else {
				$regsec++;
			}

			$stat = $conn->prepare('SELECT * from seccion where maestro=:prof and hra_ini=:hini');
			$stat->execute(array(':prof'=>"$prof",':hini'=>"$hini"));
			$buspro = $stat->fetchAll(PDO::FETCH_ASSOC);

			if (!empty($buspro)) {
				foreach ($buspro as $pro) {
					$diast = explode(',',$pro['dias']);
					$interpro = array_intersect($diast,$dias);
					if (!empty($interpro)) {
						$idcol = $pro['id'];
						$stat = $conn->prepare('SELECT sec.*, us.nombre, us.ap1, us.ap2 from seccion sec
							inner join empleado emp on sec.maestro=emp.id
							inner join user us on emp.id_user=us.id where sec.id=:id'
						);
						$stat->execute(array(':id' => "$idcol"));
						$sm = $stat->fetch(PDO::FETCH_ASSOC);

						$messa = [
							'type' => 'warning',
							'message' => 'el profesor '.$sm['nombre'].' '.$sm['ap1'].' '.$sm['ap2'].', no esta disponible en este horario ('.$hini.'-'.$hfin.')',
							'icon' => 'exclamation'
						];
					}
				}
				if (!$interpro) {
					$regsec++;
				}
			}else {
				$regsec++;
			}

			if ($regsec == 2) {
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

				try {
					/*	convert arrray dias to string	*/
					$dias = implode(',',$dias);
					$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
					$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
					$stat = $conn->prepare("INSERT into seccion(namsec,materia,cupo,dias,aula,hra_ini,hra_fin,f_ini,f_fin,maestro) values(:nsec,:mater,:cupo,:dias,:aula,:hini,:hfin,:fini,:ffin,:maestro)");
					$valreg = $stat->execute(array(
						':nsec' => "$sn",
						':mater' => "$materia",
						':cupo' => "$cupo",
						':dias' => "$dias",
						':aula' => "$salon",
						':hini' => "$hini",
						':hfin' => "$hfin",
						':fini' => "$fini",
						':ffin' => "$ffin",
						':maestro' => "$prof"
					));
				} catch (Exception $e) {
					echo 'Exception -> ';
					var_dump($e->getMessage());
				}
			}
			if ($valreg) {
				$post = array();
				$messa = [
					'type' => 'success',
					'message' => 'seccion '.$sn.' agregada exitosamente',
					'icon' => 'check-circle'
				];
			}
		}else {
			$post;
		}
	}

	echo $twig->render('secc_addv2.twig',compact('title','profs','aued','matters','horarios','errors','messa','post'));
?>

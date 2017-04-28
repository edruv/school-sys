<?php
	require_once 'config.php';
	require_once 'functions.php';

	$title = 'registro de materias';

	if (isset($_POST['adca'])) {
		$sec = $_POST['regsec'];
		$errors = array();
		$messa = array();

		(!empty($sec)) ? (!ctype_digit($sec)) ? array_push($errors,"el ID '".$sec."' no es numerico") : $a++ : array_push($errors,'ingresa el ID de la materia a registrar') ;

		if ($a == 1) {
			$stat = $conn->prepare('SELECT  sec.disp, ma.carrera from materia ma inner join seccion sec on sec.materia=ma.id
			where sec.id=:id');
			$stat->execute(array(':id'=>"$sec"));
			$val = $stat->fetch(PDO::FETCH_ASSOC);

			if (!empty($val)) {
				if ($user['cacod'] == $val['carrera']) {
					if ($val['disp'] > 0) {
						$stat = $conn->prepare('SELECT * from calif ca inner join seccion sec on ca.id_sec=sec.id where ca.id_est=:id');
						$stat->execute(array(':id'=>$user['codigo']));
						$ckho = $stat->fetch(PDO::FETCH_ASSOC);

						$stat = $conn->prepare('SELECT * from seccion where id=:id');
						$stat->execute(array(':id'=>"$sec"));
						$ckse = $stat->fetch(PDO::FETCH_ASSOC);

						if ($ckho['hra_ini'] == $ckse['hra_ini']) {
							$messa = [
								'type' => 'danger',
								'message' => 'hay un conflicto de horarios con la materia con el id #'.$ckho['id_sec'],
								'icon' => 'exclamation'
							];
						}else {
							$stat = $conn->prepare('INSERT into calif(id_est,id_sec) values(:id_est,:id_sec)');
							$regalu = $stat->execute(array(
								':id_est' => $user['codigo'],
								':id_sec' => "$sec"
							));
							if ($regalu) {
								$stat = $conn->prepare('UPDATE seccion set
									disp = :disp
									where id=:id
									');
								$ckse['disp'] = $ckse['disp']-1;
								$stat->execute(array(
									':id' => "$sec",
									':disp' => $ckse['disp']
								));

								$messa = [
									'type' => 'success',
									'message' => 'materia agregada exitosamente',
									'icon' => 'check-circle'
								];
							}
						}
					}else {
						$messa = [
							'type' => 'danger',
							'message' => 'no hay cupos en esta materia :(',
							'icon' => 'exclamation-triangle'
						];
					}
				}else {
					$messa = [
						'type' => 'danger',
						'message' => 'esta materia "'.$sec.'" no pertenece a tu carrera',
						'icon' => 'exclamation-triangle'
					];
				}
			}
		}
	}

	echo $twig->render('stud_reg.twig',compact('title','user','errors','messa'));
?>

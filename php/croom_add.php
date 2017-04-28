<?php
	require_once 'config.php';
	require_once 'functions.php';

	$title = 'agregar aula';

	$statement = $conn->prepare('select * from edif');
	$statement->execute();
	$res = $statement->fetchAll(PDO::FETCH_ASSOC);

	if (isset($_POST['acro'])) {
		$name = $_POST['ncr'];
		$edif = $_POST['edcr'];
		$errors = array();
		$messa = array();

		(!empty($name)) ? $a++ : array_push($errors,"ingresa un numero de aula");
		(!empty($edif)) ? $a++ : array_push($errors,"ingresa la localizacion del aula") ;

		if ($a >= 2) {
			$stat = $conn->prepare("SELECT * from aula where edif=:edifi and num=:numb");
			$stat->execute(array(
				':edifi' => "$edif",
				':numb' => "$name"
			));
			$seareg = $stat->fetch();

			if ($seareg == 0) {
				$stat = $conn->prepare('select * from edif where id=:edif');
				$stat->execute(array(':edif' => "$edif"));
				$res = $stat->fetch();

				$stat = $conn->prepare("INSERT into aula(edif,num,edau) values(:edif,:num,:edau)");
				$edaul = $res['nombre'].'-'.$name;
				$valreg = $stat->execute(array(
					':edif' => "$edif",
					':num' => "$name",
					':edau' => "$edaul"
				));

				if ($valreg) {
					$messa = [
						'type' =>'success',
						'message' => 'aula agregada exitosamente',
						'icon' => 'check-circle'
					];
				}
			}else {
				$messa = [
					'type' => 'danger',
					'message' => "el aula $name ya esta registrada",
					'icon' => 'exclamation-triangle'
				];
			}
		}
	}

	echo $twig->render('croom_add.twig',compact('title','user','res','errors','messa'));
?>

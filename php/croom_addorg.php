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

		(!empty($name)) ? $a++ : array_push($errors,"Ingresa un numero de aula");
		(!empty($edif)) ? $a++ : array_push($errors,"Ingresa la localizacion del aula");

		if ($a >= 2) {
			$stat = $conn->prepare("SELECT * from aula where edif=:edif and num=:numb");
			$stat->execute(array(
				':edif' => "$edif",
				':numb' => "$name"
			));
			$seareg =  $stat->fetch();

			if ($seareg == 0) {
				try {
					$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
					$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
					$stat = $conn->prepare("INSERT into aula(edif,num) values(:edifi,:nume)");
					$reg = $stat->execute(array(
						':edifi' => "$edif",
						':nume' => "$name"
					));
				} catch (Exception $e) {
					echo 'Exception -> ';
				    var_dump($e->getMessage());
				}

				if ($reg) {
					$messa = [
						'type' => 'success',
						'message' => 'Aula agregada exitosamente',
						'icon' => 'check-circle'
					];
				}
			}
			else {
				$messa = [
					'type' => 'danger',
					'message' => "El aula $name ya esta registrada",
					'icon' => 'exclamation-triangle'
				];
			}
		}
	}

	echo $twig->render('croom_add.twig',compact('title','res','errors','messa'));
?>

<?php
	require_once 'config.php';
	require_once 'functions.php';

	$title = 'agregar carrera';

	if(isset($_POST['adca'])){
		$type = $_POST['tyca'];
		$join = $_POST['join'];
		$name = $_POST['ncar'];
		
		if (!empty($type) && !empty($name)) {
			if (!empty($join)) {
				$car = $type.' '.$join.' '.$name;
			}
			else {
				$car = $type.' '.$name;
			}
			$stat = $conn->prepare('insert into carrera(carrera) values(:carrera)');
			$stat->execute(array(':carrera'=> "$car"));
		}
	}

	echo $twig->render('career_addv2.twig',compact('title'));
?>

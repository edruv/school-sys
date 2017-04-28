<?php
	require_once 'config.php';
	require_once 'functions.php';
// print_r($user);
	// permiso($user['type'],'2,4');

	$stat = $conn->prepare("SELECT sec.id, ma.nombre materia, sec.namsec, sec.dias, DATE_FORMAT(sec.hra_ini,'%H:%i') hra_ini, DATE_FORMAT(sec.hra_fin,'%H:%i') hra_fin, sec.aula from seccion sec
		inner join materia ma on ma.id=sec.materia
		inner join empleado emp on emp.id=sec.maestro
		inner join user us on us.id=emp.id_user
		where emp.id=:id");
	$stat->execute(array(':id'=>$user['codigo']));
	$groups = $stat->fetchAll(PDO::FETCH_ASSOC);

	if (empty($groups)) {
		$groups = null;
	}

	$title = 'grupos del profesor';

	echo $twig->render('prof_groups.twig',compact('title','user','groups'));
?>

<?php
	require_once 'config.php';
	require_once 'functions.php';

	$title= 'ver alumnos';
//NOTE: crear vista de student details
	$stat = $conn->prepare('SELECT us.id, stu.id cod, us.nombre, us.ap1, us.ap2, ca.carrera from user us
		inner join student stu on us.id=stu.user
		inner join carrera ca on ca.id=stu.carrera');
	$stat->execute();
	$estudiantes = $stat->fetchAll(PDO::FETCH_ASSOC);

	echo $twig->render('studs_view.twig',compact('title','user','estudiantes'));
?>

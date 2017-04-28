<?php
	require_once 'config.php';
	require_once 'functions.php';

	$title = 'ver secciones';

	$stat = $conn->prepare('SELECT sec.*,ma.nombre mate,us.nombre,us.ap1,us.ap2,ma.id cod from seccion sec INNER JOIN materia ma ON sec.materia=ma.id INNER JOIN empleado emp ON emp.id=sec.maestro INNER JOIN user us on us.id=emp.id_user');
	$stat->execute();
	$secs = $stat->fetchAll(PDO::FETCH_ASSOC);

	echo $twig->render('seccs_viewt.twig',compact('title','secs'));
?>

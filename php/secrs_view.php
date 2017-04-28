<?php
	require_once 'config.php';
	require_once 'functions.php';

	$title= 'ver secretarias';

	$stat = $conn->prepare('SELECT us.id, emp.id cod, us.nombre, us.ap1, us.ap2 from user us
		inner join empleado emp on emp.id_user=us.id
		inner join secre sec on sec.id_emp=emp.id');
	$stat->execute();
	$empleados = $stat->fetchAll(PDO::FETCH_ASSOC);

	echo $twig->render('emp_views.twig',compact('title','user','empleados'));
?>

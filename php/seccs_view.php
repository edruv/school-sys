<?php
	require_once 'config.php';
	require_once 'functions.php';

	$title = 'ver secciones';

	$stat = $conn->prepare("SELECT sec.id,ma.nombre materia, sec.namsec, sec.cupo, sec.disp, DATE_FORMAT(sec.hra_ini,'%H:%i') hra_ini, DATE_FORMAT(sec.hra_fin,'%H:%i') hra_fin, sec.dias, ed.nombre edif, sec.aula, DATE_FORMAT(sec.f_ini,'%d/%m/%y') f_ini, DATE_FORMAT(sec.f_fin,'%d/%m/%y') f_fin, ca.carrera, us.nombre, us.ap1, us.ap2, emp.id cod from seccion sec
	inner join materia ma on sec.materia=ma.id
	inner join carrera ca on ma.carrera=ca.id
	inner join empleado emp on emp.id=sec.maestro
	inner join user us on emp.id_user=us.id
	inner join aula au on sec.aula=au.edau
	inner join edif ed on au.edif=ed.id");
	$stat->execute();
	$visec = $stat->fetchAll(PDO::FETCH_ASSOC);

	echo $twig->render('seccs_view.twig',compact('title','user','visec'));
	// select *,DATE_FORMAT(sec.hra_ini,'%H:%i') hra_ini,DATE_FORMAT(sec.hra_fin,'%H:%i') hra_fin,DATE_FORMAT(sec.f_ini,'%d/%m/%y') f_ini,DATE_FORMAT(sec.f_fin,'%d/%m/%y') f_fin,ed.nombre edif,us.nombre,us.ap1,us.ap2, ma.nombre materia from seccion sec inner join materia ma on sec.materia=ma.id inner join empleado emp on emp.id=sec.maestro inner join user us on emp.id_user=us.id
	// inner join aula au on sec.aula=au.edau inner join edif ed on au.edif=ed.id
?>

<?php
	require_once 'config.php';
	require_once 'functions.php';

	$id = $_GET['id'];

	$stat = $conn->prepare("SELECT sec.id, mat.nombre, sec.namsec, sec.dias, DATE_FORMAT(sec.hra_ini,'%H:%i') hra_ini, DATE_FORMAT(sec.hra_fin,'%H:%i') hra_fin, ed.nombre edif, au.num from seccion sec
	   inner join materia mat on sec.materia=mat.id
	   inner join aula au on au.edau=sec.aula
	   inner join edif ed on au.edif=ed.id
	where sec.id=:id");
	$stat->execute(array(':id'=>"$id"));
	$group = $stat->fetch(PDO::FETCH_ASSOC);

	$dtmp = explode(',',$group['dias']);
	$dtmp = implode(', ',$dtmp);
	$group['dias'] = $dtmp;

	$stat = $conn->prepare('SELECT stu.id cod, us.ap1, us.ap2, us.nombre from calif ca inner join student stu on stu.id=ca.id_est inner join user us on us.id=stu.user where id_sec=:secc');
	$stat->execute(array(':secc'=>"$id"));
	$alums = $stat->fetchAll(PDO::FETCH_ASSOC);

	$title = $group['nombre'].' '.$group['namsec'];

	echo $twig->render('prof_group_details.twig',compact('title','user','group','alums'));
?>

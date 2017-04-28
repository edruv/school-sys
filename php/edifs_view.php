<?php
	require_once 'config.php';
	require_once 'functions.php';

	$title= 'ver edificios';

	$stat = $conn->prepare("SELECT ed.*, count(au.num) naula from edif ed inner join aula au where ed.id=au.edif group by ed.id");
	$stat->execute();
	$result = $stat->fetchAll(PDO::FETCH_ASSOC);

	echo $twig->render('edifs_view.twig',compact('title','result'));
?>

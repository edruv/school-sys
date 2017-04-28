<?php
	require_once 'config.php';
	require_once 'functions.php';

	$title = 'agregar aula';

	$statement = $conn->prepare('select * from edif');
	$statement->execute();
	$res = $statement->fetchAll(PDO::FETCH_ASSOC);

	echo $twig->render('croom_add.twig',compact('title','res'));
?>

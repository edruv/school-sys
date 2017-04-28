<?php
	require_once 'config.php';

	$title = 'agregar carrera';

	echo $twig->render('career_add.twig',compact('title'));
?>

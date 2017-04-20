<?php
	require_once 'config.php';

	$title = 'agregar carrera';

	echo $twig->render('add_career.twig',compact('title'));
?>

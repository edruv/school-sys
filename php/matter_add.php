<?php
	require_once 'config.php';
	require_once 'functions.php';

	$title = 'agregar materia';

	echo $twig->render('matter_add.twig',compact('title'));
?>

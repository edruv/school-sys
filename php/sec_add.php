<?php
	require_once 'config.php';
	require_once 'functions.php';

	$title = 'agregar seccion';

	echo $twig->render('sec_add.twig',compact('title'));
?>

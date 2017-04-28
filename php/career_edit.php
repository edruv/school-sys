<?php
	require_once 'config.php';
	require_once 'functions.php';

	$title = 'editar carrera';

	echo $twig->render('career_edit.twig',compact('title'));
?>

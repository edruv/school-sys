<?php
	require_once 'config.php';
	require_once 'functions.php';

	$title = 'buscar carrera';

	echo $twig->render('career_search.twig',compact('title','user'));
?>

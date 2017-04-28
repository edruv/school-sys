<?php
	require_once 'config.php';

	$title = 'buscar alumno';

	echo $twig->render('stud_search.twig', compact('title'));
?>

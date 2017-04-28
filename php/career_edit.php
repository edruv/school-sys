<?php
	require_once 'config.php';

	$title = 'editar carrera';

	echo $twig->render('career_edit.twig',compact('title'));
?>

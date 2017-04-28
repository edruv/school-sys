<?php
	require_once 'config.php';

	$title= 'ver alumnos';

	echo $twig->render('studs_view.twig',compact('title'));
?>

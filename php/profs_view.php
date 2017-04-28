<?php
	require_once 'config.php';

	$title= 'ver profesores';

	echo $twig->render('emp_views.twig',compact('title'));
?>

<?php
	require_once 'config.php';

	$title= 'ver administradores';

	echo $twig->render('emp_views.twig',compact('title'));
?>

<?php
	require_once 'config.php';

	$title= 'ver secretarias';

	echo $twig->render('emp_views.twig',compact('title'));
?>

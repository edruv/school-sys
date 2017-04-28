<?php
	require_once 'config.php';
	require_once 'functions.php';

	$title = '';

	echo $twig->render('',compact('title'));
?>

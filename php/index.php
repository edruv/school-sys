<?php
	require_once 'config.php';
	require_once 'functions.php';

	$title = 'pagina principal';

	echo $twig->render('index.twig',compact('title','user'));
?>

<?php
	require_once 'config.php';
	require_once 'functions.php';

	$id = $_GET['edif'];

	$stat = $conn->prepare("SELECT * from edif ed inner join aula au where ed.id=au.edif and ed.id=:id");
	$stat->execute(array(':id' => "$id"));
	$res = $stat->fetchAll(PDO::FETCH_ASSOC);
	$total = count($res);
	$namedi = $res[0]['nombre'];

	// echo "<pre class='container-fluid'><div class='col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main'>";
	// print_r($res);
	// echo '</div></pre>';

	$title = $namedi;

	echo $twig->render('edif_detail.twig',compact('title','user','res','total'));
?>

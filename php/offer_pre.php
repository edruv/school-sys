<?php
	require_once 'config.php';
	require_once 'functions.php';

	$stat = $conn->prepare('SELECT * from carrera');
	$stat->execute();
	$carrs = $stat->fetchAll(PDO::FETCH_ASSOC);

	$title = 'oferta academica';

	if (isset($_POST['adca'])) {
		$car = $_POST['tyca'];
		$clave = trim($_POST['ofcl']);
		$materia = trim($_POST['ofmat']);
		$errors = array();

		(empty($car)) ? array_push($errors,'debes seleccionar una carrera') : $b++ ;
		(!empty($clave)) ? (ctype_digit($clave)) ? $a++ : array_push($errors,'ingresa solo numeros') : false;
		(!empty($materia)) ? (preg_match("/[a-zA-Z]+[-_]*[a-zA-Z]+/",$materia)) ? $c++ : array_push($errors,'ingresa solo letras') : false ;

		if ($b == 1) {
			header("Location: offer.php?tyca=".$car."&ofmat=".$materia."&ofcl=".$clave);
		}
	}

	echo $twig->render('offer_pre.twig',compact('title','carrs','errors'));
?>

<?php
	require_once 'config.php';
	require_once 'functions.php';

	$b = '<br>';
	$stat = $conn->prepare('SELECT * from edif');
	$stat->execute();
	$edificios = $stat->fetchAll(/*PDO::FETCH_ASSOC*/);
	// echo "<pre>";
	// print_r($edificios);
	// echo "</pre>";


	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$stat = $conn->prepare("INSERT into aula(edif,num,edau) values(:edi,:nume,:ediau)");

	for ($i=0; $i < count($edificios)+1 ; $i++) {
		// echo $edificios[$i][1].$b;
		// echo $edificios[$i][1].$b;
		$edifi = $edificios[$i][0];
		for ($j=1; $j <6 ; $j++) {
			$edaul = $edificios[$i][0].'-'.$j;
			// $stat->execute(array(
			// 	':edi' => "$edifi",
			// 	':nume' => "$j",
			// 	':ediau' => "$edaul"
			// ));
			echo $edificios[$i][1].'-'.$j.$b;
		}
	}


	// foreach ($edificios as $edif) {
	// 	echo "edificio: ".$edif['nombre'].'<br>';
	//
	// 	for ($j=1; $j <3 ; $j++) {
	// 		$edaul = $edif['id'].'-'.$j;
	// 		$edaul2 = $edif['id'].'-'.$j.'<br>';
	// 		$stat->execute(array(
	// 			':edi' => "$edif",
	// 			':nume' => "$j",
	// 			':ediau' => "$edaul"
	// 		));
	// 		echo $edaul2;
	// 	}
	// 	echo '<br>';
	// }


	$title = '';

	// echo $twig->render('',compact('title'));
?>

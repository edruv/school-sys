<?php
	require_once 'config.php';
	require_once 'functions.php';

	$carrera = $_GET['tyca'];
	(!empty($_GET['ofcl'])) ? $clave = $_GET['ofcl'] : null ;
	(!empty($_GET['ofmat'])) ? $materia = $_GET['ofmat'] : null ;

	$sqlprimary = "SELECT sec.id, mat.id clave, mat.nombre materia, sec.namsec, sec.cupo, sec.disp, DATE_FORMAT(sec.hra_ini,'%H:%i') hra_ini, DATE_FORMAT(sec.hra_fin,'%H:%i') hra_fin, sec.dias, ed.nombre edif, au.num aula, DATE_FORMAT(sec.f_ini,'%d/%m/%y') f_ini, DATE_FORMAT(sec.f_fin,'%d/%m/%y') f_fin, us.nombre, us.ap1, us.ap2 from seccion sec
	inner join materia mat on mat.id=sec.materia
	inner join empleado emp on emp.id=sec.maestro
	inner join user us on us.id=emp.id_user
	inner join aula au on au.edau=sec.aula
	inner join edif ed on ed.id=au.edif
	where mat.carrera=:id ";
	$sqlike = " and mat.nombre LIKE '%$materia%' ";
	$sqlcl = " and mat.id=:clave";
	$sqlorder = " order by mat.nombre asc, sec.hra_ini asc";

	if (isset($clave) || isset($materia)) {
		if (isset($clave) && !isset($materia)) {
			$stat = $conn->prepare($sqlprimary.$sqlcl.$sqlorder);
			$stat->execute(array(':id' => "$carrera", ':clave' => "$clave"));
		}
		if (isset($materia) && !isset($clave)) {
			$stat = $conn->prepare($sqlprimary.$sqlike.$sqlorder);
			$stat->execute(array(':id' => "$carrera"));
		}
		if (isset($clave) && isset($materia)) {
			$stat = $conn->prepare($sqlprimary.$sqlike.$sqlcl.$sqlorder);
			$stat->execute(array(':id' => "$carrera",
				':clave' => "$clave"
			));
		}
	}	else {
		$stat = $conn->prepare($sqlprimary.$sqlorder);
		$stat->execute(array(':id' => "$carrera"));
	}

	$offer = $stat->fetchAll(PDO::FETCH_ASSOC);

	for ($i=0; $i < count($offer) ; $i++) {
		$dtmp = explode(',', $offer[$i]['dias']);
		$dtmp = implode(', ',$dtmp);
		$offer[$i]['dias'] = $dtmp;
	}

	$title = 'oferta academica';

	echo $twig->render('offer.twig',compact('title','offer'));
?>

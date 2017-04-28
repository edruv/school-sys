<?php
	require_once 'config.php';
	require_once 'functions.php';

	$title = 'cambio de contraseña';

	if (isset($_POST['adca'])) {
		$ps = trim($_POST['nps']);
		$psc = trim($_POST['npsc']);
		$messa = array();

		if ($ps == $psc) {
			$psc = $ps;
			$ps = sha1($ps);
			$stat = $conn->prepare('UPDATE user set
				pass = :pass
			where id=:id');
			$upps = $stat->execute(array(':pass'=>"$ps",':id'=>$user['id']));

			if ($upps) {
				$stat = $conn->prepare('UPDATE pass set
					pass = :pass
				where id_us=:id');
				$stat->execute(array(':pass'=>"$psc",':id'->$user['id']));
				$messa = [
					'type' => 'success',
					'message' => 'contraseña cambiada exitosamente',
					'icon' => 'check-circle'
				];
			}
		}
	}

	echo $twig->render('pass.twig',compact('title','user','messa'));
?>

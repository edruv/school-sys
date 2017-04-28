<?php
	require_once 'config.php';
	require_once 'functions.php';

	$title= 'ver edificios';

	$statement = $conn->prepare('select * from edif');
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);


	print_r($result);


	// $items = array();
	//
	// foreach ($result as $xx) {
	// 	$items[] = $xx;
	// }
  // docs = $result->FetchAll(PDO::FETCH_ASSOC);
  //
  // $items = array();
  // foreach ($docs as $doc){
  //   $items[] = $doc;
  // }
  //
  // $app->render('portfolio.twig', array('items' => $items) );

	echo $twig->render('edifs_view.twig',compact('title','result'));
?>

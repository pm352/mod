<?php
require_once 'inc/config.php';


$sql = '
	SELECT mov_id, mov_title, mov_synopsis, mov_poster
	FROM movies
';

$stmt = $pdo->query($sql);

if (!$stmt->execute()) {
	print_r($stmt->errorInfo());
}
else {
	$mvliste = $stmt->fetchAll(PDO::FETCH_ASSOC);
	//$maxpage = intval(count(?????));
	//echo "Pages extra: $maxpage";
	var_dump($mvliste);
}

//VIEWS
include_once 'views/header.php';
include_once 'views/catalogView.php';
include_once 'views/footer.php';

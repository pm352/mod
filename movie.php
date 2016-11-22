<?php

include_once 'inc/config.php';

$movId = isset($_GET['id'])? intval($_GET['id']) : 0;

$sql = '
SELECT *
FROM movies 
LEFT OUTER JOIN movies_has_actors ON movies_has_actors.movies_mov_id = movies.mov_description
LEFT OUTER JOIN actors ON actors.act_id = movies_has_actors.actors_act_id
LEFT OUTER JOIN category ON category.cat_id = movies.category_cat_id
LEFT OUTER JOIN type_stockage ON type_stockage.typ_id = movies.type_stockage_typ_id
WHERE mov_id = :movId';

$sth = $pdo->prepare($sql);
$sth->bindValue(':movId', $movId, PDO::PARAM_INT);

if($sth->execute()){
	$donnees = $sth->fetchAll(PDO::FETCH_ASSOC);
}else{
	print_r($pdo->errorInfo());
}

// VIEW
include 'views/header.php';
include 'views/movieView.php';
include 'views/footer.php';
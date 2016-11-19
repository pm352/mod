<?php
require_once 'inc/config.php';
require_once 'inc/functions.php';


$sql='
	SELECT mov_title, mov_poster, mov_file, cat_name, act_name , mov_adDate
	FROM movies
	LEFT JOIN category ON category.cat_id = movies.category_cat_id
	LEFT JOIN movies_has_actors ON movies_has_actors.movies_mov_id = movies.mov_id
	LEFT JOIN actors ON actors.act_id = movies_has_actors.actors_act_id
	
	';

//Exécution de ma requete SELECT
$pdoStatement = $pdo->query($sql);

//je récupère toutes les données
$moviesData = $pdoStatement->fetchAll();
print_r($moviesData);

// VIEW
require 'views/header.php';
require 'views/indexView.php';
require 'views/footer.php';

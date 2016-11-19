<?php
require_once 'inc/config.php';
require_once 'inc/functions.php';


////////////////////////////////////////////
//requette les categories et le nombre de film par categories
$sql='
	SELECT cat_name, count(mov_id) AS nb_film
	FROM movies
	LEFT JOIN category ON category.cat_id = movies.category_cat_id
	GROUP BY cat_name
	ORDER BY nb_film DESC
	LIMIT 4
	';

//Exécution de ma requete SELECT
$pdoStatement = $pdo->query($sql);

//je récupère toutes les données
$catResultCount = $pdoStatement->fetchAll();
//print_r($catResultCount);


////////////////////////////////////////////////////////////////////
//requette pour recupérer posters, titre film des 4 derniers ajouts
$sql='
	SELECT mov_title, mov_poster, mov_adDate, mov_id
	FROM movies
	ORDER BY mov_adDate DESC
	LIMIT 4
	';

//Exécution de ma requete SELECT
$pdoStatement = $pdo->query($sql);

//je récupère les données
$moviesData = $pdoStatement->fetchAll();
//print_r($moviesData);


///////////////////////
// Affichage des views
require 'views/header.php';
require 'views/indexView.php';
require 'views/footer.php';

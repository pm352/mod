<?php
require_once 'inc/config.php';
require_once 'inc/functions.php';


/////////////////////////////////////////
//requette pour recupérer les categories
$sql='
	SELECT cat_name
	FROM category
	LIMIT 4
	';

//Exécution de ma requete SELECT
$pdoStatement = $pdo->query($sql);

//je récupère les données
$catResult = $pdoStatement->fetchAll();
//print_r($catResult);


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

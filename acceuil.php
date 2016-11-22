<?php
require_once 'inc/config.php';
require_once 'inc/functions.php';


$catResultCount = catPlusCount();

$moviesData = recupPosterTitle();


/////////////////////////////////////////////
// barre de recherche - Mettre s= dans l'url
$search="";
$search=isset($_GET['s']) ? trim($_GET['s']):'';
if (!empty($search)) {
	//requette pour la recherche
	$sql='
		SELECT mov_id, mov_title, mov_synopsis, mov_description, mov_file, cat_name, act_name
		FROM movies
		LEFT JOIN category ON category.cat_id = movies.category_cat_id
		LEFT JOIN movies_has_actors ON movies_has_actors.movies_mov_id = movies.mov_id
		LEFT JOIN actors ON actors.act_id = movies_has_actors.actors_act_id
		WHERE mov_title LIKE :search
		OR 	  mov_synopsis LIKE :search
		OR 	  mov_file LIKE :search
		OR 	  mov_description LIKE :search
		OR 	  cat_name LIKE :search
		OR 	  act_name LIKE :search
		';
}

//Exécution de ma requete SELECT
$pdoStatement = $pdo->prepare($sql);

//bindvalue pour la barre de recherche
if (!empty($search)) {
$pdoStatement->bindValue(':search', '%'.$search.'%', PDO::PARAM_INT);
}

//si erreur
if ($pdoStatement->execute() === false){
	print_r($pdo->errorInfo());
}
//sinon, je récupère les données
else{
	//je récupère toutes les données
	$movieResult = $pdoStatement->fetchAll();
	//print_r($movieResult);
}



///////////////////////
// Affichage des views
require 'views/header.php';
require 'views/acceuilView.php';
require 'views/footer.php';

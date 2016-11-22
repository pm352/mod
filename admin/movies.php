<?php
include_once '../inc/config.php';

$moviesListe = array();

$typStockageListe = array(
	1 => 'HDD',
	2 => 'USB',
	3 => 'PC'
);

$actorListe = array(
	1 => 'Simon Pegg',
	2 => 'Nick Frost',
	3 => 'Leonardo DiCaprio',
	4 => 'Disney'
);

$categorieListe = array(
	1 => 'Action',
	2 => 'Animation',
	3 => 'Comedy',
	4 => 'Aventure',
	5 => 'Science-fiction',
	6 => 'Biographie'
);

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;


if($id){
	$sql = "
		SELECT *
		FROM movies 
		LEFT OUTER JOIN movies_has_actors ON movies_has_actors.movies_mov_id = movies.mov_description
		LEFT OUTER JOIN actors ON actors.act_id = movies_has_actors.actors_act_id
		LEFT OUTER JOIN category ON category.cat_id = movies.category_cat_id
		LEFT OUTER JOIN type_stockage ON type_stockage.typ_id = movies.type_stockage_typ_id
		WHERE mov_id = ".$id;

	$pdoStatement = $pdo -> query($sql);
	if($pdoStatement === false){
		print_r($pdo->errorInfo());
	} else {
		$moviesListe = $pdoStatement->fetch();
	}

	$movieTitre = $moviesListe['mov_title'];
	$movieDescription = $moviesListe['mov_description'];
	$movieFile = $moviesListe['mov_file'];
	$movieCategorie = $moviesListe['cat_id'];
	$movieActeurs = $moviesListe['act_id'];
	$movieSupport = $moviesListe['typ_id'];
	$movieSortie = $moviesListe['mov_adDate'];

	$sql = "
	UPDATE movies 
	SET mov_title = :title, mov_description = :description, mov_file = :file, cat_id = :idCategorie, act_id = :idActeurs, typ_id = :idStockage, mov_adDate = :adDate  
	WHERE mov_id = ".$id;
	echo "Je vous ai modifié dans ma base de données
	";

	$pdoStatement = $pdo->prepare($sql);

	$pdoStatement = bindValue(':title', $movieTitre);
	$pdoStatement = bindValue(':description', $movieDescription);
	$pdoStatement = bindValue(':file', $moveFile);
	$pdoStatement = bindValue(':idCategorie', $movieCategorie);
	$pdoStatement = bindValue(':idActeurs', $movieActeurs);
	$pdoStatement = bindValue(':idStockage', $movieSupport);
	$pdoStatement = bindValue(':adDate', $movieSortie);

	if(!$pdoStatement->execute()){
		print_r($pdo->errorInfo());
	} else {
		$resultat = $pdoStatement->fetchAll();
	}
}

$formOk= true;
if(!empty($_POST)){

	$titre = isset($_POST['titre']) ? trim($_POST['titre']) : '';
	//$file = isset($_FILES['file']) ? $_FILES['file'] : '';
	$catId = isset($_POST['catId']) && is_numeric($_POST['catId'])? $_POST['catId'] : '';
	$actId = isset($_POST['actId']) && is_numeric($_POST['actId'])? $_POST['actId'] : '';
	$typId = isset($_POST['typId']) && is_numeric($_POST['typId']) ? $_POST['typId'] : '';
	$description = isset($_POST['description']) ? trim($_POST['description']) : '';
	$sortie = isset($_POST['sortie']) ? intval($_POST['sortie']) : '';

	if(strlen($titre) < 1){
		echo "Il faut remplir le champ titre";
		$formOk = false;
	}
	if(sizeof($_FILES) > 0){
		$image = $_FILES['file'];
		$tmp = explode ('.', $image['name']);
		$extension = end($tmp);
		if(move_uploaded_file($image['tmp_name'], '../assets/img.'.$extension)){
			echo "fichier téléversé<br/>";
		} else {
			echo "erreur dans le téléversement<br/>";
			$formOk = false;
		}
	}

	if($actId == 0){
		echo "Il faut remplir l'acteur";
		$formOk = false;
	}

	if($catId == 0){
		echo "Il faut remplir la catégorie";
		$formOk = false;
	}

	if($typId == 0){
		echo "Il faut remplir le type de stockage";
		$formOk = false;
	}

	if(strlen($description) < 10){
		echo "Il faut inscrire au moins 10 mots";
		$formOk = false;
	}

	if($sortie == 0){
		echo "Il faut inscire une date de sortie";
		$formOk = false;
	}

	if($formOk){
		$sql = "INSERT INTO movies ( mov_title, mov_file, category_cat_id, type_stockage_typ_id, mov_description, mov_release_date) VALUES (:title, :file, :catName, :typId, :description, :sortie)";

		$stmt = $pdo->prepare($sql);

		$stmt->bindValue(':title', $titre);
		$stmt->bindValue(':file', $file);
		$stmt->bindValue(':catName', $catId);
		//$stmt->bindValue(':actName', $actName);
		$stmt->bindValue(':typId', $typId);
		$stmt->bindValue(':description', $description);
		$stmt->bindValue(':sortie', $sortie);

		if(!$stmt->execute()){
			print_r($pdo->errorInfo());
			if(sizeof($_FILES) > 0){
				$image = $_FILES['file'];
				$tmp = explode ('.', $image['name']);
				$extension = end($tmp);
				if(move_uploaded_file($image['tmp_name'], '../assets/img/img.'.$id.$extension)){
					echo "fichier téléversé<br/>";
				} else {
					echo "erreur dans le téléversement<br/>";
					$formOk = false;
				}
			}
		}
	}
}

//views

include '../views/headerMovies.php';
include '../views/admin/moviesView.php';
include '../views/footerMovies.php';
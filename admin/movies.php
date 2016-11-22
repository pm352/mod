<?php
include '../inc/config.php';

$typStockageListe = array(
	1 => 'HDD',
	2 => 'USB',
	3 => 'PC'
);

$actorListe = array(
	1 => 'Simon Pegg',
	2 => 'Nick Frost',
	3 => 'Leonardo DiCaprio'
);

$categorieListe = array(
	1 => 'Action',
	2 => 'Animation',
	3 => 'Comedy',
	4 => 'Aventure',
	5 => 'Science-fiction',
	6 => 'Biographie'
);

$formOk= true;
if(!empty($_POST)){

	$titre = isset($_POST['titre']) ? trim($_POST['titre']) : '';
	$file = isset($_POST['file']) ? trim($_POST['file']) : '';
	$catId = isset($_POST['catId']) && is_numeric($_POST['catId'])? $_POST['catId'] : '';
	$actId = isset($_POST['actId']) && is_numeric($_POST['actId'])? $_POST['actId'] : '';
	$typId = isset($_POST['typId']) && is_numeric($_POST['typId']) ? $_POST['typId'] : '';
	$description = isset($_POST['description']) ? trim($_POST['description']) : '';
	$sortie = isset($_POST['sortie']) ? intval($_POST['sortie']) : '';


	if($formOk){
		$sql = "INSERT INTO movies ( mov_title, mov_file, cat_name, act_name, typ_id, mov_description, mov_release_date) VALUES (:title, :file, :catName, :actName, :typId, :description, :sortie)";

		$stmt = $pdo->prepare($sql);

		$stmt->bindValue(':title', $titre);
		$stmt->bindValue(':file', $file);
		$stmt->bindValue(':catName', $catName);
		$stmt->bindValue(':actName', $actName);
		$stmt->bindValue(':typId', $typId);
		$stmt->bindValue(':description', $description);
		$stmt->bindValue(':sortie', $sortie);

		if(!$stmt->execute()){
			print_r($pdo->errorInfo());
		}
	}
}

//views
include '../views/headerMovies.php';
include '../views/admin/moviesView.php';
include '../views/footer.php';
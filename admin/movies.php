<?php
include '../inc/config.php';

$formOk= true;
if(!empty($_POST)){

	$titre = isset($_POST['titre']) ? trim($_POST['titre']) : '';
	$file = isset($_POST['file']) ? trim($_POST['file']) : '';
	$catName = isset($_POST['catName']) ? trim($_POST['catName']) : '';
	$actName = isset($_POST['actName']) ? trim($_POST['actName']) : '';
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
//include '../views/header.php';
include '../views/admin/moviesView.php';
include '../views/footer.php';
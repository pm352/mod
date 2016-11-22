<?php
include '../inc/config.php';

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

//views
include '../views/header.php';
include '../views/admin/moviesView.php';
include '../views/footer.php';
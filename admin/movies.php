<?php
include '../inc/config.php';

$sql = "INSERT INTO movies ( mov_title, mov_file, cat_name, act_name, typ_id, mov_description, mov_release_date) VALUES (:title, :file, :catName, :actName, :typId, :description, :sortie)";

$stmt = $pdo->prepare($sql);

$stmt->bidnValue(':title', $titre);
$stmt->bidnValue(':file', $file);
$stmt->bidnValue(':catName', $catName);
$stmt->bidnValue(':actName', $actName);
$stmt->bidnValue(':typId', $typId);
$stmt->bidnValue(':description', $description);
$stmt->bidnValue(':sortie', $sortie);

if(!$stmt->execute()){
	print_r($pdo->errorInfo());
}

//views
include '../views/header.php';
include '../views/admin/moviesView.php';
include '../views/footer.php';
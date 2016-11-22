<?php

// J'inclus le fichier avec les paramètres
require_once 'config.php';


$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$offset = ($page -1) * 3;


$triDate = isset($_POST['tri_date']) ? htmlentities($_POST['tri_date']) : '';


// Crée une fonction avec la requête pour affichage des films dans 'Catalog'
function dp_sqlShowCatalog() {
    // Déclare l'accès aux variables endehors de la fonction
    global $pdo;
    global $offset;
    global $triDate;
    // Requête pour affichage des films dans 'Catalog'
    $sql = "
	SELECT mov_id AS ID, mov_title AS title, SUBSTRING_INDEX(mov_synopsis, ' ', 20) AS synopsis, mov_poster AS affiche
    FROM movies
    LIMIT $offset, 3
    ";

    $stmt = $pdo->query($sql);

    if (!$stmt->execute()) {
        print_r($stmt->errorInfo());
    }
    else {
        $mvliste = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $mvliste;
}


// Le nombre de pages pour la pagination
function nbPages() {
    global $pdo;
    $sql='
    SELECT COUNT(*)
    FROM movies
    ';
    
    $stmt = $pdo->query($sql);
    
    if (!$stmt->execute()) {
        print_r($stmt->errorInfo());
    }
    else {
        $nbrPages = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    return $nbrPages;
}

<?php

// Crée une fonction avec la requête pour affichage des films dans 'Catalog'
function dp_sqlShowCatalog() {
    // Déclare l'accès aux variables endehors de la fonction
    global $pdo;
    global $offset;
    global $triDate;
    global $cat;

    // Requête pour affichage des films dans 'Catalog'
    $sql = "
	SELECT mov_id AS ID, mov_title AS title, SUBSTRING_INDEX(mov_synopsis, ' ', 20) AS synopsis, mov_poster AS affiche, mov_release_date AS RelDate, cat_name
    FROM movies
    LEFT JOIN category ON category.cat_id = movies.category_cat_id
    ";

    if ($cat !== "") {
        $sql .= "WHERE cat_name = '$cat'
                ORDER BY mov_id
        ";
    }
    
    if (!$triDate == "") {
        $sql .= "ORDER BY RelDate $triDate";
    
    }
    
    $sql .= " LIMIT $offset, 3";
    
    
    $stmt = $pdo->query($sql);
    
    if (!$stmt) {
        print_r($pdo->errorInfo());
    }
    else {
        $mvliste = $stmt->fetchAll(PDO::FETCH_ASSOC);
    var_dump($mvliste);
    }
    return $mvliste;
}


// Le nombre de pages pour la pagination
function nbPages() {
    global $pdo;
    global $cat;
    
    $sql='
    SELECT COUNT(*)
    FROM movies
    ';
    
    if ($cat !== "") {
        $sql .= "WHERE cat_name = '$cat'
        ";
    }
    
    $stmt = $pdo->query($sql);
    
    if (!$stmt) {
        print_r($pdo->errorInfo());
    }
    else {
        $nbrPages = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    return $nbrPages;
}

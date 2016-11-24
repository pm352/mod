<?php

// Crée une fonction avec la requête pour affichage des films dans 'Catalog'
function dp_sqlShowCatalog() {
    // Déclare l'accès aux variables endehors de la fonction
    global $pdo;
    global $offset;
    global $triDate;
    
    print_r("habibi : " .$triDate);

    // Requête pour affichage des films dans 'Catalog'
    $sql = "
	SELECT mov_id AS ID, mov_title AS title, SUBSTRING_INDEX(mov_synopsis, ' ', 20) AS synopsis, mov_poster AS affiche, mov_release_date AS RelDate
    FROM movies
    ";

    echo "Hei<br />";
    if (!$triDate == "") {
        $sql .= "ORDER BY RelDate $triDate";
    var_dump("HEIHIN : $triDate <br />");
    }
    echo "Hei 2<br />";
    $sql .= " LIMIT $offset, 3";
    
    echo "Hei 3<br />";
    $stmt = $pdo->query($sql);

    echo "Hei 4<br />";
    if (!$stmt) {
        print_r($pdo->errorInfo());
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

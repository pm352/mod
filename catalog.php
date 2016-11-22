<?php
require_once 'inc/config.php';
require_once 'inc/functions.php';

$dp_sqlShowCatalog = dp_sqlShowCatalog();
$nbPages = nbPages();
$resultat = ceil(intval($nbPages['COUNT(*)']) / 3);

//VIEWS
include_once 'views/header.php';
include_once 'views/catalogView.php';
include_once 'views/footer.php';

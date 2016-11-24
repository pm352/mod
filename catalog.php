<?php
require_once 'inc/config.php';
require_once 'inc/functions.php';


$page = isset($_GET['page']) ? intval($_GET['page']) : 1;


$offset = ($page -1) * 3;
$triDate = isset($_GET['tri']) ? trim(htmlentities($_GET['tri'])) : '';


$dp_sqlShowCatalog = dp_sqlShowCatalog();

var_dump($triDate);

// Calcul des pages
$nbPages = nbPages();
$pages = ceil(intval($nbPages['COUNT(*)']) / 3);

//VIEWS
include_once 'views/header.php';
include_once 'views/catalogView.php';
include_once 'views/footer.php';

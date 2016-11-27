<?php
require_once 'inc/config.php';
require_once 'inc/functions.php';


$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$cat = isset($_GET['cat']) ? trim(htmlentities($_GET['cat'])) : '';
$triDate = isset($_GET['tri']) ? trim(htmlentities($_GET['tri'])) : '';

$offset = ($page -1) * 3;

$dp_sqlShowCatalog = dp_sqlShowCatalog();

// Calcul des pages
$nbPages = nbPages();
$pages = ceil(intval($nbPages['COUNT(*)']) / 3);


//VIEWS
include_once 'views/header.php';
include_once 'views/catalogView.php';
include_once 'views/footer.php';

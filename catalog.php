<?php
require_once 'inc/config.php';
require_once 'inc/functions.php';


$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$triDate = isset($_POST['tri_date']) ? htmlentities($_POST['tri_date']) : '';

$offset = ($page -1) * 3;
$dp_sqlShowCatalog = dp_sqlShowCatalog();
$nbPages = nbPages();
$resultat = ceil(intval($nbPages['COUNT(*)']) / 3);

//VIEWS
include_once 'views/header.php';
include_once 'views/catalogView.php';
include_once 'views/footer.php';

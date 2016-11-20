<?php
require 'inc/config.php';

// J'initialise les variables
$emailMod = '';
$errorList= array();

// Formulaire soumis
if (!empty($_POST)) {
	print_r($_POST);
	
	$emailMod = isset($_POST['emailMod']) ? trim($_POST['emailMod']) : '';
	$passwordMod1 = isset($_POST['passwordMod1']) ? trim($_POST['passwordMod1']) : '';
	$passwordMod2 = isset($_POST['passwordMod2']) ? trim($_POST['passwordMod2']) : '';

	$formOk = true;
	if ($passwordMod1 != $passwordMod2) {
		$errorList[]= 'Le mot de passe n\'est pas identique<br>';
		$formOk = false;
	}
	if (strlen($passwordMod1) < 4) {
		$errorList[]= 'Le password doit contenir au moins 4 caractères<br>';
		$formOk = false;
	}
	if (empty($emailMod)) {
		$errorList[]= 'Email est vide<br>';
		$formOk = false;
	}
	else if (!filter_var($emailMod, FILTER_VALIDATE_EMAIL)) {
		$errorList[]= 'Email invalide<br>';
		$formOk = false;
	}

	if ($formOk) {

		$sql = '
			INSERT INTO user (usr_email, usr_password) VALUES (:email, :password)
		';
		$pdoStatement = $pdo->prepare($sql);
		$pdoStatement->bindValue(':email', $emailMod);
		$pdoStatement->bindValue(':password', password_hash($passwordMod1, PASSWORD_BCRYPT)); // password_hash

		if ($pdoStatement->execute() === false) {
			print_r($pdoStatement->errorInfo());
		}
		else {
			$resultat = $pdoStatement->fetchAll();
			header('Location: index.php');
		}
	}

}

?>
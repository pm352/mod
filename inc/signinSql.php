<?php
require_once dirname(__FILE__).'/config.php';
// Formulaire soumis
if (!empty($_POST)) {
	$emailLogMod = isset($_POST['emailLogMod']) ? trim($_POST['emailLogMod']) : '';
	$passwordLogMod = isset($_POST['passwordLogMod']) ? trim($_POST['passwordLogMod']) : '';

	$formOk = true;
	if (strlen($passwordLogMod) < 4) {
		echo 'Le password doit contenir au moins 4 caractères<br>';
		$formOk = false;
	}
	if (empty($emailLogMod)) {
		echo 'Email est vide<br>';
		$formOk = false;
	}
	else if (!filter_var($emailLogMod, FILTER_VALIDATE_EMAIL)) {
		echo 'Email invalide<br>';
		$formOk = false;
	}

	if ($formOk) {
		$sql = '
			SELECT *
			FROM user
			WHERE usr_email = :email
			LIMIT 1
		';
		$pdoStatement = $pdo->prepare($sql);
		$pdoStatement->bindValue(':email', $emailLogMod);

		if ($pdoStatement->execute() === false) {
			print_r($pdoStatement->errorInfo());
		}
		else {
			if ($pdoStatement->rowCount() > 0) {
				$resList = $pdoStatement->fetch();
				$hashedPassword = $resList['usr_password'];

				// Je vérifie le mot de passe
				if (password_verify($passwordLogMod, $hashedPassword)) {
					echo 'login ok<br>';
					$_SESSION['userId'] = $resList['usr_id'];
					echo($resList['usr_id']);
					header('Location: acceuil.php');
				}
				else {
					echo 'bad password or login<br>';
				}
			}
			else {
				echo 'email not known<br>';
			}
		}
	}
}

?></pre>
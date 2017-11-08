<?php
session_start();
require __DIR__.'/../inc/config.php';



// RECUPERATION DE MDP

// Initialisations
$nomConnection = '';

// Si formulaire soumis
if (!empty($_POST)) {
	//print_r($_POST);
	// Je récupère les données
	$nomConnection = isset($_POST['nomConnection']) ? $_POST['nomConnection'] : '';
	// Traiter les données
	$nomConnection = trim(strip_tags($nomConnection));
	// Validation des données
	$emailOk = true;
	if (filter_var($nomConnection, FILTER_VALIDATE_EMAIL) === false) {
		echo 'email incorrect<br>';
		$signinOk = false;
	}
	// Si aucune erreur
	if ($emailOk){
		$compteUser= 'SELECT usr_email, usr_id, usr_password,usr_role  FROM users WHERE usr_email = :usr_email';
		$pdoStatement = $pdo->prepare($compteUser);
		$pdoStatement ->bindValue(':usr_email', $nomConnection);
		$result = $pdoStatement->execute();
		$email = $pdoStatement->fetch(PDO::FETCH_ASSOC);
		print_r ($email);


    } else {
		echo 'Pas de compte associé à cet adresse email';
	}
}


require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/pwdforget.php';
require_once __DIR__.'/../view/footer.php';

?>

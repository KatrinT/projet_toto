<?php
session_start();
require __DIR__.'/../inc/config.php';


// Initialisations
$nomConnection = '';
$passwordConnection = '';

// Si formulaire soumis
if (!empty($_POST)) {
	//print_r($_POST);
	// Je récupère les données
	$nomConnection = isset($_POST['nomConnection']) ? $_POST['nomConnection'] : '';
	$passwordConnection = isset($_POST['passwordConnection']) ? $_POST['passwordConnection'] : '';
	// Traiter les données
	$nomConnection = trim(strip_tags($nomConnection));
	$passwordConnection = trim(strip_tags($passwordConnection));
	// Validation des données
	$signinOk = true;
	if (empty($nomConnection)) {
		echo 'email vide<br>';
		$signinOk = false;
	}
	else if (filter_var($nomConnection, FILTER_VALIDATE_EMAIL) === false) {
		echo 'email incorrect<br>';
		$signinOk = false;
	}

	// Si aucune erreur
	if ($signinOk){
		$compteUser= 'SELECT usr_email, usr_id, usr_password,usr_role  FROM users WHERE usr_email = :usr_email';
		$pdoStatement = $pdo->prepare($compteUser);
		$pdoStatement ->bindValue(':usr_email', $nomConnection);
		$result = $pdoStatement->execute();

		//récuperation du tableau correspondant à mon select (1 ligne)
		$password = $pdoStatement->fetch(PDO::FETCH_ASSOC);
		//print_r ($password);

	//afficher IP et ID

	//pour verifier les infos recupérées : var_dump ($passwordConnection);
	//var_dump ($password['usr_password']);

		if (password_verify($passwordConnection, $password['usr_password'])) {
			//echo 'Le mot de passe est valide !';
		} else {
			echo 'Le mot de passe est invalide.';
		}

		//recuperer l'ip
		$ip= ($_SERVER['REMOTE_ADDR']);
		//echo '<br>Felicitation!!! Vous etes connecté ! <br> Votre id est '.$password['usr_id'].'. Votre ip est '.$ip.'. <br>';

		//SESSIONS
		$_SESSION['id'] = $password['usr_id'];
		$_SESSION['ip'] = $ip;
		$_SESSION['role'] = $password['usr_role'];
		//print_r($_SESSION);
		//echo 'Votre id est '.$password['usr_id'] '.'.'
    } else {
		echo 'Pas de compte associé à cet adresse email';
	}
}

// RECUPERATION DE MDP

// Initialisations
$passwordConnection = '';

// Si formulaire soumis
if (!empty($_POST)) {
	//print_r($_POST);
	// Je récupère les données
	$passwordConnection = isset($_POST['passwordConnection']) ? $_POST['passwordConnection'] : '';
	// Traiter les données
	$passwordConnection = trim(strip_tags($passwordConnection));
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
require_once __DIR__.'/../view/signin.php';
require_once __DIR__.'/../view/footer.php';

?>

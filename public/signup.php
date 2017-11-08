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
	$passwordOk = isset($_POST['passwordOk']) ? $_POST['passwordOk'] : '';
	// Traiter les données
	$nomConnection = trim(strip_tags($nomConnection));;
	$passwordConnection = trim(strip_tags($passwordConnection));
	$passwordOk = trim(strip_tags($passwordConnection));
	// Validation des données
	$formOk = true;
	if (empty($nomConnection)) {
		echo 'email vide<br>';
		$formOk = false;
	}
	else if (filter_var($nomConnection, FILTER_VALIDATE_EMAIL) === false) {
		echo 'email incorrect<br>';
		$formOk = false;
	}
	if (empty($passwordConnection)) {
		echo 'password vide<br>';
		$formOk = false;
	}
	else if (strlen($passwordConnection) <= 8) {
		echo 'Password est trop court<br>';
		$formOk = false;
	}
	if (empty($passwordOk)) {
		echo 'Password vide<br>';
		$formOk = false;
	}
	else if (strlen($passwordOk) <= 8 && $passwordOk === $passwordConnection) {
		echo 'La confirmation de password ne correspond pas au password initial<br>';
		$formOk = false;
	}

	// Si aucune erreur
	if ($formOk) {

		//fait appel à ma fonction emailexists dans le fichier functions.php
		$doublon = emailExists($nomConnection);
		//condition pour valider ou non l'existance de l'email - selon le résultat de ma variable (true ou false)

		if ($doublon){
			echo 'mails existe déja';
		} else {
			$passCrypt= password_hash($passwordConnection, PASSWORD_BCRYPT);
	        $sql = 'INSERT INTO users (usr_email, usr_password, usr_role)
	        VALUES (:nomConnection, :passwordConnection, :userole)';
	        //attention si on fait appel a plusieurs table il faut utiliser les foreign key (ci-dessous)
	        // Je prépare ma requête, mais ne l'exécute pas encore
	        $pdoStatement = $pdo->prepare($sql);
	        // Je donne des valeurs à chaque "jeton" ou "token" (=> :jeton)
	        $pdoStatement->bindValue(':nomConnection', $nomConnection, PDO::PARAM_STR);
	        $pdoStatement->bindValue(':passwordConnection', $passCrypt, PDO::PARAM_INT);
			$pdoStatement->bindValue(':userole', 'user', PDO::PARAM_INT);
	        // J'exécute la requête préparée
	        $creationCompte = $pdoStatement->execute();
			echo 'Votre compte a bien été créé! <br>';

	        // Si erreur
	        if ($creationCompte === false) {
	        	// sur $pdoStatement car c'est une requête préparée
	        	//print_r($pdoStatement->errorInfo());
	        	exit;
	    	}
		}
    }
}
require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/signup.php';
require_once __DIR__.'/../view/footer.php';

?>

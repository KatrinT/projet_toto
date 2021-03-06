<?php
// uniquement le traitement de mon ajout via le formulaire

require __DIR__.'/../../inc/config.php';
//important pour obtenir le lien à la bd

session_start();


if(isset($_SESSION['id']) && $_SESSION['role'] === 'user'){
	header("Location: 403.php");
	exit;

} else if (!isset($_SESSION['id'])){

}

// Initialisations
$lastnameToto = '';
$firstnameToto = '';
$dateBToto ='';
$emailToto ='';
$sympathieToto ='';
$sessionToto ='';
$villeToto ='';

// Si formulaire soumis
if (!empty($_POST)) {
	//print_r($_POST);
	// Je récupère les données
	$lastnameToto = isset($_POST['lastnameToto']) ? $_POST['lastnameToto'] : '';
	$firstnameToto = isset($_POST['firstnameToto']) ? $_POST['firstnameToto'] : '';
	$emailToto = isset($_POST['emailToto']) ? $_POST['emailToto'] : '';
	$dateBToto = isset($_POST['dateBToto']) ? $_POST['dateBToto'] : '';
	$sympathieToto = isset($_POST['sympathieToto']) ? $_POST['sympathieToto'] : '';
	$sessionToto = isset($_POST['sessionToto']) ? $_POST['sessionToto'] : '';
	$villeToto = isset($_POST['villeToto']) ? $_POST['villeToto'] : '';
	// Traiter les données
	$lastnameToto = strtoupper(trim(strip_tags($lastnameToto)));
	$firstnameToto = ucfirst(trim(strip_tags($firstnameToto)));
	$emailToto = trim(strip_tags($emailToto));
	$dateBToto = trim(strip_tags($dateBToto));
	// Validation des données
	$formOk = true;
	if (empty($lastnameToto)) {
		echo 'Nom vide<br>';
		$formOk = false;
	}
	else if (strlen($lastnameToto) < 3) {
		echo 'Nom incorrect<br>';
		$formOk = false;
	}
	if (empty($firstnameToto)) {
		echo 'Prénom vide<br>';
		$formOk = false;
	}
	else if (strlen($firstnameToto) < 3) {
		echo 'Prénom incorrect<br>';
		$formOk = false;
	}
	if (empty($emailToto)) {
		echo 'email vide<br>';
		$formOk = false;
	}
	else if (filter_var($emailToto, FILTER_VALIDATE_EMAIL)=== false) {
		echo 'email incorrect<br>';
		$formOk = false;
	}
	if (empty($dateBToto)) {
		echo 'Date vide<br>';
		$formOk = false;
	}

	// Si aucune erreur
	if ($formOk) {
        $sql = 'INSERT INTO student (stu_lastname, stu_firstname, stu_email, stu_birthdate, stu_friendliness, session_ses_id, city_cit_id)
        VALUES (:lastnameToto, :firstnameToto, :emailToto, :dateBToto, :sympathieToto, :sessionToto, :villeToto)';
        //attention si on fait appel a plusieurs table il faut utiliser les foreign key (ci-dessous)
        // Je prépare ma requête, mais ne l'exécute pas encore
        $pdoStatement = $pdo->prepare($sql);
        // Je donne des valeurs à chaque "jeton" ou "token" (=> :jeton)
        $pdoStatement->bindValue(':firstnameToto', $_POST['firstnameToto'], PDO::PARAM_INT);
        $pdoStatement->bindValue(':lastnameToto', $_POST['lastnameToto'], PDO::PARAM_INT);
		$pdoStatement->bindValue(':emailToto', $_POST['emailToto'], PDO::PARAM_INT);
		$pdoStatement->bindValue(':dateBToto', $_POST['dateBToto'], PDO::PARAM_INT);
		$pdoStatement->bindValue(':sympathieToto', $_POST['sympathieToto'], PDO::PARAM_INT);
		$pdoStatement->bindValue(':sessionToto', $_POST['sessionToto'], PDO::PARAM_INT);
		$pdoStatement->bindValue(':villeToto', $_POST['villeToto'], PDO::PARAM_INT);
        // J'exécute la requête préparée (!= PDO::exec())
        $retour = $pdoStatement->execute();

        $lastId = $pdo->lastInsertId();

        // Si erreur
        if ($retour === false) {
        	// sur $pdoStatement car c'est une requête préparée
        	//print_r($pdoStatement->errorInfo());
        	exit;
        }
        //header("Location: student.php?id={$lastId}"); //permet de renvoyer à la page de l'etudiant rajouté - fonction header ()
		die ('1');
		//permet de renvoyer et de stopper le script et affiche le message dans 'réseau'
    }

}

die ('0');

?>

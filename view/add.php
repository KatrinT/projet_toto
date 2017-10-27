<h2>Ajouter un étudiant</h2>
<?php
// Initialisations
$lastnameToto = '';
$firstnameToto = '';
// Si formulaire soumis
if (!empty($_POST)) {
	// Je récupère les données
	$lastnameToto = isset($_POST['lastnameToto']) ? $_POST['lastnameToto'] : '';
	$firstnameToto = isset($_POST['firstnameToto']) ? $_POST['firstnameToto'] : '';
	// Traiter les données
	$lastnameToto = strtoupper(trim(strip_tags($lastnameToto)));
	$firstnameToto = ucfirst(trim(strip_tags($firstnameToto)));
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

	// Si aucune erreur
	if ($formOk) {
        $sql = 'INSERT INTO student (stu_lastname, stu_firstname)
        VALUES (:lastnameToto, :firstnameToto)';
        // Je prépare ma requête, mais ne l'exécute pas encore
        $pdoStatement = $pdo->prepare($sql);
        // Je donne des valeurs à chaque "jeton" ou "token" (=> :jeton)
        $pdoStatement->bindValue(':firstnameToto', $_POST['firstnameToto'], PDO::PARAM_INT);
        $pdoStatement->bindValue(':lastnameToto', $_POST['lastnameToto'], PDO::PARAM_INT);
        // J'exécute la requête préparée (!= PDO::exec())
        $retour = $pdoStatement->execute();

        $lastId = $pdo->lastInsertId();

        // Si erreur
        if ($retour === false) {
        	// sur $pdoStatement car c'est une requête préparée
        	print_r($pdoStatement->errorInfo());
        	exit;
        }

        header("Location: student.php?id={$lastId}");
        exit;
    }

}
?>
<form action="" method="post">
  <div class="form-group">
    <label for="inputAddress">Nom</label>
    <input type="text" name="lastnameToto" class="form-control" id="inputAddress" placeholder="Nom">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Prenom</label>
    <input type="text" name="firstnameToto" class="form-control" id="inputAddress2" placeholder="Prenom">
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>

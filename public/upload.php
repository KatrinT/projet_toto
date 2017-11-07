<?php
session_start();

require __DIR__.'/../inc/config.php';
?>

<?php
if (!empty($_POST)){
	print_r($_FILES);
	if (!empty($_POST['submitFile'])){
		$fileForm = isset($_FILES['fileForm'])? $_FILES['fileForm'] : array();
		$formOK = true;
		if ($fileForm['size']> 100000){
			echo 'fichier trop lourd';
			$formOK = false;
		}

		$allowedExtensions = array('csv');
		if ($fileForm['type'] != 'application/octet-stream'){
			echo 'Fichier incorrect<br>';
			$formOK = false;
		}
		//verification de l'extension
		$dotPosition = strrpos ($fileForm['name'], '.');
		$extension = substr($fileForm['name'], $dotPosition+1);
		if(!in_array($extension, $allowedExtensions)){
			echo 'extension incorrecte <br>';
			$formOK = false;
		}
		if($formOK){
			$newFileName = md5(uniqid().'*+projet-wf3').'.'.$extension;
			if (move_uploaded_file($fileForm['tmp_name'], __DIR__.'/../upload/' .$newFileName)){
				echo 'upload ok<br>';

				$openFile = (fopen(__DIR__.'/../upload/'.$newFileName, 'r'));

				//$buffer correspond à chaque ligne
				if ($openFile) {
				    while (($buffer = fgets($openFile, 4096)) !== false) {
				        echo $buffer;
						$arrayFile = explode(";", $buffer);
						//print_r ($arrayFile);

						//INSERT into
					    $sql = 'INSERT INTO student (stu_lastname, stu_firstname, stu_email, stu_birthdate, stu_friendliness, session_ses_id, city_cit_id)
					    VALUES (:lastnameToto, :firstnameToto, :emailToto, :dateBToto, :sympathieToto, :sessionToto, :villeToto)';
				        $pdoStatement = $pdo->prepare($sql);
				        // Je donne des valeurs à chaque "jeton" ou "token" (=> :jeton)
				        $pdoStatement->bindValue(':firstnameToto', $arrayFile[0] , PDO::PARAM_STR);
				        $pdoStatement->bindValue(':lastnameToto', $arrayFile[1], PDO::PARAM_STR);
						$pdoStatement->bindValue(':emailToto', $arrayFile[2], PDO::PARAM_STR);
						$pdoStatement->bindValue(':dateBToto', $arrayFile[3], PDO::PARAM_INT);
						$pdoStatement->bindValue(':sympathieToto', $arrayFile[4], PDO::PARAM_INT);
						$pdoStatement->bindValue(':sessionToto', '1', PDO::PARAM_INT);
						$pdoStatement->bindValue(':villeToto', '4', PDO::PARAM_INT);
				        // J'exécute la requête préparée (!= PDO::exec())
				        $retour = $pdoStatement->execute();

				        // Si erreur
				        if ($retour === false) {
				        	// sur $pdoStatement car c'est une requête préparée
				        	print_r($pdoStatement->errorInfo());
				        	exit;
				        }
						$nbreAjout = $pdoStatement-> rowCount();
						echo 'il y a '. $nbreAjout .' ajoutées <br>';
					}
				}
			}
		    if (!feof($openFile)) {
		        echo "Erreur: fgets() a échoué\n";
		    }
		    fclose($openFile);
		}
		else{
			echo 'ERROR <br>';
		}
	}

	//GENERATE
	else if (isset($_POST['fileGenere'])){
		$select =
		"SELECT stu_id, stu_lastname,stu_firstname, stu_email, stu_birthdate,  stu_friendliness
		FROM student";
		// Execution
		$pdoStatement = $pdo->query($select);

		// Si erreur
		if ($pdoStatement && $pdoStatement -> rowCount() > 0) {
			$generate = fopen(__DIR__.'/../upload/'.'export-20171106.csv', 'w');
			if ($generate){
				while(($listEtu = $pdoStatement->fetch(PDO::FETCH_ASSOC)) !== false){
					foreach ($listEtu as $value) {
						fwrite ($generate, "{$value['stu_lastname']}; {$value['stu_firstname']}; {$value['stu_birthdate']}; {$value['stu_email']}; {$value['stu_friendliness']}".PHP_EOL) ;
					}
					if (!feof($generate)) {
						echo "Erreur: fgets() a échoué\n";
					}
					fclose($generate);
				}
			}
		}
	}
}
require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/upload.php';
require_once __DIR__.'/../view/footer.php';
?>

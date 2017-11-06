<pre>
<?php

require __DIR__.'/../inc/config.php';

$studentList = array();

//page saisie dans l'url
$page = isset($_GET['page'])? intval($_GET['page']): 1;

/*
determiner le OFFSET
page =>OFFSET
1=0
2=6
...
*/

//calcule automatique de l'OFFSET
$offset = ($page - 1) * 5;

//si erreur de calcul

if ($offset < 0){
	$offset = 0;
}

//recupérer les infos du formulaire rechercher
$search = isset($_GET['recherche']) ? trim($_GET['recherche']) : '';
//si recherhce, ma requete effectue une recherche et ne fait pas de Pagination

if (!empty($search)){

	$sql = 'SELECT * FROM student
			INNER JOIN city ON city.cit_id = student.city_cit_id
			WHERE stu_lastname LIKE :search
			OR stu_firstname LIKE :search
			OR stu_email LIKE :search
			OR cit_name LIKE :search
			ORDER BY stu_lastname, stu_firstname, stu_email, cit_name
	';

			$pdoStatement = $pdo->prepare($sql);
			$pdoStatement->bindValue(':search', '%'.$search.'%');
			$retour = $pdoStatement->execute();

			//nombre de recherche
			$nbreRecherche = $pdoStatement-> rowCount();
			echo 'il y a '. $nbreRecherche .' pour la recherche '.$search;
		}


//sinon on prend tous les etudiants et on fait la pagination
	else{
	//si concatenation refermer les guillemets avant le .
	$sql = 'SELECT * FROM student LIMIT 5 OFFSET ' .$offset;
	//executer la requete
	$pdoStatement = $pdo->query($sql);
	//echo $sql;
	}


// Si erreur
if ($pdoStatement === false) {
	print_r($pdo->errorInfo());
	exit;
} else {
	$resList = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
	//print_r($resList);
}



require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/list.php';
require_once __DIR__.'/../view/footer.php';

?>
</pre>

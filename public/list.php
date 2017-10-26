<pre>
<?php
require __DIR__.'/../inc/config.php';


$sql = 'SELECT * FROM student';

// Execution de la requete
$pdoStatement = $pdo->query($sql);

// Si erreur
if ($pdoStatement === false) {
	print_r($pdo->errorInfo());
	exit;
}

$resList = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
//print_r($resList);



require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/list.php';
require_once __DIR__.'/../view/footer.php';

?>
</pre>

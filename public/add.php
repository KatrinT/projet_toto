<?php
session_start();

require __DIR__.'/../inc/config.php';


//requete pour recevoir la liste des villes
$city = 'SELECT cit_name, cit_id FROM city';
$pdoStatement =$pdo->query($city);
if ($pdoStatement === false) {
	print_r($pdo->errorInfo());
	exit;
}
$cityList = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
//print_r($cityList);

$session = 'SELECT ses_number, ses_id FROM session';
$pdoStatement =$pdo->query($session);
if ($pdoStatement === false) {
	print_r($pdo->errorInfo());
	exit;
}
$sessionList = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
//print_r($sessionList);


require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/add.php';
require_once __DIR__.'/../view/footer.php';

?>

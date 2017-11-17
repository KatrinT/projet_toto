<?php
require_once '../../inc/config.php';
?>

<pre>
<?php
$sql = "SELECT stu_id, stu_lastname,stu_firstname, stu_birthdate, stu_email, cit_name, stu_friendliness, ses_number, tra_name
FROM student
LEFT JOIN city ON student.city_cit_id = city.cit_id
LEFT JOIN session ON student.session_ses_id = session.ses_id
LEFT JOIN training ON session.training_tra_id = training.tra_id
WHERE stu_id = {$_POST['id']}" ;
//echo $sql
;

//print_r ($_GET);

// Execution
$pdoStatement = $pdo->query($sql);
// Si erreur
if ($pdoStatement === false) {
	print_r($pdo->errorInfo());
	exit;
}
$infoEtu = $pdoStatement->fetch(PDO::FETCH_ASSOC);
//print_r($infoEtu);


<div class="card">
  <div class="card-header">
      <h4 class="card-title"><?= $infoEtu['stu_lastname']?></h4>
  </div>
  <div class="card-body">
    <ul>
    <li>Identifiant: <?= $infoEtu['stu_id']?></li>
    <li>Last Name: <?= $infoEtu['stu_lastname']?></li>
    <li>First Name: <?= $infoEtu['stu_firstname']?></li>
    <li>Birthdate: <?= $infoEtu['stu_birthdate']?></li>
    <li>Email: <?= $infoEtu['stu_email']?></li>
    <li>Age: <?= $infoEtu['stu_email']?></li>
    <li>City: <?= $infoEtu['cit_name']?></li>
    <li>Friendliness: <?= $infoEtu['stu_friendliness']?></li>
    <li>Number de session: <?= $infoEtu['ses_number']?></li>
    <li>Nom de la formation: <?= $infoEtu['tra_name']?></li>
    </ul>
  </div>
</div>

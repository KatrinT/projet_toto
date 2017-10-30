<?php
require __DIR__.'/../inc/config.php';
?>

<pre>
<?php
$sql = "SELECT stu_id, stu_lastname,stu_firstname, stu_birthdate, stu_email, cit_name, stu_friendliness, ses_number, tra_name
FROM student
LEFT JOIN city ON student.city_cit_id = city.cit_id
LEFT JOIN session ON student.session_ses_id = session.ses_id
LEFT JOIN training ON session.training_tra_id = training.tra_id
WHERE stu_id = {$_GET['id']}" ;
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


require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/student.php';
require_once __DIR__.'/../view/footer.php';
?>

</pre>

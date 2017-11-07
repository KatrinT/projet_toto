<h2>Informations par Etudiant</h2>

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

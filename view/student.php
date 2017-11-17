<h2>Informations par Etudiant</h2>

<div id="studentContent"></div>

<!-- <div class="card">
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
</div> -->

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script type="text/javascript">


    jQuery.ajax({
        url : 'http://localhost/projet_toto/public/ajax/student.php',
        method : 'POST',
        dataType : 'text',
        data : {
            id : <?php $_GET['id']?>
        }
    }).done(function(response) {
        $('#studentContent').html(response)
    }).fail(function() {
        alert( "bad news... ERROR !" );
        console.log ('bad news... ERROR !')
    }).always(function() {
        alert( "Ajax terminée" );
        console.log ('Ajax terminée')
    });
});

</script>

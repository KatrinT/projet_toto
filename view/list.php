<h2>Liste des etudiants</h2>
<ul>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Last Name</th>
      <th scope="col">First Name</th>
      <th scope="col">Birthdate</th>
      <th scope="col">Email</th>
      <th scope="col">Button</th>
    </tr>
  </thead>
  <tbody>

      <?php foreach ($resList as $student):?>
    <tr>
      <td><?= $student['stu_id']?></td>
      <td><?= $student['stu_lastname']?></td>
      <td><?= $student['stu_firstname']?></td>
      <td><?= $student['stu_birthdate']?></td>
      <td><?= $student['stu_email']?></td>
      <td><a class="btn btn-primary btnStudentDetails" href="student.php?id=<?=$student['stu_id']?>" data-id="<?= $student['stu_id']?>" role="Lien">Link</a></td>
    </tr>
<?php endforeach; ?>

  </tbody>
</table>

<script type="text/javascript">

$(document).ready(function(){


    $('.btnStudentDetails').on('click', function(e){
        e.preventDefault();
        console.log('click');
        var studentID = $(this).data('id');
        console.log(studentID);
        $("#popupStudent").css("display","block");
        //afficher le modal

        jQuery.ajax({
            url : 'ajax/student.php',
            method : 'post',
            dataType : 'html',
            data : {
                id : studentID
                //recupération lors du click
        }
        }).done(function(response) {
            $('#popupStudent').html(response + '<button type="button" class="btn btn-dark closeBtn">Close</button>' );
            //le bouton est ajouté/concaténé car il intervient seulement quand la réponse est fourni
            $('.closeBtn').on('click', function(e) {
                // Annule le comportement par défaut
                e.preventDefault();

                $("#popupStudent").css("display","none");
            })
        })
    })
});


</script>

<div id="popupStudent" style="display:none;position:absolute;z-index:1000;left:50%;top:10%;margin-left:-200px;width:400px;border:1px solid black;padding:10px;background: white;">
 </div>

<nav aria-label="Page navigation example">
  <ul class="pagination">
        <li class="page-item"><a class="page-link" href="list.php?page=<?=$page-1?>">Previous</a></li>
        <li class="page-item"><a class="page-link" href="list.php?page=<?=$page+1?>">Next></a></li>

  </ul>
</nav>
</ul>

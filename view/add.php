<h2>Ajouter un étudiant</h2>

<form id="addForm" action="" method="post">
  <div class="form-group">
    <label for="inputAddress">Nom</label>
    <input type="text" name="lastnameToto" class="form-control" id="inputAddress" placeholder="Nom">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Prenom</label>
    <input type="text" name="firstnameToto" class="form-control" id="inputAddress2" placeholder="Prenom">
  </div>
  <div class="form-group">
    <label for="inputAddress">Date d'anniversaire : au format YYYY-MM-DD (2017-10-30)</label>
    <input type="datetime" name="dateBToto" class="form-control" id="inputAddress" placeholder="Date">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" name="emailToto" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">

  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Symathie</label>
    <select class="form-control" name="sympathieToto" id="exampleFormControlSelect1">
      <option>1</option>
	  <option>2</option>
	  <option>3</option>
	  <option>4</option>
	  <option>5</option>

    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Numero de session</label>
    <select multiple class="form-control" name="sessionToto" id="exampleFormControlSelect2">

	<!-- parcourrir tableau via une boucle - attention un tableau dans un tableau-->
		<?php foreach ($sessionList as $ses):?>
	  <option value="<?= $ses['ses_id'] ?>"><?= $ses['ses_number'] ?></option>
  		<?php endforeach; ?>

    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Ville</label>
    <select multiple class="form-control" name="villeToto" id="exampleFormControlSelect2">
		<?php foreach ($cityList as $cit):?>
      <option value="<?= $cit['cit_id'] ?>"><?= $cit['cit_name'] ?></option>
		<?php endforeach; ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary btnAddForm"  data-id="<?= $ses['ses_id'] ?>" >Sign in</button>
</form>

<script type="text/javascript">

    $(document).ready(function(){

            $('#addForm').on('submit', function(e){
                //submit sur le formulaire uniquement - permet de fonctionner si on clic ou utilisation d'enter
                e.preventDefault();

                var data = $('#addForm').serialize();
                console.log(data);

            jQuery.ajax({
                url : 'ajax/add.php', //correspond à notre response
                //ne pas mettre le chemin complet - permet de fonctionner dans tous les cas - si changement nd
                method : 'post',
                dataType : 'text',
                data : $('#addForm').serialize()

            }).done(function(response) {
                console.log(response);

                // response correspond à la réponse du traitement via le fichier ajax/add.php
				if (response == '1') {
					alert('l\'enregistrement a été validé avec succès');
				}
				else {
					alert('l\'enregistrement est non validé!!!!!');
				}
            })
        })
    });


</script>

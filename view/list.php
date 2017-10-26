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

      <td>
        <?= $student['stu_id']?>
      </td>
      <td>
        <?= $student['stu_lastname']?>
      </td>
      <td>
        <?= $student['stu_firstname']?>
      </td>
      <td>
        <?= $student['stu_birthdate']?>
      </td>
      <td>
        <?= $student['stu_email']?>
      </td>
      <td>
        <a class="btn btn-primary" href="student.php" role="Lien">Link</a>
      </td>

    </tr>
<?php endforeach; ?>

  </tbody>
</table>

</table>
</ul>

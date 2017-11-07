<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Projet TOTO</title>

<!--bootstrap -->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    </head>

    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php">Home</a>
      <a class="navbar-brand" href="index.php">Sessions</a>
      <a class="navbar-brand" href="list.php">Tous les étudiants</a>
      <a class="navbar-brand" href="add.php">Ajouter un étudiant</a>
      <a class="navbar-brand" href="upload.php">Telecharger un fichier</a>
      <a class="navbar-brand" href="signup.php">Sign up</a>
      <a class="navbar-brand" href="signin.php">Sign in</a>

      <form class="form-inline my-2 my-lg-0" action="list.php" method="get">

      <input class="form-control mr-sm-2" name="recherche" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" href="list.php"> Search</button>

    </form>
    </nav>

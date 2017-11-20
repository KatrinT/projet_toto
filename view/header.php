<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Projet TOTO</title>

<!--bootstrap -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">

<!--jquey -->

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php">Home</a>
      <a class="navbar-brand" href="index.php">Sessions</a>

      <?php if(isset($_SESSION['id']) && $_SESSION['role'] === 'user'){
      } else if (isset($_SESSION['id']) && $_SESSION['role'] === 'admin'): ?>
        <a class="navbar-brand" href="add.php">Ajouter un étudiant</a>
     <?php endif; ?>

      <a class="navbar-brand" href="upload.php">Télécharger un fichier</a>

      <!-- Si le membre est connecté on affiche le menu-connection -->
     <?php if(isset($_SESSION['id'])): ?>
        <a class="navbar-brand"> <?= 'ID Utilisateur Connecté: '.$_SESSION['id'].'. Votre IP est: '.$_SESSION['ip'].'. Votre role est: '.$_SESSION['role'] ?></a>
        <a class="navbar-brand" href="disconnect.php">Se déconnecter</a>
     <?php endif; ?>


    <!-- Si le membre n'est pas connecté on affiche le menu-deconnecter -->
     <?php if(empty($_SESSION['id'])): ?>
        <a class="navbar-brand" href="signup.php">Sign up</a>
        <a class="navbar-brand" href="signin.php">Sign in</a>
        <a class="navbar-brand" href="pwdforget.php">MDP oublié</a>
    <?php endif; ?>


      <form class="form-inline my-2 my-lg-0" action="list.php" method="get">

      <input class="form-control mr-sm-2" name="recherche" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" href="list.php"> Search</button>

    </form>
    </nav>

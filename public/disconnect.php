<?php
session_start();
// Je supprime les données en session
session_destroy();
header("Location: index.php");


require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/signup.php';
require_once __DIR__.'/../view/footer.php';

?>

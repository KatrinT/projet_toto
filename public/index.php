<?php
session_start();
require __DIR__.'/../inc/config.php';

//print_r($_SESSION);


//a la fin, j'affiche

require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/home.php';
require_once __DIR__.'/../view/footer.php';

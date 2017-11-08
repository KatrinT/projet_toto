<?php

//Donnes de config

$config =array(
    'DB_HOST'=> '',
    'DB_USER'=> '',
    'DB_PASSWORD'=> '',
    'DB_DATABASE'=> '',
    'MAIL_HOST'=> '',
    'DB_USERNAME'=> '',
    'DB_PASSWORD'=> '',
);

//include de fichiers

require_once __DIR__.'/db.php';
require_once __DIR__.'/functions.php';

// Inclusion de composer
require_once __DIR__.'/../vendor/autoload.php';

// social networks
//Create a Page instance with the url information
$socialLinksPage = new SocialLinks\Page([
    'url' => 'http://projet-toto.dev',
    'title' => 'projet-toto',
    'text' => 'Extended page description',
    'image' => 'http://mypage.com/image.png',
    'icon' => 'http://mypage.com/favicon.png',
    'twitterUser' => '@twitterUser'
]);



 ?>

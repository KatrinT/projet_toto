<?php
session_start();

header('HTTP/1.0 403 Forbidden');

echo 'You are forbidden!';

require_once __DIR__.'/../view/header.php';
require_once __DIR__.'/../view/403.php';
require_once __DIR__.'/../view/footer.php';

?>

<?php

$hello		= "Hello, world!";

ob_start();
$revision	= chop( file_get_contents( "REVISION" ) ) . "\n"; 
//$tag		= chop( file_get_contents( "TAG" ) ) . "\n";
$server		= $_SERVER['SERVER_NAME'] . "\n";
ob_end_clean();


?>
<html>
  <head>
    <title><?=$hello?></title>
  </head>
  <body>
    <h1><?=$hello?></h1>
    <pre>
REVISION: <?=$revision?>
SERVER:   <?=$server?>
    </pre>
  </body>
</html>

<?php

$hello		= "Hello, world!";

ob_start();
$revision	= chop( file_get_contents( "REVISION" ) ); 
ob_end_clean();


?>
<html>
  <head>
    <title><?=$hello?></title>
  </head>
  <body>
    <h1><?=$hello?></h1>
    <p>REVISION: <?=$revision?></p>
  </body>
</html>

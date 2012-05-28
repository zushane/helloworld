<?php

$hello		= "Hello, world!";

ob_start();
$revision	= chop( file_get_contents( "REVISION" ) ); 
$tag		= chop( file_get_contents( "TAG" ) );
ob_end_clean();


?>
<html>
  <head>
    <title><?=$hello?></title>
  </head>
  <body>
    <h1><?=$hello?></h1>
    <pre>
REVISION: <?=$revision?>\n
TAG:      <?=$tag?>     
    </pre>
  </body>
</html>

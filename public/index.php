<?php 
require __DIR__ . '/../recipebook/config.php';
//

 require __DIR__ . '/../vendor/autoload.php';






$app = new  \Slim\App($config); 


require __DIR__ . '/../recipebook/route.php';







$app->run();
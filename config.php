<?php


//$models = [
//  'marca',
//];

$models = Array(
  'autor',
  'libro',
  'usuario',
);

foreach ($models as $model) 
{
  require __ROOT__ . "/models/${model}.php";
}

$controllers = Array(
  'base',
  'autor',
  'libro',
  'usuario',
  'session',
  'index',
);

foreach ($controllers as $controller) 
{
  require __ROOT__ . "/controllers/${controller}_controller.php";
}

?>

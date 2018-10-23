<?php

$models = Array(
  'usuario',
  'canal',
  'programa',
  'categoria'
);

foreach ($models as $model) 
{
  require __ROOT__ . "/models/${model}.php";
}

$controllers = Array(
  'base',
  'programa',
  'canal',
  'categoria',
  'usuario',
  'session',
  'index',
);

foreach ($controllers as $controller) 
{
  require __ROOT__ . "/controllers/${controller}_controller.php";
}

?>

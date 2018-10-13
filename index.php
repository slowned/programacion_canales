<?php
require __DIR__ . '/vendor/autoload.php';
//$whoops = new \Whoops\Run;
//$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
//$whoops->register();
//
define('__ROOT__', __DIR__);


require __ROOT__ . '/config.php';

session_start();
// example request:

// http://localhost/index.php?controller=ProgramaController&index

if (isset($_REQUEST["controller"])&(isset($_REQUEST["action"])))
{
  $controller = new $_REQUEST["controller"];
  $action = $_REQUEST["action"];
  echo $controller->$action($_REQUEST);

	//echo (new $_REQUEST["controller"])->{$_REQUEST["action"]}($_REQUEST);
	// echo (new ProgramaController())->index($_REQUEST);
} else {
  $controller = new BaseController();
  echo $controller->index($_REQUEST);
   // echo (new BaseController)->index($_REQUEST);
}

?>

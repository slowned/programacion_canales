<?php
require __DIR__ . '/vendor/autoload.php';
define('__ROOT__', __DIR__);


require __ROOT__ . '/config.php';

session_start();
// example request:

// http://localhost/backend.php?controller=UsuarioController&index=create

if (isset($_REQUEST["controller"])&(isset($_REQUEST["action"])))
{
  $controller = new $_REQUEST["controller"];
  $action = $_REQUEST["action"];
  echo $controller->$action($_REQUEST);

	//echo (new $_REQUEST["controller"])->{$_REQUEST["action"]}($_REQUEST);
	// echo (new ProgramaController())->index($_REQUEST);
} else {
  $controller = new BaseController();
  echo $controller->login($_REQUEST);
   // echo (new BaseController)->index($_REQUEST);
}

?>

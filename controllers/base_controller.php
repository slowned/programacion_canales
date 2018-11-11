<?php
class BaseController {

	public function __construct()
	{
		$loader = new Twig_Loader_Filesystem(__ROOT__ . '/views');
		$this->twig = new Twig_Environment($loader, array('debug' => true));
		$this->twig->addExtension(new Twig_Extension_Debug());

		if (isset($_SESSION['user']))
		{
			$this->twig->addGlobal("current_user",$_SESSION['user']);
		}
	}
	public function render($view, $vars=Array()){
		return $this->twig->render($view.'.html.twig', $vars);
	}

	public function index($request) {
        $programas = Programa::all();
        return $this->render('home/index', compact('programas'));
	}

  public function login($request){
      return $this->render('login/login');
  }

  public function backend($request){
    $user = $_SESSION['user'];
    return $this->render('home/home',compact('user'));
  }

  public function indexPorFecha($request) {
    $fecha = $request['fecha'];
    if(!empty($fecha)){
      $fecha = date("Y-m-d", strtotime($_POST['fecha']));
      $programas = Programa::buscarPorFecha(compact('fecha'));
      if(isset($programas)){
        return $this->render('/home/index', compact('programas'));
      }  
    } else {
        $error = "No hay programacion para ese dia";
        $programas = Programa::all();
        return $this->render('home/index', compact('programas','error'));
    }

  }
}
?>

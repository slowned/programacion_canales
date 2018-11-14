M
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
        $fecha = '2018-11-11';
        setcookie("cookie_fecha",$fecha);
        $fecha_cookie = ($_COOKIE["cookie_fecha"]);
        $categorias = Categoria::all();
        $programas = Programa::buscarPorFecha(compact('fecha'));
        return $this->render('home/index', compact('programas', 'fecha','categorias'));
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
    $categorias = Categoria::all();
    if(!empty($fecha)){
      $fecha = date("Y-m-d", strtotime($fecha));
      $programas = Programa::buscarPorFecha(compact('fecha'));
      if(isset($programas)){
        return $this->render('/home/index', compact('programas', 'fecha', 'categorias'));}  
    } else {
        $error = "No hay programacion para ese dia";
        $programas = Programa::all();
        return $this->render('home/index', compact('programas','error','fecha', 'categorias'));
    }
  }

  public function siguiente($request) {
    $fecha = $request['fecha'];
    $dia = substr($fecha, -2);
    $dia = (int)$dia + 1;
    $anio = substr($fecha,0,4);
    $mes = substr($fecha,-5,-3);
    $fecha = $anio . "-" . $mes . "-" . $dia ;
    $categorias = Categoria::all();
    $programas = Programa::buscarPorFecha(compact('fecha'));
    if(isset($programas)){
      return $this->render('/home/index', compact('programas','fecha','categorias'));
    }  else {
      $error = "ERROR NO SE PUEDO OBTENER DICHA INFORMACION!!";
      $programas = Programa::all();
      return $this->render('home/index', compact('programas','error','fecha','categorias'));
    }
  }

  public function anterior($request) {
    $fecha = $request['fecha'];
    $dia = substr($fecha, -2);
    $dia = (int)$dia - 1;
    $anio = substr($fecha,0,4);
    $mes = substr($fecha,-5,-3);
    $fecha = $anio . "-" . $mes . "-" . $dia ;
    $categorias = Categoria::all();
    $programas = Programa::buscarPorFecha(compact('fecha'));
    if(isset($programas)){
      return $this->render('/home/index', compact('programas','fecha','categorias'));
    }  else {
      $error = "ERROR NO SE PUEDO OBTENER DICHA INFORMACION!!";
      $programas = Programa::all();
      return $this->render('home/index', compact('programas','error','fecha','categorias'));
    }
  }
  
}
?>

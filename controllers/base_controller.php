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

	public function index($params) {
        $programas = Programa::all();
        return $this->render('home/index', compact('programas'));
	}

  public function login($params){
      return $this->render('login/login');
  }

  public function backend($params){
    $user = $_SESSION['user'];
    return $this->render('home/home',compact('user'));
  }

}
?>

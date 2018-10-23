<?php
class UserController extends BaseController{

  public function index($request){
    $usuarios = Usuario::all();
    return $this->render('usuarios/index', compact('usuarios'));
  }
  public function create($request){
    return $this->render('usuarios/create');
  }


  public function store($request){
    $nombre = $request['name'];
    $clave = $request['password'];
    if(empty(Usuario::findByName(compact('nombre')))){
        Usuario::save(compact('nombre', 'clave'));
        header('Location: backend.php?controller=UserController&action=index');
    }
    $error = 'el nombre de usuario esta en uso';
    return $this->render('usuarios/create', compact('error'));
  }

  public function show($request){
    $id = $request['id'];
    $usuario = User::findById(compact('id'));
    return $this->render('usuarios/show', compact('usuario'));
  }

    public function edit($request){}
    public function update($request){}
    public function destroy($request){}
}
?>

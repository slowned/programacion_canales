<?php

class CategoriaController extends BaseController {
  public function index($request){
    $categorias = Categoria::all();
    $user = $_SESSION['user'];
		if(isset($user)){
      return $this->render('categorias/index', compact("categorias", "user"));
    } else {
        $error = 'usuario o contrasenia invalida';
        return $this->render('login/login', compact('error'));
    }
  }


  public function create($request){
    $user = $_SESSION['user'];
		if(isset($user)){
      return $this->render('categorias/create', compact("user"));
    } else {
        $error = 'usuario o contrasenia invalida';
        return $this->render('login/login', compact('error'));
    }
  }


  public function store($request){
    $categoria = $request['categoria'];
    if(empty(Categoria::findByName(compact('categoria')))){
      Categoria::save(compact('categoria'));
      header('Location: backend.php?controller=CategoriaController&action=index');
    }
    $error = 'esta categoria ya fue creada anteriormente';
    return $this->render('categorias/create', compact('error'));
  }


  public function show($request){
    $id = $request['id'];
    $categoria = Categoria::findById(compact('id'));
    $user = $_SESSION['user'];
		if(isset($user)){
      return $this->render('categorias/show', compact("categoria"));
    } else {
        $error = 'usuario o contrasenia invalida';
        return $this->render('login/login', compact('error'));
    }
  }
  public function edit($request){
    $id = $request['id'];
    $categoria = Categoria::findById(compact('id'));
    $user = $_SESSION['user'];
		if(isset($user)){
      return $this->render('categorias/edit', compact("categoria"));
    } else {
        $error = 'usuario o contrasenia invalida';
        return $this->render('login/login', compact('error'));
    }


  }
  public function update($request){
    $categoria = $request['categoria'];
    $id = $request['id'];
    Categoria::update(compact("categoria", "id"));
    header('Location: backend.php?controller=CategoriaController&action=show&id='.$id);
  }


  public function destroy($request){
    $id = $request['id'];
    $user = $_SESSION['user'];
		if(isset($user)){
      Categoria::destroy(compact("id"));
      header('Location: backend.php?controller=CategoriaController&action=index');
    } else {
        $error = 'usuario o contrasenia invalida';
        return $this->render('login/login', compact('error'));
    }
  }
}

?>


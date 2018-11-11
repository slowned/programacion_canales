<?php

class ProgramaController extends BaseController {
  public function index($request){
    $programas = Programa::all();
    $user = $_SESSION['user'];
    if(isset($user)){
      return $this->render('programas/index', compact("programas", "user"));
    
    }else {
      $error = "usted tiene q ser un usuario logeado";
      return $this->render('login/login', compact('error'));
    }
  }

  public function create($request){

    $canales = Canal::all();
    $categorias = Categoria::all();
    $user = $_SESSION['user'];
    if(isset($user)){
      return $this->render('programas/create', compact("canales", "categorias", "user"));
    } else {
      $error = "usted tiene q ser un usuario logeado";
      return $this->render('login/login', compact('error'));
    }
  }

  public function store($request){
    $programa = $request['programa'];
    $descripcion = $request['descripcion'];
    $fecha = $request['fecha'];
    $fecha = date("Y-m-d", strtotime($_POST['fecha']));
    $hora_inicio = $request['hora_inicio'];
    $duracion = (int)$request['duracion'];
    $categoria_id = (int)$request['idCategoria'];
    $canal_id = (int)$request['idCanal'];

    if(empty(Programa::findByName(compact('programa')))){
      Programa::save(compact('programa', 'descripcion','fecha', 'hora_inicio', 'duracion', 'categoria_id', 'canal_id'));
      header('Location: backend.php?controller=ProgramaController&action=index');
    }
    $error = 'este programa ya fue creado anteriormente';
    $canales = Canal::all();
    $categorias = Categoria::all();
    return $this->render('programas/create', compact('error', "canales", "categorias"));
  }


  public function update($request){
    $programa = $request['programa'];
    $programa_id = $request['programa_id'];
    $descripcion = $request['descripcion'];
    $fecha = $request['fecha'];
    $fecha = date("Y-m-d", strtotime($_POST['fecha']));
    $hora_inicio = $request['hora_inicio'];
    $duracion = (int)$request['duracion'];
    $categoria_id = (int)$request['idCategoria'];
    $canal_id = (int)$request['idCanal'];

    Programa::update(compact('programa', 'descripcion','fecha', 'hora_inicio', 'duracion', 'categoria_id', 'canal_id'));
    header('Location: backend.php?controller=ProgramaController&action=show&id='.$programa_id);
    
  }

  public function showIndex($request){
    $id = $request['id'];
    $programa = Programa::findById(compact('id'));

    $id = $programa['canal_id'];
    $canal = Canal::findById(compact('id'));
    
    $id = $programa['categoriaprograma_id'];
    $categoria = Categoria::findById(compact('id'));

    return $this->render('programas/show_index', compact("programa", "categoria", "canal"));

  }
  public function show($request){
    $id = $request['id'];
    $programa = Programa::findById(compact('id'));

    $id = $programa['canal_id'];
    $canal = Canal::findById(compact('id'));
    
    $id = $programa['categoriaprograma_id'];
    $categoria = Categoria::findById(compact('id'));

    $user = $_SESSION['user'];
    if(isset($user)){
      return $this->render('programas/show', compact("programa", "categoria", "canal", "user"));
    }else{
      $error = "usted tiene q ser un usuario logeado";
      return $this->render('login/login', compact('error'));

    }
  }


  public function edit($request){
    $id = $request['id'];
    $programa = Programa::findById(compact('id'));
    
    // Obtengo el id categoria y lo busco en la BD
    $id = $programa['categoriaprograma_id'];
    $categoria = Categoria::findById(compact('id'));

    // Obtengo el canal
    $id = $programa['canal_id'];
    $canal = Canal::findById(compact('id'));
    $canales = Canal::all();
    $categorias = Categoria::all();

    $user = $_SESSION['user'];
    if(isset($user)){
      return $this->render('programas/edit',
                         compact("programa", "categoria", "canal",
                                 "categorias", "canales", "user" ));

    }else{
      $error = "usted tiene q ser un usuario logeado";
      return $this->render('login/login', compact('error'));

    }
  }
  
  public function destroy($request){
    $id = $request['id'];
    $user = $_SESSION['user'];
    if(isset($user))
    {
      Programa::destroy(compact("id"));
      header('Location: backend.php?controller=ProgramaController&action=index');
    }else{
      $error = "usted tiene q ser un usuario logeado";
      return $this->render('login/login', compact('error'));



    }
  }
}

?>


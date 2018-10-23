<?php

class ProgramaController extends BaseController {
  public function index($request){
    $programas = Programa::all();
    return $this->render('programas/index', compact("programas"));
  }

  public function create($request){
    $canales = Canal::all();
    $categorias = Categoria::all();
    return $this->render('programas/create', compact("canales", "categorias"));
  }

  public function store($request){
    $programa = $request['programa'];
    $canal_id = $request['idCanal'];
    $categoria_id = $request['idCategoria'];
    $descripcion = $request['descripcion'];
    $fecha = $request ['fecha'];
    $hora_inicio = $request['hora_inicio'];
    $duracion = $request['duracion'];
    //$fecha = date("Y-m-d", strtotime($_POST['fecha']));
    //echo "fecha_cambio: " . $fecha;
    print_r($programa);
    print_r($fecha);
    echo "esta en el store antes el vardump";
    var_dump ($fecha,$programa);

    if(empty(Programa::findByName(compact('programa')))){
      Programa::save(compact('programa', 'descripcion','fecha', 'hora_inicio', 'duracion', 'categoria_id', 'canal_id'));
      header('Location: backend.php?controller=ProgramaController&action=index');
    }
    $error = 'este programa ya fue creado anteriormente';
    return $this->render('programas/create', compact('error'));
  }
  public function show($request){
    $id = $request['id'];
    $categoria = Programa::findById(compact('id'));
    return $this->render('programas/show', compact("categoria"));
  }
  public function edit($request){
    $id = $request['id'];
    $categoria = Programa::findById(compact('id'));
    return $this->render('programas/edit', compact("categoria"));


  }
  public function update($request){
    $categoria = $request['categoria'];
    $id = $request['id'];
    Programa::update(compact("categoria", "id"));
    header('Location: backend.php?controller=ProgramaController&action=show&id='.$id);
  }


  public function destroy($request){
    $id = $request['id'];
    Programa::destroy(compact("id"));
    header('Location: backend.php?controller=ProgramaController&action=index');
  }
}

?>


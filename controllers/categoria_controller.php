<?php

class CategoriaController extends BaseController {
  public function index($request){
    $categorias = Categoria::all();
    return $this->render('categorias/index', compact("categorias"));
  }

  public function create($request){
    return $this->render('categorias/create');
  }

  public function store($request){
    $nombre = $request['nombre'];
    Autor::save(compact('nombre'));
    header('Location: backend.php?controller=CategoriaController&action=index');
  }
  public function show($request){
    $id = $request['id'];
    $categoria = Categoria::findById(compact('id'));
    return $this->render('categorias/show', compact("categoria"));
  }
    public function edit($request){}
    public function update($request){}
    public function destroy($request){}
}

?>


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
    return $this->render('categorias/show', compact("categoria"));
  }
  public function edit($request){
    $id = $request['id'];
    $categoria = Categoria::findById(compact('id'));
    return $this->render('categorias/edit', compact("categoria"));


  }
  public function update($request){
    $categoria = $request['categoria'];
    $id = $request['id'];
    Categoria::update(compact("categoria", "id"));
    header('Location: backend.php?controller=CategoriaController&action=show&id='.$id);
  }


  public function destroy($request){
    $id = $request['id'];
    Categoria::destroy(compact("id"));
    header('Location: backend.php?controller=CategoriaController&action=index');
  }
}

?>


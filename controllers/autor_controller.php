<?php

class AutorController extends BaseController {
  public function index($request){
    $autores = Autor::all();
    return $this->render('autores/index', compact("autores"));
  }

  public function create($request){
    return $this->render('autores/create');
  }

  public function store($request){
    $apellido = $request['apellido'];
    $nombre = $request['nombre'];
    Autor::save(compact('apellido', 'nombre'));
    header('Location: index.php?controller=AutorController&action=index');
  }
  public function show($request){
    $id = $request['id'];
    $libros = Libro::findByAutor(compact('id'));
    $autor = Autor::findById(compact('id'));
    return $this->render('autores/show', compact("autor", "libros"));
  }
    public function edit($request){}
    public function update($request){}
    public function destroy($request){}
}

?>


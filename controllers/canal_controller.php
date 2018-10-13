<?php

class CanalController extends BaseController {
  public function index($request){
    $canales = Canal::all();
    return $this->render('canales/index', compact("canales"));
  }

  public function create($request){
    return $this->render('canales/create');
  }

  public function store($request){
    $numero = $request['numero'];
    $nombre = $request['nombre'];
    Canal::save(compact('numero', 'nombre'));
    header('Location: backend.php?controller=CanalController&action=index');
  }
  public function show($request){
    $id = $request['id'];
    $canal = Canal::findById(compact('id'));
    return $this->render('canales/show', compact("canal"));
  }
    public function edit($request){}
    public function update($request){}
    public function destroy($request){}
}

?>


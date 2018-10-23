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
    if(empty(Canal::findByName(compact('nombre')))){
      Canal::save(compact('numero', 'nombre'));
      header('Location: backend.php?controller=CanalController&action=index');
    }
    $error = 'ya existe un canal con ese nombre';
    return $this->render('canales/create', compact("error"));
  }

  public function show($request){
    $id = $request['id'];
    $canal = Canal::findById(compact('id'));
    return $this->render('canales/show', compact("canal"));
  }

  public function edit($request){
    $id = $request['id'];
    $canal = Canal::findById(compact('id'));
    return $this->render('canales/edit', compact("canal"));


  }
  public function update($request){
    $canal_nombre = $request['canal'];
    $canal_numero = $request['numero'];
    $canal_id = $request['id'];
    Canal::update(compact("canal_nombre", "canal_numero", "canal_id"));
    header('Location: backend.php?controller=CanalController&action=show&id='.$canal_id);
  }


  public function destroy($request){
    $canal_id = $request['id'];
    Canal::destroy(compact("canal_id"));
    header('Location: backend.php?controller=CanalController&action=index');
  }


}
?>

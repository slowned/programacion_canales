<?php
class LibroController extends BaseController {

  public function index($request){
    $libros = Libro::all();
    return $this->render('libros/index', compact("libros"));
  }

  public function create($request){
    $autores = Autor::all();
    return $this->render('libros/create', compact("autores"));
  }


  public function store($request){
    $titulo = $request['titulo'];
    $portada_tmp = $_FILES["name"]["portada"];
    $portada = addslashes(file_get_contents($portada_tmp));

    //$portada = $request['portada'];
    $descripcion = $request['descripcion'];
    $autor_id = $request['AutorLibro'];
    $cantidad = $request['cantidad'];
    Libro::save(compact('titulo', 'portada', 'descripcion', 'autor_id', 'cantidad'));
    header('Location: index.php?controller=LibroController&action=index');
  }


  public function show($request){
    $id = $request['id'];
    $libro = Libro::findById(compact("id"));
    $autor_id = $libro['autores_id'];
    $autor = Autor::findById(compact("autor_id"));
    return $this->render('libros/show', compact("libro", "autor"));
  }


  public function findBook($request){
    $titulo = $request['book'];
    $nombre = $request['autor'];
    if(isset($request['book']) && isset($request['autor'])){
      echo "los 2 seteados";
    }elseif(isset($request['book'])){ echo "solo book seteado"; }
    elseif(isset($request['autor'])){ echo " solo autor seteado"; }

  }

  public function reserve($request){
    $id = $request['id'];
    $libro = libro::findById(compact("id"));
    $user = $_SESSION['user'];
    $last = "today";
    $estado = "RESERVADO";
    $reserve = Libro::reserve(compact("user","libro","last","estado"));
    return $this->render('libros/reserve', compact("libro"));
  }


    public function edit($request){}
    public function update($request){}
    public function destroy($request){}
}

?>

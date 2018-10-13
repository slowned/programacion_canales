<?php
class Libro{

  static function all(){
		$pdo = new PDO('mysql:host=localhost;dbname=bibloteca', 'root', '1234');
    $query = $pdo->prepare("SELECT * FROM libros l INNER JOIN autores a ON(l.autores_id=a.id)");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  static function save($params){
		$pdo = new PDO('mysql:host=localhost;dbname=bibloteca', 'root', '1234');
    $query = $pdo->prepare("INSERT INTO libros(titulo, portada, descripcion, autores_id, cantidad) VALUES(:titulo, :portada, :descripcion, :autor_id, :cantidad)");
    $query->execute($params);
  }

  static function findById($params){
		$pdo = new PDO('mysql:host=localhost;dbname=bibloteca', 'root', '1234');
    $query = $pdo->prepare("SELECT * FROM libros WHERE id = :id");
    $query->execute($params);
    return $query->fetch(PDO::FETCH_ASSOC);
  }

  static function findByAutor($params){
    #busca el libro con el id de autor pasado por patametro
		$pdo = new PDO('mysql:host=localhost;dbname=bibloteca', 'root', '1234');
    $query = $pdo->prepare("SELECT * FROM libros WHERE autores_id = :id");
    $query->execute($params);
    return $query->fetch(PDO::FETCH_ASSOC);
  }

  static function get_bookAutor($params){
    #busca el libro con el titutlo y autor pasado por parametros
		$pdo = new PDO('mysql:host=localhost;dbname=bibloteca', 'root', '1234');
    $query = $pdo->prepare(
      "SELECT *
      FROM libros l INNER JOIN autores a ON(l.autores_id=a.id)
      WHERE l.titulo=:titulo and a.nombre=:nombre");
    $query->execute($params);
    return $query->fetch(PDO::FETCH_ASSOC);

  }

  static function reserve($params){
		$pdo = new PDO('mysql:host=localhost;dbname=bibloteca', 'root', '1234');
    $query = $pdo->prepare(
      "INSERT INTO operaciones(
        ultimo_estado, fecha_ultima_modificacion, lector_id, libros_id
      )VALUES(
      :estado, :last, :lector_id, :libro_id)");


  }
  static function get_bookByAutor($params){}
  static function get_bookByName($params){}



  static function update($params){}
  static function destroy($params){}

}
?>

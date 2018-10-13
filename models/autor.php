<?php
class Autor{

  static function all(){
		$pdo = new PDO('mysql:host=localhost;dbname=bibloteca', 'root', '1234');
    $query = $pdo->prepare("SELECT * FROM autores");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  static function save($params){
		$pdo = new PDO('mysql:host=localhost;dbname=bibloteca', 'root', '1234');
    $query = $pdo->prepare("INSERT INTO autores(apellido, nombre) VALUES(:apellido, :nombre)");
    $query->execute($params);
  }

  static function findById($params){
		$pdo = new PDO('mysql:host=localhost;dbname=bibloteca', 'root', '1234');
    $query = $pdo->prepare("SELECT * FROM autores WHERE id = :id");
    $query->execute($params);
    return $query->fetch(PDO::FETCH_ASSOC);
  }

    static function update($params){}
    static function destroy($params){}

}
?>

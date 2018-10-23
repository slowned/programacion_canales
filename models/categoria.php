<?php
class Categoria{

  static function all(){
		$pdo = new PDO('mysql:host=localhost;dbname=canales', 'admin', 'a.s');
    $query = $pdo->prepare("SELECT * FROM categoriaprograma");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  static function save($params){
		$pdo = new PDO('mysql:host=localhost;dbname=canales', 'admin', 'a.s');
    $query = $pdo->prepare("INSERT INTO categoriaprograma(nombre) VALUES(:categoria)");
    $query->execute($params);
  }

  static function findByName($params){
		$pdo = new PDO('mysql:host=localhost;dbname=canales', 'admin', 'a.s');
    $query = $pdo->prepare("SELECT * FROM categoriaprograma WHERE nombre = :categoria");
    $query->execute($params);
    return $query->fetch(PDO::FETCH_ASSOC);
  }


  static function update($params){
		$pdo = new PDO('mysql:host=localhost;dbname=canales', 'admin', 'a.s');
    $query = $pdo->prepare("UPDATE categoriaprograma SET nombre = :categoria WHERE id = :id");
    $query->execute($params);
    return $query->fetch(PDO::FETCH_ASSOC);
  }

  
  static function destroy($params){
		$pdo = new PDO('mysql:host=localhost;dbname=canales', 'admin', 'a.s');
    $query = $pdo->prepare("DELETE FROM categoriaprograma WHERE id = :id");
    $query->execute($params);
  }

  static function findById($params){
		$pdo = new PDO('mysql:host=localhost;dbname=canales', 'admin', 'a.s');
    $query = $pdo->prepare("select * FROM categoriaprograma WHERE id = :id");
    $query->execute($params);
    return $query->fetch(PDO::FETCH_ASSOC);

  }

}
?>

<?php
include("conexion.php");
class Canal{

  static function all(){
		$pdo = conectar(); 
    $query = $pdo->prepare("SELECT * FROM canal");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  static function save($params){
		$pdo = conectar(); 
    $query = $pdo->prepare("INSERT INTO canal(nombre, numero) VALUES(:nombre, :numero)");
    $query->execute($params);
  }

  static function findById($params){
		$pdo = new PDO('mysql:host=localhost;dbname=canales', 'admin', 'a.s');
    $query = $pdo->prepare("SELECT * FROM canal WHERE id = :id");
    $query->execute($params);
    return $query->fetch(PDO::FETCH_ASSOC);
  }

  static function update($params){
		$pdo = new PDO('mysql:host=localhost;dbname=canales', 'admin', 'a.s');
    $query = $pdo->prepare("UPDATE canal SET nombre = :canal_nombre, numero = :canal_numero WHERE id = :canal_id");
    $query->execute($params);
    return $query->fetch(PDO::FETCH_ASSOC);

  }
  static function destroy($params){
		$pdo = new PDO('mysql:host=localhost;dbname=canales', 'admin', 'a.s');
    $query = $pdo->prepare("DELETE FROM canal WHERE id = :canal_id");
    $query->execute($params);
  }

  static function findByName($params){
		$pdo = new PDO('mysql:host=localhost;dbname=canales', 'admin', 'a.s');
    $query = $pdo->prepare("SELECT * FROM canal WHERE nombre = :nombre");
    $query->execute($params);
    return $query->fetch(PDO::FETCH_ASSOC);

  }
  static function findByNumber($params){
    $pdo = conectar();
  }
}
?>

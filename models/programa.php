<?php
class Programa{

  static function all(){
		$pdo = new PDO('mysql:host=localhost;dbname=canales', 'admin', 'a.s');
    $query = $pdo->prepare("SELECT * FROM programa");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  static function save($params){
		$pdo = new PDO('mysql:host=localhost;dbname=canales', 'admin', 'a.s');
    $query = $pdo->prepare(
      "INSERT INTO programa(nombre, descripcion, fecha, horainicio,
                            duracion, categoriaprograma_id, canal_id)
       VALUES(:nombre, :descripcion, :fecha, :horainicio,
               :duracion, :categoria_id, :canal_id)"
    );
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
    $query = $pdo->prepare("SELECT * FROM programa WHERE nombre = :programa");
    $query->execute($params);
    return $query->fetch(PDO::FETCH_ASSOC);

  }
  static function findByNumber($params){
		$pdo = new PDO('mysql:host=localhost;dbname=canales', 'admin', 'a.s');
  }
}
?>

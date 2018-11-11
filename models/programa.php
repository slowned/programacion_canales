<?php
class Programa{

  static function all(){
		$pdo = new PDO('mysql:host=localhost;dbname=canales', 'admin', 'a.s');
    $query = $pdo->prepare("SELECT * FROM programa");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  static function allByDate(){
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
       VALUES(:programa, :descripcion, :fecha, :hora_inicio,
               :duracion, :categoria_id, :canal_id)"
    );
    $query->execute($params);
  }

  static function findById($params){
		$pdo = new PDO('mysql:host=localhost;dbname=canales', 'admin', 'a.s');
    $query = $pdo->prepare("SELECT * FROM programa WHERE id = :id");
    $query->execute($params);
    return $query->fetch(PDO::FETCH_ASSOC);
  }

  static function update($params){
		$pdo = new PDO('mysql:host=localhost;dbname=canales', 'admin', 'a.s');
    $query = $pdo->prepare("
      UPDATE programa
      SET nombre=:programa, descripcion=:descripcion, fecha=:fecha, 
          horainicio=:hora_inicio, duracion=:duracion, categoriaprograma_id=:categoria_id,
          canal_id=:canal_id"
    );
    $query->execute($params);
    return $query->fetch(PDO::FETCH_ASSOC);

  }
  static function destroy($params){
		$pdo = new PDO('mysql:host=localhost;dbname=canales', 'admin', 'a.s');
    $query = $pdo->prepare("DELETE FROM programa WHERE id=:id");
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

  static function buscarPorFecha($params){
		$pdo = new PDO('mysql:host=localhost;dbname=canales', 'admin', 'a.s');
    $query = $pdo->prepare("SELECT * FROM programa WHERE fecha  = :fecha");
    $query->execute($params);
    return $query->fetchAll(PDO::FETCH_ASSOC);

  }
}
?>

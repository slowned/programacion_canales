<?php

class Usuario{

  static function all(){
    $pdo = new PDO('mysql:host=localhost;dbname=canales', 'admin', 'a.s');
    $query = $pdo->prepare("SELECT * FROM usuario");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  static function save($params){
    $pdo = new PDO('mysql:host=localhost;dbname=canales', 'admin', 'a.s');
    $query = $pdo->prepare("INSERT INTO usuario(nombreusuario, clave)
      VALUES(:nombre, :clave)");
    $query->execute($params);
  }

  static function findById($params){
    $pdo = new PDO('mysql:host=localhost;dbname=canales', 'admin', 'a.s');
    $query = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
    $query->execute($params);
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  static function where($params){
    $pdo = new PDO('mysql:host=localhost;dbname=canales', 'admin', 'a.s');
    $query = $pdo->prepare("SELECT * FROM usuario u WHERE u.nombreusuario =s :username AND clave = :password");
    $query->execute($params);
    return $query->fetch(PDO::FETCH_ASSOC);
  }

  static function findByName($params){
    $pdo = new PDO('mysql:host=localhost;dbname=canales', 'admin', 'a.s');
    $query = $pdo->prepare("SELECT * FROM usuario WHERE nombreusuario = :nombre");
    $query->execute($params);
    return $query->fetch(PDO::FETCH_ASSOC);
  }

    static function update($params){}
    static function destroy($params){}

}
?>

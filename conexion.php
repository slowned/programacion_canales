<?php
  function conectar(){
      $pdo = new PDO('mysql:host=localhost;dbname=canales', 'admin', 'a.s');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
  }
?>

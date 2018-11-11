<?php

  function conectar(){
      $pdo = new PDO('mysql:host=localhost;dbname=canales', 'admin', 'a.s');
      return $pdo;
  }

?>

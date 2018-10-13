<?php

  function conectar(){
      $link = new PDO('mysql:host=localhost;dbname=canales', 'admin', 'a.s');
      return $link;
  }

?>

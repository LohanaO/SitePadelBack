<?php
 try {
    
    $dbname = 'base_datos_padel';
    $user = 'root'; 
    $password = '';
    
    $dsn = "mysql:host=localhost;dbname=$dbname";
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e){
    echo $e->getMessage();

  }

$fotos_por_pagina= 8;
$pagina_actual= (isset($_GET['p']) ? (int)$_GET['p'] : 1);

require 'views/index.view.php';

?>
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


if ($_SERVER['REQUEST_METHOD']=='POST' && !empty($_FILES)) {
  
  $check=@getimagesize($_FILES['foto']['tmp_name']);
    if ($check!==false) {
        $carpeta_destino='fotos/';
        $archivo_subido= $carpeta_destino. $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], $archivo_subido);
        $consulta = $dbh->prepare("INSERT INTO imagenes (imagen)
   VALUES (:imagen);");

   $consulta->bindValue(':imagen',$_FILES['foto']['name']);

   $consulta->execute();

   header("Location:index.php");
  
    }else{
      $erro= "El archivo no es una imagen o es muy pesado";
    }
  }

require 'views/subir.view.php';
?>
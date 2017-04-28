<?php
   function conexion ($dbd){
      try {
         $conexion = new PDO('mysql:host=localhost;dbname='.$dbd['db'],$dbd['us'],$dbd['ps']);
         return $conexion;
      } catch (PDOException $e) {
         return false;
      }
   }

   $conn = conexion($dbd);
?>

<?php

class Cconexion {

   public static function ConexionBD() {

        $host = 'localhost';  
        $dbname = 'ProyectoGestionBDDu1';
        $username = 'root';  
        $password = 'administrador';  
        $puerto = '3306';  

        try {
            $conn = new PDO("mysql:host=$host;port=$puerto;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "";
        } catch (PDOException $exp) {
            echo "No se logró conectar correctamente con la base de datos: $dbname, error: " . $exp->getMessage();
        }

        return $conn;
    }

}
?>

<?php

class Cconexion {

   public static function ConexionBD() {

        $host = 'localhost';  // Cambiar a minúsculas
        $dbname = 'ProyectoGestionBDDu1';
        $username = 'root';  // Reemplazar con tu nombre de usuario de MySQL
        $password = 'administrador';  // Reemplazar con tu contraseña de MySQL
        $puerto = '3306';  // Puerto predeterminado para MySQL

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

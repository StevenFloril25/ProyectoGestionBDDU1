<?php

class Cconexion {

<<<<<<< HEAD
   public static function ConexionBD() {

        $host = 'localhost';
        $dbname = 'ProyectoGestionBDDu1';
        $username = 'sa';
        $pasword = '1234';
        $puerto = 1433;
=======
    // Constructor para inicializar los datos de conexión
    public function __construct() {
        $this->serverName = 'Steven';
        $this->dbName = 'ProyectoGestionBDDu1';
        $this->userName = 'sa';
        $this->password = 'datos';
    }
>>>>>>> 3b2eb00cc873331a90daa9b8defa4b5cbb245ec8

        try {
            $conn = new PDO("sqlsrv:Server=$host,$puerto;Database=$dbname", $username, $pasword);
            echo "";
        } catch (PDOException $exp) {
            echo "No se logró conectar correctamente con la base de datos: $dbname, error: $exp";
        }

        return $conn;
    }

}
?>

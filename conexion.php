<?php


class Cconexion {
    private $serverName;
    private $dbName;
    private $userName;
    private $password;

    // Constructor para inicializar los datos de conexión
    public function __construct() {
        $this->serverName = 'Steven';
        $this->dbName = 'ProyectoGestionBDDu1';
        $this->userName = 'sa';
        $this->password = 'datos';
    }

    // Método para establecer la conexión a la base de datos
    public function ConexionBD() {
        try {
            // Crear una nueva instancia de la clase PDO para establecer la conexión
            $conn = new PDO("sqlsrv:Server=$this->serverName;Database=$this->dbName", $this->userName, $this->password);
    
            // Configurar el modo de error para que PDO lance excepciones en lugar de advertencias
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            // Devolver la conexión establecida
            return $conn;
        } catch (PDOException $e) {
            // En caso de error al conectar, imprimir un mensaje de error y terminar el script
            die("Error de conexión: " . $e->getMessage());
        }
    }
}

?>

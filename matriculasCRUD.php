<?php
require('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $edad = $_POST["edad"];
    $telefono = $_POST["telefono"]; // Corregir el nombre del campo
    $Sacramento = $_POST["Sacramento"];
    $Catequista = $_POST["Catequista"];
    $Horarios = $_POST["Horarios"];
    $Iglesia = $_POST["Iglesia"];

    // Obtener la conexión
    $conexion = new Cconexion();
    $conn = $conexion->ConexionBD();

    try {
        // Preparar la consulta SQL con parámetros
        $sql = "INSERT INTO Niño (NombreNiño, ApellidoNiño, EdadNiño, TeléfonoFamiliar, Sacramento, NombreCatequista, Horiarios, NombreIglesia)
            VALUES ('?nombre', '?apellido', '?edad', '?telefono', '?Sacramento', '?Catequista', '?Horarios', '?Iglesia')";
        
        $stmt = $conn->prepare($sql);

        // Vincular parámetros
        $stmt->bindParam(1, $nombre, PDO::PARAM_STR);
        $stmt->bindParam(2, $apellido, PDO::PARAM_STR);
        $stmt->bindParam(3, $edad, PDO::PARAM_INT);
        $stmt->bindParam(4, $telefono, PDO::PARAM_INT);
        $stmt->bindParam(5, $Sacramento, PDO::PARAM_STR);
        $stmt->bindParam(6, $Catequista, PDO::PARAM_STR);
        $stmt->bindParam(7, $Horarios, PDO::PARAM_STR);
        $stmt->bindParam(8, $Iglesia, PDO::PARAM_STR);

        // Ejecutar la consulta
        $stmt->execute();

        echo "Datos guardados correctamente";
    } catch (PDOException $e) {
        echo "Error al ejecutar la consulta: " . $e->getMessage();
    } finally {
        // Cerrar la conexión
        $conn = null;
        header("location: matriculas.php");
    }
}
?>

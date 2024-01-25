<?php
include_once "conexion.php";

// Verificar si se proporciona un ID para eliminar el registro
if (isset($_GET["id_aula"])) {
    $id_aula = $_GET["id_aula"];

    try {
        // Obtener la conexión
        $conexion = Cconexion::ConexionBD();

        // Verificar si el aula existe antes de eliminar
        $verificar_sql = "SELECT SQL_CALC_FOUND_ROWS 1 FROM Aula WHERE id_aula = ?";
        $verificar_stmt = $conexion->prepare($verificar_sql);
        $verificar_stmt->bindParam(1, $id_aula, PDO::PARAM_INT);
        $verificar_stmt->execute();

        // Obtener el resultado de FOUND_ROWS()
        $found_rows_stmt = $conexion->query("SELECT FOUND_ROWS()");
        $existencia = $found_rows_stmt->fetchColumn();

        if ($existencia) {
            // Llamada al procedimiento almacenado para eliminar el aula
            $sql = "CALL EliminarAula(?)";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(1, $id_aula, PDO::PARAM_INT);
            $stmt->execute();

            // Redirigir después de la eliminación
            header("Location: aula.php");
            exit();
        } else {
            echo "El aula con ID $id_aula no existe.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        // Cerrar la conexión
        if ($conexion) {
            $conexion = null;
        }
    }
} else {
    echo "No se proporcionó un ID de aula para eliminar.";
}
?>

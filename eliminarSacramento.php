<?php
include_once "conexion.php";

// Verificar si se proporciona un ID para eliminar el registro
if (isset($_GET["id_sacramento"])) {
    $id_sacramento = $_GET["id_sacramento"];

    try {
        // Obtener la conexión
        $conexion = Cconexion::ConexionBD();

        // Verificar si el sacramento existe antes de eliminar
        $verificar_sql = "SELECT SQL_CALC_FOUND_ROWS 1 FROM Sacramento WHERE id_sacramento = ?";
        $verificar_stmt = $conexion->prepare($verificar_sql);
        $verificar_stmt->bindParam(1, $id_sacramento, PDO::PARAM_INT);
        $verificar_stmt->execute();

        // Obtener el resultado de FOUND_ROWS()
        $found_rows_stmt = $conexion->query("SELECT FOUND_ROWS()");
        $existencia = $found_rows_stmt->fetchColumn();

        if ($existencia) {
            // Llamada al procedimiento almacenado para eliminar el sacramento
            $sql = "CALL EliminarSacramento(?)";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(1, $id_sacramento, PDO::PARAM_INT);
            $stmt->execute();

            // Redirigir después de la eliminación
            header("Location: cursos.php");
            exit();
        } else {
            echo "El sacramento con ID $id_sacramento no existe.";
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
    echo "No se proporcionó un ID de sacramento para eliminar.";
}
?>

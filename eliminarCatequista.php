<?php
include_once "conexion.php";

function eliminarCatequista($idCatequista)
{
    $mensajeExito = '';
    $mensajeError = '';

    try {
        $conexion = Cconexion::ConexionBD();

        if (!$conexion) {
            throw new Exception("Error al establecer la conexión a la base de datos.");
        }

        // Mensaje de depuración
        $mensajeExito = "Eliminando el catequista ";

        $sql = "EXEC EliminarCatequista @IdCatequista=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(1, $idCatequista, PDO::PARAM_INT);
        $stmt->execute();

        $rowCount = $stmt->rowCount();

        if ($rowCount > 0) {
            $mensajeExito = "Registro de Catequista eliminado correctamente.";
        } else {
            $mensajeError = "";
        }

    } catch (PDOException $e) {
        $mensajeError = "Error al ejecutar la consulta: " . $e->getMessage();
    } catch (Exception $e) {
        $mensajeError = "Error: " . $e->getMessage();
    }

    // Mostrar mensajes al final del script
    echo "<script>";
    if ($mensajeExito !== '') {
        echo "alert('$mensajeExito');";
    }
    if ($mensajeError !== '') {
        echo "alert('$mensajeError');";
    }
    echo "window.location.href = 'catequista.php';"; // Redirige a la página de catequistas
    echo "</script>";
}

if (isset($_GET['id_catequista']) && is_numeric($_GET['id_catequista'])) {
    $idCatequista = $_GET['id_catequista'];
    eliminarCatequista($idCatequista);
}
?>
s
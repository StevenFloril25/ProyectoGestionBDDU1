<?php
include_once "conexion.php";

function eliminarPadre($idPadre)
{
    $mensajeExito = '';
    $mensajeError = '';

    try {
        $conexion = Cconexion::ConexionBD();

        if (!$conexion) {
            throw new Exception("Error al establecer la conexión a la base de datos.");
        }

        // Mensaje de depuración
        $mensajeExito = "Eliminando el padre ";

        $sql = "CALL EliminarPadre(?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(1, $idPadre, PDO::PARAM_INT);
        $stmt->execute();

        $rowCount = $stmt->rowCount();

        if ($rowCount > 0) {
            $mensajeExito = "Registro de Padre eliminado correctamente.";
        } else {
           // $mensajeError = "No se encontró ningún registro de Padre para eliminar.";
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
    echo "window.location.href = 'guias.php';"; // Redirige a la página de padres
    echo "</script>";
}   

if (isset($_GET['id_padre']) && is_numeric($_GET['id_padre'])) {
    $idPadre = $_GET['id_padre'];
    eliminarPadre($idPadre);
}
?>

<?php
include_once "conexion.php";

function eliminarCatequista($idCatequista)
{
    try {
        $conexion = Cconexion::ConexionBD();

        if (!$conexion) {
            throw new Exception("Error al establecer la conexión a la base de datos.");
        }

        // Mensaje de depuración
        echo "<script>alert('Eliminando catequista con ID: " . $idCatequista . "');</script>";

        $sql = "EXEC EliminarCatequista @IdCatequista=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(1, $idCatequista, PDO::PARAM_INT);
        $stmt->execute();

        $rowCount = $stmt->rowCount();

        if ($rowCount > 0) {
            echo "<script>
                    alert('Registro de Catequista eliminado correctamente.');
                    window.location.href = 'catequista.php'; // Redirige a la página de catequistas
                  </script>";
        } else {
            echo "<script>
                    alert('No se encontró el registro de Catequista para eliminar.');
                    window.location.href = 'catequista.php'; // Redirige a la página de catequistas
                  </script>";
        }

    } catch (PDOException $e) {
        echo "<script>
                alert('Error al ejecutar la consulta: " . $e->getMessage() . "');
                window.location.href = 'catequista.php';
              </script>";
    } catch (Exception $e) {
        echo "<script>
                alert('Error: " . $e->getMessage() . "');
                window.location.href = 'catequista.php';
              </script>";
    }
}

if (isset($_GET['id_catequista']) && is_numeric($_GET['id_catequista'])) {
    $idCatequista = $_GET['id_catequista'];
    eliminarCatequista($idCatequista);
}
?>


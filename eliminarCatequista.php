<?php
include_once "conexion.php";

function eliminarCatequista($idCatequista)
{
    // Obtener la conexión utilizando el método estático de la clase
    $conexion = Cconexion::ConexionBD();

    // Verificar si la conexión es válida antes de realizar la consulta
    if ($conexion) {
        try {
            // Preparar la llamada al procedimiento almacenado
            $sql = "EXEC EliminarCatequista @id_catequista=?";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(1, $idCatequista, PDO::PARAM_INT);

            // Ejecutar el procedimiento almacenado
            $stmt->execute();

            // Verificar si se afectaron filas (si se eliminó algún registro)
            $rowCount = $stmt->rowCount();

            if ($rowCount > 0) {
                echo "<script>
                        alert('Registro de catequista eliminado correctamente.');
                        window.location.href = 'catequista.php'; // Redirige a la misma página
                      </script>";
            } else {
                echo "<script>
                        alert('No se encontró el registro de catequista para eliminar.');
                        window.location.href = 'catequista.php'; // Redirige a la misma página
                      </script>";
            }
        } catch (PDOException $e) {
            echo "<script>
                    alert('Error al ejecutar la consulta: " . $e->getMessage() . "');
                    window.location.href = 'catequista.php'; // Redirige a la misma página
                  </script>";
        }
    } else {
        echo "<script>
                alert('Error al establecer la conexión a la base de datos.');
                window.location.href = 'catequista.php'; // Redirige a la misma página
              </script>";
    }
}

// Uso de la función de eliminación de Catequista
if (isset($_GET['id_catequista']) && is_numeric($_GET['id_catequista'])) {
    $idCatequista = $_GET['id_catequista'];
    eliminarCatequista($idCatequista);
}
?>

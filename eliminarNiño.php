<?php
include_once "conexion.php";

function eliminarNiño($idNiño)
{
    // Obtener la conexión utilizando el método estático de la clase
    $conexion = Cconexion::ConexionBD();

    // Verificar si la conexión es válida antes de realizar la consulta
    if ($conexion) {
        try {
            // Preparar la llamada al procedimiento almacenado
            $sql = "EXEC EliminarNiño @id_niño=?";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(1, $idNiño, PDO::PARAM_INT);

            // Ejecutar el procedimiento almacenado
            $stmt->execute();

            // Verificar si se afectaron filas (si se eliminó algún registro)
            $rowCount = $stmt->rowCount();

            if ($rowCount > 0) {
                echo "<script>
                        alert('Registro de niño eliminado correctamente.');
                        window.location.href = 'matriculas.php'; // Redirige a la misma página
                      </script>";
            } else {
                echo "<script>
                        alert('No se encontró el registro de niño para eliminar.');
                        window.location.href = 'matriculas.php'; // Redirige a la misma página
                      </script>";
            }
        } catch (PDOException $e) {
            echo "<script>
                    alert('Error al ejecutar la consulta: " . $e->getMessage() . "');
                    window.location.href = 'matriculas.php'; // Redirige a la misma página
                  </script>";
        }
    } else {
        echo "<script>
                alert('Error al establecer la conexión a la base de datos.');
                window.location.href = 'matriculas.php'; // Redirige a la misma página
              </script>";
    }
}

// Uso de la función de eliminación de Niño
if (isset($_GET['id_niño']) && is_numeric($_GET['id_niño'])) {
    $idNiño = $_GET['id_niño'];
    eliminarNiño($idNiño);
}
?>

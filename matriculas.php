<?php
include_once "conexion.php";

// Manejar el envío del formulario
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $edad = $_POST["edad"];
    $telefono = $_POST["telefono"];

    try {
        // Obtener la conexión
        $conexion = Cconexion::ConexionBD();

        // Preparar la llamada al procedimiento almacenado
        $sql = "EXEC InsertarNiño @nombre=?, @apellido=?, @edad=?, @telefonopadres=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(1, $nombre, PDO::PARAM_STR);
        $stmt->bindParam(2, $apellido, PDO::PARAM_STR);
        $stmt->bindParam(3, $edad, PDO::PARAM_INT);
        $stmt->bindParam(4, $telefono, PDO::PARAM_STR);

        // Ejecutar la consulta
        $stmt->execute();

        echo "";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        // Cerrar la conexión
        if ($conexion) {
            $conexion = null;
        }
    }
}

// Mostrar datos en la tabla
$conexion = Cconexion::ConexionBD();

if ($conexion) {
    $sql = "SELECT * FROM Niño";
    $resultado = $conexion->query($sql);
} else {
    echo "Error al cerrar la conexión";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Matrículas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>


    <!-- Spinner Start -->
    <!-- <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div> -->
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>Iglesia Central</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="parroquias.php" class="nav-item nav-link active">Parroquias</a>
                <a href="cursos.php" class="nav-item nav-link">Sacramentos</a>
                <a href="guias.php" class="nav-item nav-link">Guias Espirituales</a>
                <a href="vista.php" class="nav-item nav-link">Vista</a>

            </div>
            <a href="catequista.php" class="btn btn-secondary py-4 px-lg-5 d-none d-lg-block">CATEQUISTA</a>

            <a href="matriculas.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">MATRÍCULAS</a>

        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Matrículas</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- matriculas Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">matrículas</h6>
                <h1 class="mb-5">Niños Catecismo</h1>
            </div>

            <!-- Formulario Matricula -->
            <form id="persona-form" action="" method="POST" class="col-md-6 mx-auto"
                onsubmit="return validarFormulario()">

                <div class="row justify-content-center">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" pattern="[A-Za-z]+"
                                title="Ingresa solo letras" required>
                        </div>

                        <div class="col-md-6">
                            <label for="apellido" class="form-label">Apellido:</label>
                            <input type="text" id="apellido" name="apellido" class="form-control" pattern="[A-Za-z]+"
                                title="Ingresa solo letras" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="edad" class="form-label">Edad:</label>
                            <input type="number" id="edad" name="edad" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label for="telefono" class="form-label">Teléfono Familiar:</label>
                            <input type="text" id="telefono" name="telefono" class="form-control" pattern="[0-9]{10}"
                                title="Ingresa un número de 10 dígitos" required>
                        </div>
                    </div>
                </div>

                <div class="mb-3 text-center">
                    <button type="submit" name="submit" class="btn btn-info text-white m-2">Agregar</button>
                </div>
            </form>

            <script>
                function validarFormulario() {
                    var nombre = document.getElementById("nombre").value;
                    var apellido = document.getElementById("apellido").value;
                    var edad = document.getElementById("edad").value;
                    var telefono = document.getElementById("telefono").value;

                    // Validar que nombre y apellido contengan solo letras
                    var letras = /^[A-Za-z]+$/;
                    if (!nombre.match(letras) || !apellido.match(letras)) {
                        alert("Ingresa solo letras en Nombre y Apellido");
                        return false;
                    }

                    // Validar que la edad sea un número positivo y esté en el rango de 6 a 18 años
        if (isNaN(edad) || edad <= 0 || edad < 6 || edad > 18) {
            alert("Ingresa una edad válida en el rango de 6 a 18 años");
            return false;
        }

                    // Validar que el teléfono contenga solo números y tenga 10 dígitos
                    var numeros = /^[0-9]+$/;
                    if (!telefono.match(numeros) || telefono.length !== 10) {
                        alert("Ingresa un número de teléfono válido de 10 dígitos");
                        return false;
                    }

                    return true; // Si todas las validaciones pasan, permite enviar el formulario
                }
            </script>

            <!-- Mostrar los datos en la tabla -->
            <div class="table-responsive">
                <table id="tabla-personas" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Edad</th>
                            <th>Teléfono familiar</th>
                            <th class="text-center">Editar y Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="personas-list">
                        <?php
                        while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . $fila['nombre'] . "</td>";
                            echo "<td>" . $fila['apellido'] . "</td>";
                            echo "<td>" . $fila['edad'] . "</td>";
                            echo "<td>" . $fila['telefonopadres'] . "</td>";
                            echo "<td class='text-center'>";

                            // Botón Editar
                            echo "<a class='btn btn-info rounded-circle mx-1' href='editarNiño.php?id={$fila['id_niño']}' title='Editar'>
                    <i class='bi bi-journal text-light'></i>
                </a>";

                            // Botón Eliminar
                            echo "<a class='btn btn-secondary rounded-circle mx-1' href='eliminarNiño.php?id_niño={$fila['id_niño']}' 
                    onclick='return confirm(\"¿Estás seguro de que deseas eliminar este registro?\")' title='Eliminar'>
                    <i class='bi bi-x text-light'></i>
                </a>";

                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- matriculas End -->
            <!-- Footer Start -->
            <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="container py-5">
                </div>
            </div>
            <!-- Footer End -->


            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


            <!-- JavaScript Libraries -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="lib/wow/wow.min.js"></script>
            <script src="lib/easing/easing.min.js"></script>
            <script src="lib/waypoints/waypoints.min.js"></script>
            <script src="lib/owlcarousel/owl.carousel.min.js"></script>

            <!-- Template Javascript -->
            <script src="js/main.js"></script>
</body>

</html>

<?php
$conexionBD = null;
?>
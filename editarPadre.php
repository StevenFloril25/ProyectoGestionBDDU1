<?php
include_once "conexion.php";

// Procesar el formulario de edición
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    $id_padre = isset($_POST["id_padre"]) ? intval($_POST["id_padre"]) : 0;
    $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
    $apellido = isset($_POST["apellido"]) ? trim($_POST["apellido"]) : "";
    $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : "";
    $correo_electronico = isset($_POST["correo"]) ? trim($_POST["correo"]) : "";
    $id_iglesia = isset($_POST["iglesia"]) ? intval($_POST["iglesia"]) : 0;

    // Validar campos obligatorios
    if ($id_padre <= 0 || empty($nombre) || empty($apellido) || empty($telefono)) {
        echo "Error: Los campos Nombre, Apellido y Teléfono son obligatorios.";
        exit();
    }

    try {
        // Obtener la conexión
        $conexion = Cconexion::ConexionBD();

        // Verificar existencia del padre
        $verificar_sql = "SELECT 1 FROM Padre WHERE id_padre = ?";
        $verificar_stmt = $conexion->prepare($verificar_sql);
        $verificar_stmt->bindParam(1, $id_padre, PDO::PARAM_INT);
        $verificar_stmt->execute();

        if ($verificar_stmt->fetchColumn()) {
            // Preparar y ejecutar la consulta de actualización
            $sql = "UPDATE Padre SET nombre = ?, apellido = ?, telefono = ?, correo_electronico = ?, id_iglesia = ? WHERE id_padre = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(1, $nombre, PDO::PARAM_STR);
            $stmt->bindParam(2, $apellido, PDO::PARAM_STR);
            $stmt->bindParam(3, $telefono, PDO::PARAM_STR);
            $stmt->bindParam(4, $correo_electronico, PDO::PARAM_STR);
            $stmt->bindParam(5, $id_iglesia, PDO::PARAM_INT);
            $stmt->bindParam(6, $id_padre, PDO::PARAM_INT);
            $stmt->execute();

            // Redirigir al usuario después de la actualización
            header("Location: guias.php?id_padre=$id_padre"); // Cambié la URL a guiapadre.php, ajusta según tu estructura
            exit();
        } else {
            echo "El padre con ID $id_padre no existe.";
        }
    } catch (PDOException $e) {
        echo "Error: Se produjo un problema al procesar la solicitud. Por favor, inténtalo de nuevo más tarde.";
        error_log("Error en editarPadre.php: " . $e->getMessage());
    } finally {
        // Cerrar la conexión
        if ($conexion) {
            $conexion = null;
        }
    }
}

// Obtener el ID del padre a editar desde la URL
if (isset($_GET["id_padre"])) {
    $id_padre = intval($_GET["id_padre"]);
    $conexion = Cconexion::ConexionBD();

    if ($conexion) {
        // Consultar los datos del padre a editar
        $sql = "SELECT * FROM Padre WHERE id_padre = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(1, $id_padre, PDO::PARAM_INT);
        $stmt->execute();
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$fila) {
            echo "El padre con ID $id_padre no existe.";
            exit();
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Padre</title>
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
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="cursos.php" class="nav-item nav-link">Sacramentos</a>
            <a href="vista.php" class="nav-item nav-link">Búsqueda</a>
            <div class="nav-item dropdown">
                <a href="#" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block" id="matriculaDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Matrícula</a>
                <div class="dropdown-menu" aria-labelledby="matriculaDropdown">
                    <a href="catequista.php" class="dropdown-item">CATEQUISTA</a>
                    <a href="matriculas.php" class="dropdown-item">MATRÍCULAS</a>
                    <a href="guias.php" class="dropdown-item">Guias Espirituales</a>
                    <a href="parroquias.php" class="dropdown-item">Parroquias</a>
                </div>
            </div>

        </div>
    </div>
    <!-- Navbar End -->
    <!-- Header Start -->
    <div class="container-fluid bg-dark">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <br><br>
                    <h1 class="mb-5 text-white">Padres.</h1>
                    <nav aria-label="breadcrumb">

                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- matriculas Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">padres</h6>
                <h1 class="mb-5">Ingreso Padres</h1>
            </div>

            <!-- Formulario Edición Padre -->
            <form id="editar-form" action="editarPadre.php" method="POST" class="col-md-6 mx-auto"
                onsubmit="return validarFormulario()">
                <!-- Campos del formulario -->
                <input type="hidden" name="id_padre" value="<?php echo $id_padre; ?>">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" pattern="[A-Za-z]+"
                            title="Ingresa solo letras" value="<?php echo htmlspecialchars($fila['nombre']); ?>"
                            required>
                    </div>
                    <div class="col-md-6">
                        <label for="apellido" class="form-label">Apellido:</label>
                        <input type="text" id="apellido" name="apellido" class="form-control" pattern="[A-Za-z]+"
                            title="Ingresa solo letras" value="<?php echo htmlspecialchars($fila['apellido']); ?>"
                            required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="telefono" class="form-label">Teléfono:</label>
                        <input type="text" id="telefono" name="telefono" class="form-control" pattern="[0-9]{10}"
                            title="Ingresa un número de 10 dígitos y no negativos"
                            value="<?php echo htmlspecialchars($fila['telefono']); ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="iglesia" class="form-label">Iglesia:</label>
                        <input type="text" id="iglesia" name="iglesia" class="form-control" pattern="[0-9]+"
                            title="Ingresa solo el número del ID"
                            value="<?php echo htmlspecialchars($fila['id_iglesia']); ?>" required>
                    </div>
                    <div class="col-md-12">
                        <label for="correo" class="form-label">Correo Electrónico:</label>
                        <input type="text" id="correo" name="correo" class="form-control"
                            value="<?php echo htmlspecialchars($fila['correo_electronico']); ?>"
                            title="Ingresa el correo electrónico" required>
                    </div>
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" name="submit" class="btn btn-info text-white m-2">Actualizar Padre</button>
                </div>
            </form>
        </div>
    </div>
    </div>



    <!-- matriculas End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <!-- Primera fila -->
            <div class="row g-5">
                <!-- Columna 1 -->
                <div class="col-lg-3 col-md-6 text-center">
                    <h4 class="text-white mb-3">ACCESO RAPIDO</h4>
                    <a class="btn btn-link" href="parroquias.php">Parroquias</a>
                    <a class="btn btn-link" href="cursos.php">Sacramentos</a>
                    <a class="btn btn-link" href="guias.php">Guias Espirituales</a>
                </div>
                <!-- Columna 2 -->
                <div class="col-lg-3 col-md-6 text-center">
                    <br> <br>
                    <a class="btn btn-link" href="vista.php">Búsqueda</a>
                    <a class="btn btn-link" href="catequista.php">Catequistas</a>
                    <a class="btn btn-link" href="matriculas.php">Matriculas</a>
                </div>
                <!-- Columna 3 -->
                <!-- Aquí se incluirá la nueva sección para la cruz sin fondo -->
                <div class="col-lg-6 col-md-12 text-end">
                    <span class="fa-stack fa-lg">
                        <i class="fas fa-circle fa-stack-2x" style="color: transparent;"></i>
                        <i class="fas fa-cross fa-stack-1x" style="color: white; font-size: 3rem;"></i>
                    </span>
                </div>
                <!-- Fin de la nueva sección para la cruz sin fondo -->
            </div>
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
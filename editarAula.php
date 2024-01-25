<?php
include_once "conexion.php";

// Manejar el envío del formulario de edición
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    $id_aula = $_POST["id_aula"];
    $nombre_aula = $_POST["nombre_aula"];
    $capacidad_aula = $_POST["capacidad_aula"];

    try {
        // Obtener la conexión
        $conexion = Cconexion::ConexionBD();

        // Verificar si el aula existe antes de actualizar
        $verificar_sql = "SELECT SQL_CALC_FOUND_ROWS 1 FROM Aula WHERE id_aula = ?";
        $verificar_stmt = $conexion->prepare($verificar_sql);
        $verificar_stmt->bindParam(1, $id_aula, PDO::PARAM_INT);
        $verificar_stmt->execute();

        // Obtener el resultado de FOUND_ROWS()
        $found_rows_stmt = $conexion->query("SELECT FOUND_ROWS()");
        $existencia = $found_rows_stmt->fetchColumn();

        if ($existencia) {
            // Preparar la llamada al procedimiento almacenado
            $sql = "CALL ActualizarAula(?, ?, ?)";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(1, $id_aula, PDO::PARAM_INT);
            $stmt->bindParam(2, $nombre_aula, PDO::PARAM_STR);
            $stmt->bindParam(3, $capacidad_aula, PDO::PARAM_INT);

            // Ejecutar la consulta
            $stmt->execute();

            // Redirigir después de la edición
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
}

// Verificar si se proporciona un ID para editar el registro
if (isset($_GET["id_aula"])) {
    $id_aula = $_GET["id_aula"];
    $conexion = Cconexion::ConexionBD();

    if ($conexion) {
        $sql = "SELECT * FROM Aula WHERE id_aula = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(1, $id_aula, PDO::PARAM_INT);
        $stmt->execute();
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            // Mostrar el formulario de edición
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Editar Aula</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
</head>

<body>
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
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="parroquias.php" class="nav-item nav-link active">Parroquias</a>
                    <a href="cursos.php" class="nav-item nav-link">Sacramentos</a>
                    <a href="guias.php" class="nav-item nav-link">Guias Espirituales</a>
                    <a href="vista.php" class="nav-item nav-link">Búsqueda</a>
                </div>
                <a href="catequista.php" class="btn btn-secondary py-4 px-lg-5 d-none d-lg-block">CATEQUISTA</a>

                <a href="matriculas.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">MATRÍCULAS<i
                        class="fa fa-arrow-right ms-3"></i></a>

            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Header Start -->
        <!-- Header Start -->
        <div class="container-fluid bg-dark">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <br><br>
                        <h1 class="mb-5 text-white">Editar Aula.</h1>
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
                    <h6 class="section-title bg-white text-center text-primary px-3">edición</h6>
                    <h1 class="mb-5">Aula</h1>
                </div>
                <!-- Formulario de edición -->
                <form id="editar-form" action="editarAula.php" method="POST" class="col-md-6 mx-auto">
                    <!-- Campo oculto para almacenar el ID del aula -->
                    <input type="hidden" name="id_aula" value="<?php echo $id_aula; ?>">

                    <!-- Campos del formulario -->
                    <!-- Campos del formulario -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nombre_aula" class="form-label">Nombre del Aula:</label>
                            <input type="text" id="nombre_aula" name="nombre_aula" class="form-control" required
                                pattern="^[A-Za-záéíóúÁÉÍÓÚüÜñÑ\d\s]+$" title="Ingrese solo letras, números y espacios"
                                value="<?php echo $fila['nombre_aula']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="capacidad_aula" class="form-label">Capacidad del Aula:</label>
                            <input type="number" id="capacidad_aula" name="capacidad_aula" class="form-control" required
                                min="20" max="35" pattern="\d+" title="Ingrese solo números positivos entre 20 y 35"
                                value="<?php echo $fila['capacidad']; ?>">
                        </div>
                    </div>

                    <!-- Botón para enviar el formulario -->
                    <div class="mb-3 text-center">
                        <button type="submit" name="submit" class="btn btn-info text-white m-2">Actualizar</button>
                    </div>
                </form>



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
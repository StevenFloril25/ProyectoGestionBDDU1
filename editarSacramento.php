<?php
include_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    $idSacramento = $_GET["id"];

    // Obtener la conexión
    $conexion = Cconexion::ConexionBD();

    try {
        // Preparar la consulta para obtener los datos del sacramento por su ID
        $sql = "SELECT * FROM Sacramento WHERE id_sacramento = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(1, $idSacramento, PDO::PARAM_INT);
        $stmt->execute();

        // Obtener los datos del sacramento
        $datosSacramento = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        // Cerrar la conexión
        if ($conexion) {
            $conexion = null;
        }
    }
} else {
    // Redireccionar a la página principal si no se proporciona un ID válido
    header("Location: cursos.php");
    exit();
}

// Manejar el envío del formulario de edición
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    // Verificar si los datos del formulario están definidos
    if (isset($_POST["nombre_sacramento"]) && isset($_POST["descripcion_sacramento"])) {
        // Obtener los datos del formulario
        $nombreSacramento = $_POST["nombre_sacramento"];
        $descripcionSacramento = $_POST["descripcion_sacramento"];

        // Obtener la conexión
        $conexion = Cconexion::ConexionBD();

        try {
            // Preparar la llamada al procedimiento almacenado para editar el sacramento
            $sqlEditar = "CALL EditarSacramento(?, ?, ?)";
            $stmtEditar = $conexion->prepare($sqlEditar);
            $stmtEditar->bindParam(1, $idSacramento, PDO::PARAM_INT);
            $stmtEditar->bindParam(2, $nombreSacramento, PDO::PARAM_STR);
            $stmtEditar->bindParam(3, $descripcionSacramento, PDO::PARAM_STR);

            // Ejecutar la consulta
            $stmtEditar->execute();

            // Redireccionar a la página principal después de la edición
            header("Location: cursos.php");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            // Cerrar la conexión
            if ($conexion) {
                $conexion = null;
            }
        }
    } else {
        echo "Error: Los datos del formulario son nulos.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Editar Sacramento</title>
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
                    <a href="vista.php" class="nav-item nav-link">Búsqueda</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block" id="matriculaDropdown"
                            role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">REGISTROS</a>
                        <div class="dropdown-menu w-100" aria-labelledby="matriculaDropdown">
                            <a href="aula.php" class="dropdown-item">Aulas</a>
                            <a href="catequista.php" class="dropdown-item">Catequistas</a>
                            <a href="matriculas.php" class="dropdown-item">Niños</a>
                            <a href="guias.php" class="dropdown-item">Padres</a>
                            <a href="parroquias.php" class="dropdown-item">Parroquias</a>
                            <a href="cursos.php" class="dropdown-item">Sacramentos</a>
                        </div>
                    </div>
                </div>
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
                        <h1 class="mb-5 text-white">Editar Sacramento.</h1>
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
                    <h1 class="mb-5">Sacramento</h1>
                </div>

                <!-- Formulario para editar Sacramento -->
                <form id="editar-sacramento-form" action="editarSacramento.php?id=<?php echo $idSacramento; ?>"
                    method="POST" class="col-md-6 mx-auto">
                    <!-- Campos del formulario con los valores actuales del sacramento -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nombre_sacramento" class="form-label">Nombre Sacramento:</label>
                            <input type="text" id="nombre_sacramento" name="nombre_sacramento" class="form-control"
                                required
                                value="<?php echo isset($datosSacramento['nombre']) ? $datosSacramento['nombre'] : ''; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="descripcion_sacramento" class="form-label">Descripción Sacramento:</label>
                            <input type="text" id="descripcion_sacramento" name="descripcion_sacramento"
                                class="form-control" required
                                value="<?php echo isset($datosSacramento['descripcion']) ? $datosSacramento['descripcion'] : ''; ?>">
                        </div>
                    </div>
                    <!-- Botón para enviar el formulario -->
                    <div class="mb-3 text-center">
                        <button type="submit" name="submit" class="btn btn-info text-white m-2">Actualizar</button>
                    </div>
                </form>


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
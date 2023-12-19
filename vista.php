<?php
include_once "conexion.php";

$resultados = array();

// Verificar si se ha enviado un nombre de búsqueda
if (isset($_GET['nombreBusqueda'])) {
    $nombreBusqueda = $_GET['nombreBusqueda'];

    try {
        $conexion = Cconexion::ConexionBD();

        if (!$conexion) {
            throw new Exception("Error al establecer la conexión a la base de datos.");
        }

        // Consulta para buscar por nombre en la vista
        $sql = "SELECT * FROM vista_Catequista WHERE nombre_catequista LIKE :nombreBusqueda";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(':nombreBusqueda', "%$nombreBusqueda%", PDO::PARAM_STR);
        $stmt->execute();

        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Error de PDO: " . $e->getMessage();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

$conexionBD = null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Busqueda </title>
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
                </div>
                <a href="catequista.php" class="btn btn-secondary py-4 px-lg-5 d-none d-lg-block">CATEQUISTA</a>

                <a href="matriculas.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">MATRÍCULAS<i
                        class="fa fa-arrow-right ms-3"></i></a>

            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Header Start -->
        <div class="container-fluid bg-primary py-5 mb-5 page-header">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <h1 class="display-3 text-white animated slideInDown">Búsqueda Catequista</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- matriculas Start -->
        <!-- Contenido de la tabla -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center">
                    <h6 class="section-title bg-white text-center text-primary px-3">buscar</h6>
                    <h1 class="mb-5">Búsqueda</h1>
                </div>

                <form action="vista.php" method="GET">
                    <div class="mb-3">
                        <label for="nombreBusqueda" class="form-label">Buscar por nombre:</label>
                        <input type="text" class="form-control" id="nombreBusqueda" name="nombreBusqueda"
                            placeholder="Ingrese el nombre">
                    </div>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </form>

                <?php if (!empty($resultados)): ?>
                    <!-- Mensaje de depuración -->
                    <BR></BR>
                    <p>Número de resultados:
                        <?php echo count($resultados); ?>
                    </p>

                    <!-- Mostrar resultados en una tabla -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Teléfono</th>
                                <th>Iglesia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($resultados as $fila): ?>
                                <tr>
                                    <td>
                                        <?php echo $fila['id_catequista']; ?>
                                    </td>
                                    <td>
                                        <?php echo $fila['nombre_catequista']; ?>
                                    </td>
                                    <td>
                                        <?php echo $fila['apellido']; ?>
                                    </td>
                                    <td>
                                        <?php echo $fila['telefono']; ?>
                                    </td>
                                    <td>
                                        <?php echo $fila['nombre_iglesia']; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
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
<?php
include_once "conexion.php";

// Manejar el envío del formulario
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit_aula"])) {
    $nombre_aula = isset($_POST["nombre_aula"]) ? trim($_POST["nombre_aula"]) : "";
    $capacidad_aula = isset($_POST["capacidad_aula"]) ? intval(trim($_POST["capacidad_aula"])) : 0;

    // Validar que los campos requeridos no estén vacíos
    if (empty($nombre_aula) || $capacidad_aula <= 0) {
        echo "Error: Los campos Nombre del Aula y Capacidad son obligatorios.";
        exit();
    }

    try {
        // Obtener la conexión
        $conexion = Cconexion::ConexionBD();

        // Preparar la llamada al procedimiento almacenado
        $sql = "CALL InsertarAula(?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(1, $nombre_aula, PDO::PARAM_STR);
        $stmt->bindParam(2, $capacidad_aula, PDO::PARAM_INT);
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

// Mostrar datos en la tabla de Aulas
$conexion = Cconexion::ConexionBD();

if ($conexion) {
    $sql = "SELECT * FROM Aula";
    $resultado_aulas = $conexion->query($sql);
} else {
    echo "Error al cerrar la conexión";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Aulas</title>
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
                    <h1 class="mb-5 text-white">Aulas.</h1>
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
                <h6 class="section-title bg-white text-center text-primary px-3">aulas</h6>
                <h1 class="mb-5">Ingreso Aulas</h1>
            </div>

            <form id="aula-form" action="aula.php" method="POST" class="col-md-6 mx-auto"
                onsubmit="return validarFormularioAula()">
                <!-- Campos del formulario -->
                <!-- Campos del formulario -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nombre_aula" class="form-label">Nombre del Aula:</label>
                        <input type="text" id="nombre_aula" name="nombre_aula" class="form-control" required
                            pattern="^[A-Za-záéíóúÁÉÍÓÚüÜñÑ\d\s]+$" title="Ingrese solo letras, números y espacios">
                    </div>
                    <div class="col-md-6">
                        <label for="capacidad_aula" class="form-label">Capacidad del Aula:</label>
                        <input type="number" id="capacidad_aula" name="capacidad_aula" class="form-control" required
                            min="20" max="35" pattern="\d+" title="Ingrese solo números positivos entre 20 y 35">
                    </div>
                </div>

                <div class="mb-3 text-center">
                    <button type="submit" name="submit_aula" class="btn btn-info text-white m-2">Agregar Aula</button>
                </div>
            </form>

            <!-- Mostrar los datos en la tabla de Aulas -->
            <div class="table-responsive">
                <table id="tabla-aula" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID Aula</th>
                            <th>Nombre del Aula</th>
                            <th>Capacidad</th>
                            <!-- Puedes añadir más columnas según tus necesidades -->
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="aula-list">
                        <?php
                        // Verificar si hay resultados antes de mostrar la tabla
                        if ($resultado_aulas) {
                            while ($fila_aula = $resultado_aulas->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>" . $fila_aula['id_aula'] . "</td>";
                                echo "<td>" . $fila_aula['nombre_aula'] . "</td>";
                                echo "<td>" . $fila_aula['capacidad'] . "</td>";
                                // Puedes añadir más columnas según tus necesidades
                        
                                // Botón Editar
                                echo "<td class='text-center'>";
                                echo "<a class='btn btn-info rounded-circle mx-1' href='editarAula.php?id_aula={$fila_aula['id_aula']}' title='Editar'>
                        <i class='bi bi-journal text-light'></i>
                    </a>";

                                // Botón Eliminar
                                echo "<a class='btn btn-secondary rounded-circle mx-1' href='eliminarAula.php?id_aula={$fila_aula['id_aula']}' 
                        onclick='return confirm(\"¿Estás seguro de que deseas eliminar este registro?\")' title='Eliminar'>
                        <i class='bi bi-x text-light'></i>
                    </a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No hay aulas registradas.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
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
<?php
include_once "conexion.php";

// Manejar el envío del formulario
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    // Obtener los datos del formulario
    $horario = $_POST["Horario"];
    $id_niño = $_POST["Niño"];
    $id_aula = $_POST["Aula"];
    $id_sacramento = $_POST["Sacramento"];
    $id_catequista = $_POST["Catequista"];

    try {
        // Obtener la conexión
        $conexion = Cconexion::ConexionBD();

        // Preparar la llamada al procedimiento almacenado
        $sql = "EXEC InsertarAsistencia @horario=?, @id_niño=?, @id_aula=?, @id_sacramento=?, @id_catequista=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(1, $horario, PDO::PARAM_STR);
        $stmt->bindParam(2, $id_niño, PDO::PARAM_INT);
        $stmt->bindParam(3, $id_aula, PDO::PARAM_INT);
        $stmt->bindParam(4, $id_sacramento, PDO::PARAM_INT);
        $stmt->bindParam(5, $id_catequista, PDO::PARAM_INT);

        // Ejecutar la consulta
        $stmt->execute();

        echo "Asistencia agregada correctamente";
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
    $sql = "SELECT * FROM Asistencia";
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
            </div>
            <a href="asistencia.php" class="btn btn-secondary py-4 px-lg-5 d-none d-lg-block">ASISTENCIA</a>

            <a href="matriculas.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">MATRÍCULAS</a>

        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Asistencia</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- matriculas Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">asistencia</h6>
                <h1 class="mb-5">Asitencia Catecismo</h1>
            </div>

            <!-- Formulario Matricula -->
            <form id="persona-form" action="" method="POST" class="col-md-6 mx-auto">

                <div class="row justify-content-center">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="Horario" class="form-label">Horario:</label>
                            <select id="Horario" name="Horario" class="form-select" required>
                                <option value="horario1">Viernes 4:00 PM</option>
                                <option value="horario2">Sábado 2:00 PM</option>
                                <option value="horario3">Domingo 10:00 AM</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="Niño" class="form-label">Niño:</label>
                            <select id="Niño" name="Niño" class="form-select" required>
                                <option value="1"> </option>
                                <option value="2"> </option>
                                <option value="3"> </option>
                            </select>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="Sacramento" class="form-label">Sacramento:</label>
                                <select id="Sacramento" name="Sacramento" class="form-select" required>
                                    <option value="Sacramento1">Año bíblico</option>
                                    <option value="Sacramento2">Comunión</option>
                                    <option value="Sacramento3">Confirmación</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="Aula" class="form-label">Aula:</label>
                                <select id="Aula" name="Aula" class="form-select" required>
                                    <option value="aula1">Salón 101</option>
                                    <option value="aula2">Salón 102</option>
                                    <option value="aula3">Salón 103</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="Catequista" class="form-label">Catequista:</label>
                                <select id="Catequista" name="Catequista" class="form-select" required>
                                    <option value="Catequista1">Carlos Ruiz</option>
                                    <option value="Catequista2">Laura Fernandéz</option>
                                    <option value="Catequista3">Pedro Díaz</option>
                                    <option value="Catequista4">Isabel Sánchez</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 text-center">
                            <button type="submit" name="submit" class="btn btn-info text-white m-2">Agregar</button>

                        </div>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table id="tabla-asistencia" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Horario</th>
                            <th>ID Niño</th>
                            <th>ID Aula</th>
                            <th>ID Sacramento</th>
                            <th>ID Catequista</th>
                            <!-- Agrega más columnas según sea necesario -->
                            <th class="text-center">Editar y Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="asistencia-list">
                        <?php
                        while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . $fila['horario'] . "</td>";
                            echo "<td>" . $fila['id_niño'] . "</td>";
                            echo "<td>" . $fila['id_aula'] . "</td>";
                            echo "<td>" . $fila['id_sacramento'] . "</td>";
                            echo "<td>" . $fila['id_catequista'] . "</td>";
                            echo "<td class='text-center'>";

                            // Botón Editar (debes adaptarlo a la nueva estructura de la tabla)
                            echo "<a class='btn btn-info rounded-circle mx-1' href='editarAsistencia.php?id={$fila['id_asistencia']}' title='Editar'>
                    <i class='bi bi-journal text-light'></i>
                </a>";

                            // Botón Eliminar (debes adaptarlo a la nueva estructura de la tabla)
                            echo "<a class='btn btn-secondary rounded-circle mx-1' href='eliminarAsistencia.php?id_asistencia={$fila['id_asistencia']}' 
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
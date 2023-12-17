!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>eLEARNING - eLearning HTML Template</title>
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
    <?php
    include_once("conexion.php");
    // Crea una instancia de la clase Cconexion
    $conexion = new Cconexion();
    // Llama al método ConexionBD en la instancia creada
    $conexion->ConexionBD();

    // Tu consulta SQL
    $consulta = "SELECT * FROM datosNiños";

    // Ejecutar la consulta
    $resultado = sqlsrv_query($Cconexion, $consulta);
    ?>
    
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
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
            <form id="persona-form" action="registro.php" method="POST" class="col-md-6 mx-auto">

                <h3 class="text-center"></h3>

                <div class="row justify-content-center">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label for="apellido" class="form-label">Apellido:</label>
                            <input type="text" id="apellido" name="apellido" class="form-control" required>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="edad" class="form-label">Edad:</label>
                            <input type="number" id="edad" name="edad" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label for="telefono" class="form-label">Teléfono Familiar:</label>
                            <input type="number" id="telefono" name="telefono" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="Sacramento" class="form-label">Sacramento:</label>
                            <select id="Sacramento" name="Sacramento" class="form-select" required>
                                <option value=""></option>
                                <option value="Uno">Año Bíblico</option>
                                <option value="Dos">Comunión</option>
                                <option value="Tres">Confirmación</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="Catequista" class="form-label">Catequista:</label>
                            <select id="Catequista" name="Catequista" class="form-select" required>
                                <option value=""></option>
                                <option value="Nombre1">Carlos Ruiz</option>
                                <option value="Nombre2">Laura Fernández</option>
                                <option value="Nombre3">Pedro Díaz</option>
                                <option value="Nombre4">Isabel Sánches</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="Horarios" class="form-label">Horarios:</label>
                            <select id="Horarios" name="Horarios" class="form-select" required>
                                <option value=""></option>
                                <option value="Horario1">Viernes 4:00 PM</option>
                                <option value="Horario2">Sábado 2:00 PM</option>
                                <option value="Horario3">Domingo 10:00 AM</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="Iglesia" class="form-label">Iglesia:</label>
                            <select id="Iglesia" name="Iglesia" class="form-select" required>
                                <option value=""></option>
                                <option value="Iglesia1">Parroquia San Juan</option>
                                <option value="Iglesia2">Iglesia Santa María</option>
                                <option value="Iglesia3">Capilla San José</option>
                                <option value="Iglesia4">Parroquia de la Resurrección</option>
                            </select>
                        </div>

                    </div>
                </div>
        </div>

        <span id="mensaje-error-edad"></span>

        <div class="mb-3 text-center">
            <button type="button" class="btn btn-info text-white m-2">Agregar</button>
            <button type="button" class="btn btn-info text-white m-2">Editar</button>
            <button type="button" class="btn btn-info text-white m-2">Eliminar</button>
        </div>
        </form>

        <!-- Mostrar los datos en la tabla -->
        <table id="tabla-personas">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>Teléfono familiar</th>
                    <th>Sacramento</th>
                    <th>Catequista</th>
                    <th>Horarios</th>
                    <th>Iglesia</th>
                </tr>
            </thead>
            <tbody id="personas-list">
                <?php
                while ($columna = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>" . $columna['Nombre'] . "</td>";
                    echo "<td>" . $columna['Apellido'] . "</td>";
                    echo "<td>" . $columna['Edad'] . "</td>";
                    echo "<td>" . $columna['Telefono familiar'] . "</td>";
                    echo "<td>" . $columna['Sacramento'] . "</td>";
                    echo "<td>" . $columna['Catequista'] . "</td>";
                    echo "<td>" . $columna['Horarios'] . "</td>";
                    echo "<td>" . $columna['Iglesia'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

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
$conn->close();
?>
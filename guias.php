<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Proyecto Gestion BDD</title>
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
                <a href="cursos.php" class="nav-item nav-link">Sacramentos</a>
                <a href="vista.php" class="nav-item nav-link">Búsqueda</a>
                <div class="nav-item dropdown">
                    <a href="#" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block" id="matriculaDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Matrícula</a>
                    <div class="dropdown-menu" aria-labelledby="matriculaDropdown">
                        <a href="catequista.php" class="dropdown-item">CATEQUISTA</a>
                        <a href="matriculas.php" class="dropdown-item">MATRÍCULAS</a>
                        <a href="guias.php" class="dropdown-item">Guias Espirituales</a>
                        <a href="parroquias.php" class="dropdown-item">Parroquias</a>
                    </div>
                </div>
                
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


   <!-- Header Start -->
   <div class="container-fluid bg-dark">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <br><br>
                        <h1 class="mb-5 text-white">Guías Espirituales</h1>
                        <nav aria-label="breadcrumb">

                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->



    <!-- guias Start -->
    <div class="container-xxl py-5">
  <div class="container">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
      <h6 class="section-title bg-white text-center text-primary px-3">Iglesia Central</h6>
      <h1 class="mb-5">Maestros de la fe.</h1>
    </div>
    <div class="row g-4">
      <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
        <div class="guias-item bg-light">
          <div class="overflow-hidden">
            <img class="img-fluid rounded" style="width: 200px; height: 200px;" src="img/padre6.jpg" alt="">
          </div>
          <div class="text-center p-4">
            <h5 class="mb-0">Juan Pérez</h5>
            <small>096 324 3558</small>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="guias-item bg-light">
          <div class="overflow-hidden">
            <img class="img-fluid rounded" style="width: 200px; height: 200px;" src="img/w1.jpg" alt="">
          </div>
          <div class="text-center p-4">
            <h5 class="mb-0">María Gómez</h5>
            <small>095 147 8563</small>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
        <div class="team-item bg-light">
          <div class="overflow-hidden">
            <img class="img-fluid rounded" style="width: 200px; height: 200px;" src="img/padre4.jpg" alt="">
          </div>
          <div class="text-center p-4">
            <h5 class="mb-0">José López</h5>
            <small>099 665 1221</small>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
        <div class="team-item bg-light">
          <div class="overflow-hidden">
            <img class="img-fluid rounded" style="width: 200px; height: 200px;" src="img/w3.png" alt="">
          </div>
          <div class="text-center p-4">
            <h5 class="mb-0">Ana Martínez</h5>
            <small>096 314 3032</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

    <!-- team End -->


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
                    <a class="btn btn-link" href="guias.php">Búsqueda</a>
                </div>
                <!-- Columna 2 -->
                <div class="col-lg-3 col-md-6 text-center">
                    <br> <br>
                    <a class="btn btn-link" href="vista.php">Vista</a>
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
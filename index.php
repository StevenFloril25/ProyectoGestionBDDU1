<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Inicio</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="img/favicon.ico" rel="icon">
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
                <a href="vista.php" class="nav-item nav-link">Búsqueda</a>

            </div>
            <a href="catequista.php" class="btn btn-secondary py-4 px-lg-5 d-none d-lg-block">CATEQUISTA</a>
            <a href="matriculas.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">MATRÍCULAS</a>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/catequesisIn.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h1 class="display-3 text-white animated slideInDown">B I E N V E N I D O S
                                </h1>
                                <BR></BR>
                                <h3 class="text-primary text-uppercase mb-3 animated slideInDown">Salmo 121:7-8</h3>
                                <p class="fs-5 text-white mb-4 pb-2">El Señor te protegerá;
                                    de todo mal protegerá tu vida.
                                    El Señor te cuidará en el hogar y en el camino,
                                    desde ahora y para siempre.
                                    (Salmo 121:7-8).</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/catequesisInicio.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h1 class="display-3 text-white animated slideInDown">B I E N V E N I D O S
                                </h1>
                                <BR></BR>

                                <h3 class="text-primary text-uppercase mb-3 animated slideInDown">Salmo 34:5-7</h3>
                                <p class="fs-5 text-white mb-4 pb-2">Radiantes están los que a él acuden; jamás su
                                    rostro se cubre de vergüenza. Este pobre clamó, y el Señor le oyó y lo libró de
                                    todas sus angustias. El ángel del Señor acampa en torno a los que le temen; a su
                                    lado está para librarlos. (Salmo 34:5-7).</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->



    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-church text-primary mb-4"></i>
                            <h5 class="mb-3">Encuentra una parroquia cerca</h5>
                            <p>Descubre nuestras parroquias locales y encuentra un lugar para conectarte espiritualmente
                                en tu comunidad y así obtener el mayor de los conocimientos.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-book text-primary mb-4"></i>
                            <h5 class="mb-3">Sacramentos</h5>
                            <p>Explora nuestra variedad de cursos para tu desarrollo espiritual. Desde el estudio
                                bíblico hasta la preparación para sacramentos, ofrecemos programas que enriquecerán tu
                                fe.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-users text-primary mb-4"></i>
                            <h5 class="mb-3">Guias Espirituales</h5>
                            <p>Explora nuestros expertos instructores dedicados a guiarte en tu camino espiritual.
                                Conoce a quienes lideran nuestras clases y comparten su sabiduría y experiencia contigo.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Service End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/about.jpg" alt=""
                            style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">Información</h6>
                    <h1 class="mb-4">¿Qué es la catequesis?</h1>
                    <p class="mb-4 text-justify justify-content">
                        La catequesis es un proceso de formación espiritual que nos ayuda a conocer a Cristo y a vivir
                        su mensaje. A través de la catequesis, los niños y niñas aprenden sobre los fundamentos de la fe
                        católica, así como sobre los valores y virtudes cristianos. La catequesis es un proceso que dura
                        varios años y que culmina con la recepción de los sacramentos de la Primera Comunión y la
                        Confirmación. 
                    </p>La Primera Comunión es el sacramento que nos permite recibir por primera vez el
                        Cuerpo y la Sangre de Cristo. Es un momento de gran alegría y compromiso para los niños y niñas,
                        que se convierten en miembros activos de la Iglesia. La Confirmación es el sacramento que nos
                        fortalece con el don del Espíritu Santo. Es un momento de renovación de la fe y de compromiso
                        con la Iglesia y con la sociedad. 
                </div>

            </div>
        </div>
    </div>
    <!-- About End -->

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
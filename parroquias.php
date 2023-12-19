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
    <div class="container-fluid bg-primary py-5 mb-5 page-header" style="background-image: url('img/portadap1.jpg'); background-size: cover;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Parroquias</h1>
                <nav aria-label="breadcrumb">
                </nav>
            </div>
        </div>
    </div>
</div>

    <!-- Header End -->

    <!-- cursos Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Parroquias</h6>
                <h1 class="mb-5">Encuentra una parroquia cerca de tu localidad.</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/iglesia1.jpg" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="matriculas.php" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">MATRÍCULAS</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h5 class="mb-4">Parroquia San Juan</h5>
                        </div>
                        <div class="d-flex border-top">
                            
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-clock text-primary me-2"></i>Calle 24 de Mayo y Avenida Loja, Barrio La Florida</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>
                            (02) 276 0987</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/iglesia3.webp" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="matriculas.php" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">MATRÍCULAS</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h5 class="mb-4">Iglesia Santa María</h5>
                        </div>
                        <div class="d-flex border-top">
                            
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-clock text-primary me-2"></i>Calle Sucre y Avenida Quito, Barrio Quito Loma</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>
                            (02) 276 1234</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/iglesia4.jpg" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="matriculas.php" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">MATRÍCULAS</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h5 class="mb-4">Capilla San José</h5>
                        </div>
                        <div class="d-flex border-top">
                            
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-clock text-primary me-2"></i>Calle Bolívar y Avenida Guayaquil, Barrio Centro</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>
                            (02) 276 2345</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/iglesia2.jpg" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="matriculas.php" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">MATRÍCULAS</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h5 class="mb-4">Parroquia de la Resurrección</h5>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-clock text-primary me-2"></i>Calle Loja y Avenida Simón Bolívar, Barrio Algarrobo</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>
                            (02) 276 5432</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cursos End -->

    <!-- MAPA START -->
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Parroquias</h6>
                <h1 class="mb-5">Mapa Santo Domingo.</h1>
            </div>
    <div style="text-align: center;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31918.23767610028!2d-79.176192!3d-0.252067!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d546535730a17d%3A0xcef17541041b9f63!2sSanto%20Domingo!5e0!3m2!1ses-419!2sec!4v1702935583144!5m2!1ses-419!2sec" width="964.8px" height="500px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- MAPA END -->

    <!-- matriculas Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Parroquias</h6>
                <h1 class="mb-5">Antecedentes.</h1>
            </div>
            <div class="owl-carousel matriculas-carousel position-relative">
                <div class="matriculas-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/iglesia1.jpg"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Parroquia San Juan</h5>
                    
                    <div class="matriculas-text bg-light text-center p-4">
                        <p class="mb-0">La Parroquia San Juan es una iglesia católica ubicada en el centro de Santo Domingo, Ecuador. Fue construida en el siglo XVI y es uno de los edificios religiosos más antiguos de la ciudad. La iglesia tiene una arquitectura colonial típica, con una fachada de piedra y un interior decorado con frescos y esculturas.</p>
                    </div>
                </div>
                <div class="matriculas-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/iglesia2.jpg"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Capilla San José</h5>
                    
                    <div class="matriculas-text bg-light text-center p-4">
                        <p class="mb-0">La Capilla San José es una iglesia católica ubicada en el barrio de Quito Loma, Santo Domingo, Ecuador. Fue construida en el siglo XIX y es una de las iglesias más pequeñas de la ciudad. La iglesia tiene una arquitectura sencilla, con una fachada de ladrillo y un interior acogedor.</p>
                    </div>
                </div>
                <div class="matriculas-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/iglesia3.webp"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Iglesia Santa María</h5>
                    
                    <div class="matriculas-text bg-light text-center p-4">
                        <p class="mb-0">La Iglesia Santa María es una iglesia católica ubicada en el barrio de La Florida, Santo Domingo, Ecuador. Fue construida en el siglo XX y es una de las iglesias más grandes de la ciudad. La iglesia tiene una arquitectura moderna, con una fachada de vidrio y un interior espacioso.</p>
                    </div>
                </div>
                <div class="matriculas-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/iglesia4.jpg"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Parroquia de la Resurrección</h5>
                    
                    <div class="matriculas-text bg-light text-center p-4">
                        <p class="mb-0">La Parroquia de la Resurrección es una iglesia católica ubicada en el barrio de Algarrobo, Santo Domingo, Ecuador. Fue construida en el siglo XXI y es una de las iglesias más nuevas de la ciudad. La iglesia tiene una arquitectura contemporánea, con una fachada de hormigón y un interior minimalista..</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- matriculas End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">ACCESO RAPIDO</h4>
                <a class="btn btn-link" href="cursos.php">Sacramentos</a>
                <a class="btn btn-link" href="guias.php">Guias Espirituales</a>
                <a class="btn btn-link" href="asistencia.php">Catequistas</a>
                <a class="btn btn-link" href="matriculas.php">Matriculas</a>
            </div>
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
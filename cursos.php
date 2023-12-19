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
                <a href="catequista.php" class="nav-item nav-link">Guias Espirituales</a>
                <a href="vista.php" class="nav-item nav-link">Vista</a>

            </div>
            <a href="catequista.php" class="btn btn-secondary py-4 px-lg-5 d-none d-lg-block">CATEQUISTA</a>

            <a href="matriculas.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">MATRÍCULAS</a>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header" style="background-image: url('img/portada2.webp'); background-size: cover; box-shadow: 0 0 20px 0px #000;">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                <h1 class="mb-5">Sacramentos.</h1>
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
                <h6 class="section-title bg-white text-center text-primary px-3">cursos</h6>
                <h1 class="mb-5">Cursos Disponibles.</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/añobiblicojpg.jpg" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                
                                <a href="matriculas.php" class="flex-shrink-0 btn btn-sm btn-primary px-3"
                                    style="border-radius: 0 30px 30px 0;">MATRÍCULAS</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            
                            <h5 class="mb-4">Año Biblico</h5>
                            <p>El curso de año bíblico es un curso de formación cristiana que se centra en el estudio de la Biblia. El curso suele durar un año y se divide en diferentes temas, como la historia de la Biblia, sus personajes, sus enseñanzas y su mensaje. El curso está dirigido a personas de todas las edades y niveles de conocimiento bíblico.</p>
                        </div>
                        <div class="d-flex border-top">
                            
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-clock text-primary me-2"></i>Viernes 4:00 PM</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30
                                Estudiantes</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/primeracomunion.jpg" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                
                                <a href="matriculas.php" class="flex-shrink-0 btn btn-sm btn-primary px-3"
                                    style="border-radius: 0 30px 30px 0;">MATRÍCULAS</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            
                            <h5 class="mb-4">Primera Comunión</h5>
                            <p>El curso de primera comunión es un curso de formación cristiana que prepara a los niños para recibir la primera comunión. El curso suele durar un año y se centra en el estudio de la vida de Jesús, los sacramentos y la fe católica. El curso está dirigido a niños de entre 7 y 10 años.</p>
                        </div>
                        <div class="d-flex border-top">
                            
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-clock text-primary me-2"></i>Sábado 2:00 PM</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>25
                                Estudiantes</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/conf4.jpg" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                
                                <a href="matriculas.php" class="flex-shrink-0 btn btn-sm btn-primary px-3"
                                    style="border-radius: 0 30px 30px 0;">MATRÍCULAS</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            
                            <h5 class="mb-4">Confirmacion</h5>
                            <p>El curso de confirmación es un curso de formación cristiana que reafirma la fe de los jóvenes. El curso suele durar un año y se centra en el estudio de la fe católica, la vocación y la responsabilidad cristiana. El curso está dirigido a jóvenes de entre 11 y 16 años.</p>
                        </div>
                        <div class="d-flex border-top">
                            
                            <small class="flex-fill text-center border-end py-2"><i
                                    class="fa fa-clock text-primary me-2"></i>Domingo 10:00 AM</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>20
                                Estudiantes</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cursos End -->


    <!-- matriculas Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Testimonios</h6>
                <h1 class="mb-5">Experiencias en los Sacramentos.</h1>
            </div>
            <div class="owl-carousel matriculas-carousel position-relative">
                <div class="matriculas-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/bc.jpg"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Bryan Cruz</h5>
                   
                    <div class="matriculas-text bg-light text-center p-4">
                        <p class="mb-0">Antes de empezar el curso de año bíblico, no sabía mucho sobre la Biblia. Solo había escuchado algunas historias de la escuela o de mis padres. Pero durante el curso, aprendí mucho sobre la historia de la Biblia, sus personajes y sus enseñanzas. También aprendí a leer la Biblia y a entender su mensaje.</p>
                    </div>
                </div>
                <div class="matriculas-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/se.jpg"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Stefany Erazo</h5>
                   
                    <div class="matriculas-text bg-light text-center p-4">
                        <p class="mb-0">El día de mi primera comunión fue uno de los mejores días de mi vida. Estaba muy feliz de poder recibir a Jesús en mi corazón.</p>
                    </div>
                </div>
                <div class="matriculas-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/df.jpg"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">David Flores</h5>
                    
                    <div class="matriculas-text bg-light text-center p-4">
                        <p class="mb-0">La confirmación fue un momento muy importante para mí. Era la oportunidad de reafirmar mi fe y de comprometerme con la Iglesia.</p>
                    </div>
                </div>
                <div class="matriculas-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/fa.png"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Fabricio Alama</h5>
                    
                    <div class="matriculas-text bg-light text-center p-4">
                        <p class="mb-0">"Los cursos de año bíblico, primera comunión y confirmación fueron una experiencia muy importante para mí. Me ayudaron a crecer como persona y como cristiana.</p>
                    </div>
                </div>
                <div class="matriculas-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/ab.jpg"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Andrea Bravo</h5>
                   
                    <div class="matriculas-text bg-light text-center p-4">
                        <p class="mb-0">Estoy muy agradecida por la oportunidad de haber participado en estos cursos. Me han ayudado a ser una mejor persona y a vivir mi fe de una manera más plena.</p>
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
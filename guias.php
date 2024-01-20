<?php
include_once "conexion.php";

// Manejar el envío del formulario
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
    $apellido = isset($_POST["apellido"]) ? trim($_POST["apellido"]) : "";
    $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : "";
    $correo_electronico = isset($_POST["correo"]) ? trim($_POST["correo"]) : "";
    $id_iglesia = isset($_POST["iglesia"]) ? 1 : 0; // 1 si es miembro, 0 si no lo es

    // Validar que los campos requeridos no estén vacíos
    if (empty($nombre) || empty($apellido) || empty($telefono)) {
        echo "Error: Los campos Nombre, Apellido y Teléfono son obligatorios.";
        exit();
    }

    try {
        // Obtener la conexión
        $conexion = Cconexion::ConexionBD();

        // Preparar la llamada al procedimiento almacenado
        $sql = "CALL InsertarPadre(?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(1, $nombre, PDO::PARAM_STR);
        $stmt->bindParam(2, $apellido, PDO::PARAM_STR);
        $stmt->bindParam(3, $telefono, PDO::PARAM_STR);
        $stmt->bindParam(4, $correo_electronico, PDO::PARAM_STR);
        $stmt->bindParam(5, $id_iglesia, PDO::PARAM_INT);
        $stmt->execute();

        echo " ";
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
    $sql = "SELECT * FROM Padre";
    $resultado = $conexion->query($sql);
} else {
    echo "Error al cerrar la conexión";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Padre</title>
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
          <h1 class="mb-5 text-white">Padres.</h1>
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
        <h6 class="section-title bg-white text-center text-primary px-3">padres</h6>
        <h1 class="mb-5">Ingreso Padres</h1>
      </div>

      <!-- Formulario Matricula -->
      <form id="guias-form" action="guias.php" method="POST" class="col-md-6 mx-auto"
        onsubmit="return validarFormulario()">
        <!-- Campos del formulario -->
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" pattern="[A-Za-z]+"
              title="Ingresa solo letras" required>
          </div>
          <div class="col-md-6">
            <label for="apellido" class="form-label">Apellido:</label>
            <input type="text" id="apellido" name="apellido" class="form-control" pattern="[A-Za-z]+"
              title="Ingresa solo letras" required>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="telefono" class="form-label">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" class="form-control" pattern="[0-9]{10}"
              title="Ingresa un número de 10 dígitos y no negativos" required>
          </div>
       
          <div class="col-md-6">
            <label for="iglesia" class="form-label">Iglesia:</label>
            <input type="text" id="iglesia" name="iglesia" class="form-control" pattern="[0-9]+"
              title="Ingresa solo el número del ID" required>
          </div>
          <div class="col-md-12">
            <label for="correo" class="form-label">Correo Electrónico:</label>
            <input type="text" id="correo" name="correo" class="form-control"
              title="Ingresa solo el número del ID" required>
          </div>
        </div>
        <div class="mb-3 text-center">
          <button type="submit" name="submit" class="btn btn-info text-white m-2">Agregar Padre</button>
        </div>
      </form>


    <!-- Mostrar los datos en la tabla -->
<div class="table-responsive">
  <table id="tabla-padre" class="table table-striped">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Teléfono</th>
        <th>Correo</th>
        <th>Iglesia</th>
        <th class="text-center">Editar y Eliminar</th>
      </tr>
    </thead>
    <tbody id="padre-list">
      <?php
      // Verificar si hay resultados antes de mostrar la tabla
      if ($resultado) {
        while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
          echo "<tr>";
          echo "<td>" . $fila['nombre'] . "</td>";
          echo "<td>" . $fila['apellido'] . "</td>";
          echo "<td>" . $fila['telefono'] . "</td>";
          echo "<td>" . $fila['correo_electronico'] . "</td>";
          echo "<td>" . $fila['id_iglesia'] . "</td>";
          echo "<td class='text-center'>";

          // Botón Editar
          echo "<a class='btn btn-info rounded-circle mx-1' href='editarPadre.php?id_padre={$fila['id_padre']}' title='Editar'>
                    <i class='bi bi-journal text-light'></i>
                </a>";

          // Botón Eliminar
          echo "<a class='btn btn-secondary rounded-circle mx-1' href='eliminarPadre.php?id_padre={$fila['id_padre']}' 
                    onclick='return confirm(\"¿Estás seguro de que deseas eliminar este registro?\")' title='Eliminar'>
                    <i class='bi bi-x text-light'></i>
                </a>";

          echo "</td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='6'>No hay padres registrados.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>

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
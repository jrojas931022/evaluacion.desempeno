<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos (ajusta las credenciales según tu configuración)
    include("config.php");

    // Obtener datos del formulario
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    // Consulta SQL para verificar las credenciales
    $sql = "SELECT * FROM evaluador WHERE usuario = '$usuario'";
    $resultado = $link->query($sql);

    if ($resultado->num_rows > 0) {
        // Inicio de sesión exitoso
        $usuario = $resultado->fetch_assoc();

        if (password_verify($contrasena, $usuario["contrasena"])) {
            // Almacena la información del usuario en la sesión
            $_SESSION["usuario_id"] = $usuario["id_evaluador"];
            $_SESSION["usuario_cedula"] = $usuario["Numero_cedula"];
            $_SESSION["usuario_nombre"] = $usuario["Nombre"];
            $_SESSION["usuario_usuario"] = $usuario["usuario"];
            $_SESSION["usuario_cargo"] = $usuario["Cargo"];
            $_SESSION["usuario_proceso"] = $usuario["Proceso"];
            $_SESSION["usuario_rol"] = $usuario["rol"];
            $_SESSION["usuario_firma"] = $usuario["firma"];

            // Generar un token de acceso
            $token = bin2hex(random_bytes(16)); // Genera un token de 32 caracteres
            $hora_acceso = date("Y-m-d H:i:s"); // Obtener la hora actual

            // Insertar el token y la hora en la nueva tabla accesos_evaluador
            $sql_token = "INSERT INTO accesos_evaluador (id_evaluador, token_acceso, hora_acceso) 
                          VALUES (" . $usuario["id_evaluador"] . ", '$token', '$hora_acceso')";
            $link->query($sql_token);

            // Redireccionar según si la firma está vacía o no
            if (empty($_SESSION["usuario_firma"])) {
                header("Location: firma.php");
            } else {
                header("Location: principal.php");
            }
        } else {
            // Contraseña incorrecta
            $mensaje_error = "Usuario o contraseña incorrecta.";
        }
    } else {
        $mensaje_error = "Usuario o contraseña incorrecta.";
    }

    // Cierra la conexión
    $link->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <title>Confeccion Trajes S.A | Evaluacion De Desempeño</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
</head>

<body class="">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav
                    class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid pe-0">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="index.php">
                        Confeccion Trajes S.A
                        </a>
                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse" id="navigation">



                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-bolder text-info text-gradient">EVALUACIÓN DE DESEMPEÑO</h3>
                                    <p class="mb-0"> Digita usuario y contraseña para acceder</p>
                                </div>
                                <div class="card-body">

                             

<?php if (isset($mensaje_error)) : ?>
    <p style="color: red;"><?php echo $mensaje_error; ?></p>
<?php endif; ?>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <label for="usuario">Usuario:</label>
    <input type="text"  class="form-control" name="usuario" required>

    <br>

    <label for="contrasena">Contraseña:</label>
    <input type="password"  class="form-control" name="contrasena" required>

    <br>

    <button class="btn bg-gradient-info w-100 mt-4 mb-0" type="submit">Iniciar </button>
</form>



                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                                    style="background-image:url('assets/img/curved-images/rocha2.jpg')"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <footer class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto text-center mt-1">
                    <p class="mb-0 text-secondary">
                        Copyright © <script>
                        document.write(new Date().getFullYear())
                        </script> Confeccion Trajes S.A.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <!--   Core JS Files   -->
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>
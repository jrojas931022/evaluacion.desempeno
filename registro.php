<?php

// Initialize the session
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION["usuario_id"])) {
  // Si no está autenticado, redirige a la página de inicio de sesión
  header("Location: index.php");
  exit();
}
$tiempo_inactividad = 36000; // 30 minutos * 60 segundos/minuto

// Verifica si la sesión ha expirado debido a inactividad
if (isset($_SESSION['ultimo_acceso']) && (time() - $_SESSION['ultimo_acceso']) > $tiempo_inactividad) {
    // La sesión ha expirado, destrúyela y redirige al usuario al inicio de sesión
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}


// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $cedula = $_POST["Numero_cedula"];  
    $nombre = $_POST["Nombre"];
    $usuario = $_POST["usuario"];
    $contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);
    $cargo = $_POST["Cargo"];
    $proceso = $_POST["Proceso"];
    $rol = $_POST['rol'];

    $img = $_POST['base64'];
    $img = str_replace('data:image/png;base64,', '', $img);
    $fileData = base64_decode($img);
    $fileName = uniqid().'.png';
    file_put_contents("./firmas_evaluativas/".$fileName, $fileData);
    
 

    // Conectar a la base de datos (ajusta las credenciales según tu configuración)
    include ("config.php");

   

    // Insertar datos en la tabla de usuarios
    $sql = "INSERT INTO evaluador (id_evaluador , Numero_cedula, Nombre, usuario, contrasena, Cargo, Proceso, rol) VALUE ('NULL', '".$cedula."', '".$nombre."', '".$usuario."' , '".$contrasena."' ,  '".$cargo."',
    '".$proceso."', '".$rol."')";

    $resultado= mysqli_query($link,$sql);
    
    
    if ($resultado === TRUE) {
      echo "<script language='JavaScript'>
      alert('Evaluador registrado con exito ');
      location.assign('principal.php');
      </script>";
    } else {
        echo "Error al registrar el usuario: " . $link->error;
    }

    // Cierra la conexión
    $link->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script src="app.js"></script>
    <script src="jspdf.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="jquery.min.js"></script>
    <script src="signature_pad.js"></script>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<div class="col-12 mt-4">
          <div class="card mb-4">
            <div class="card-header pb-0 p-3">
            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
            <div class="card-header pb-0 p-3">
              <h3 class="mb-1">Crear Evaluador</h3>
             <h5 class="mb-1">Registra los datos personales:</h5>
            </div>
            <div class="card h-100 card-plain border">
            <div class="card-body d-flex flex-column justify-content-center text-center"> 
            <form method="post" id="form" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    
    <label for="Numero_cedula">Número de Cédula:</label>
     <input type="number"  class="monto form-control form-control-sm"   name="Numero_cedula" required>
 
     <br>
     
     <label for="Nombre">Nombre:</label>
     <input type="text" class="monto form-control form-control-sm"  name="Nombre" required>
 
     <br>
 
 
     <label for="usuario">Usuario:</label>
     <input type="text"  class="monto form-control form-control-sm"  name="usuario" required>
 
     <br>
 
     <label for="contrasena">Contraseña:</label>
     <input type="password"  class="monto form-control form-control-sm"   name="contrasena" required>
 
     <br>
      <label for="Cargo">Cargo:</label>
     <input   class="monto form-control form-control-sm"  type="text" name="Cargo" required>
 
     <br>
      <label for="Proceso">Proceso:</label>
     <input type="text"  class="monto form-control form-control-sm"  name="Proceso" required>
 
     <br>
     <div class="form-group">
                    
                    
                    
<p>
<label>Seleccione Rol</label>  
     <select name="rol" id="rol"class="form-control" placeholder="Seleccione la opcion indicada:">
     
      <option value="100">Administrador</option>
      <option value="99">Evaluador</option>
  
     </select>

  </p>
    
                </div>
    
  <br>



                                                    <input type="submit"  class="btn btn-sm btn-primary"  value="Registrar">
 
    
 </form>
                
 </div>
                
          </div>
          </div>
 <br><br>
          </div>
        </div>
            </div>

</html>

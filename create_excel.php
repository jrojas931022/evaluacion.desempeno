<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
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
?>
<!DOCTYPE html>
<html lang="es-es">

<head>
	<meta charset="utf-8">
	<title>listado completo de personas evaluadas</title>

    </head>

	<body>
		<?php
         include("config.php");
		// Definimos el archivo exportado
		$arquivo = 'Empleados evaluados.xls';

		// Crear la tabla HTML
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="9"> <p align="center">Tabla Lista de Empleados evaluados </p></tr>';
		$html .= '</tr>';

        //empelado
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Numero de cedula</b></td>';
		$html .= '<td><b>Nombre empleado</b></td>';
		$html .= '<td><b>Cargo empleado</b></td>';
		$html .= '<td><b>Proceso empelado</b></td>';
		$html .= '<td><b>Fecha de ingreso</b></td>';
		$html .= '<td><b>Estado empleado</b></td>';
        //evaluador
		$html .= '<td><b>Cedula evaluador</b></td>';
		$html .= '<td><b>Nombre evaluador</b></td>';
		$html .= '<td><b>Cargo evaluador</b></td>';
		$html .= '<td><b>proceso evaluador</b></td>';
        //encuesta
		$html .= '<td><b>Fecha de evaluacion</b></td>';
		$html .= '<td><b>Periodo evaluado</b></td>';
		$html .= '<td><b>Fila 1 </b></td>';
		$html .= '<td><b>Observacion fila 1</b></td>';
        $html .= '<td><b>Fila 2 </b></td>';
		$html .= '<td><b>Observacion fila 2</b></td>';
        $html .= '<td><b>Fila 3 </b></td>';
		$html .= '<td><b>Observacion fila 3</b></td>';
        $html .= '<td><b>Fila 4</b></td>';
		$html .= '<td><b>Observacion fila 4</b></td>';
        $html .= '<td><b>Fila 5</b></td>';
		$html .= '<td><b>Observacion fila 5</b></td>';
        $html .= '<td><b>Fila 6</b></td>';
		$html .= '<td><b>Observacion fila 6</b></td>';
        $html .= '<td><b>Fila 7</b></td>';
		$html .= '<td><b>observacion fila 7</b></td>';
        $html .= '<td><b>Fila 8</b></td>';
		$html .= '<td><b>Observacion fila 8</b></td>';
        $html .= '<td><b>Fila 9</b></td>';
		$html .= '<td><b>Observacion fila 9</b></td>';
        $html .= '<td><b>Fila 10</b></td>';
		$html .= '<td><b>Observacion fila 10</b></td>';
        $html .= '<td><b>Fila 11</b></td>';
		$html .= '<td><b>Observacion fila 11</b></td>';
        $html .= '<td><b>Fila 12</b></td>';
		$html .= '<td><b>Observacion fila 12</b></td>';
        $html .= '<td><b>Fila 13</b></td>';
		$html .= '<td><b>Observacion fila 13</b></td>';
        $html .= '<td><b>Fila 14</b></td>';
		$html .= '<td><b>Observacion fila 14</b></td>';
        $html .= '<td><b>Fila 15</b></td>';
		$html .= '<td><b>Observacion fila 15</b></td>';
        $html .= '<td><b>Fila 16</b></td>';
		$html .= '<td><b>Observacion fila 16</b></td>';
        $html .= '<td><b>Fila 17</b></td>';
		$html .= '<td><b>Observacion fila 17</b></td>';
        $html .= '<td><b>Fila 18</b></td>';
		$html .= '<td><b>Observacion fila 18</b></td>';
		$html .= '<td><b>Observacion final</b></td>';
		$html .= '<td><b>Calificacion final</b></td>';
		$html .= '<td><b>Califficacion general (letra)</b></td>';
    
        
	
		$html .= '</tr>';

		//Seleccionar todos los elementos de la tabla
		$result_msg_contatos = "SELECT * FROM encuesta INNER JOIN empleado ON encuesta.idEmpleado = empleado.id_empleado INNER JOIN evaluador ON encuesta.idEvaluador = evaluador.id_evaluador   WHERE Periodo_evaluar >= '2020'";
		$resultado_msg_contatos = mysqli_query($link, $result_msg_contatos);

		while ($row_msg_contatos = mysqli_fetch_assoc($resultado_msg_contatos)) {
            //empleado
			$html .= '<tr>';
			$html .= '<td>' . $row_msg_contatos["id_empleado"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["numero_cedula"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["nombre"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["cargo"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["proceso"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["fecha_ingreso"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["estado_empleado"] . '</td>';
            //evaluador
			$html .= '<td>' . $row_msg_contatos["Numero_cedula"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["Nombre"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["Cargo"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["Proceso"] . '</td>';
            //encuesta
			$html .= '<td>' . $row_msg_contatos["fecha_evaluacion"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["Periodo_evaluar"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["fila_1"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["observ_1"] . '</td>';
            $html .= '<td>' . $row_msg_contatos["fila_2"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["observ_2"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["fila_3"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["observ_3"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["fila_4"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["observ_4"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["fila_5"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["observ_5"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["fila_6"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["observ_6"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["fila_7"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["observ_7"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["fila_8"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["observ_8"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["fila_9"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["observ_9"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["fila_10"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["observ_10"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["fila_11"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["observ_11"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["fila_12"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["observ_12"] . '</td>';
            $html .= '<td>' . $row_msg_contatos["fila_13"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["observ_13"] . '</td>';
            $html .= '<td>' . $row_msg_contatos["fila_14"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["observ_14"] . '</td>';
            $html .= '<td>' . $row_msg_contatos["fila_15"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["observ_15"] . '</td>';
            $html .= '<td>' . $row_msg_contatos["fila_16"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["observ_16"] . '</td>';
            $html .= '<td>' . $row_msg_contatos["fila_17"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["observ_17"] . '</td>';
            $html .= '<td>' . $row_msg_contatos["fila_18"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["observ_18"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["desempeno"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["calificacion_general"] . '</td>';
			$html .= '<td>' . $row_msg_contatos["calificacionFinal"] . '</td>';


            
            
			$html .= '</tr>';;
		}
		// Configuración en la cabecera
		header("Expires: Mon, 26 Jul 2227 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("Content-type: application/x-msexcel");
		header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
		header("Content-Description: PHP Generado Data");
		// Envia contenido al archivo
		echo $html;
		exit; ?>
    
	</body>
 
    
</html>


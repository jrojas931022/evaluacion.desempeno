<?php
/*
* Script: Cargar datos de lado del servidor con PHP y MySQL
* Autor: Marco Robles
* Team: Códigos de Programación
*/


$conn = new mysqli("localhost", "root", "", "evalu");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

//SELECT encuesta.id_encuesta, empleado.id_empleado, empleado.numero_cedula, empleado.nombre, empleado.cargo, empleado.proceso, empleado.fecha_ingreso, empleado.tipo_personal  FROM encuesta INNER JOIN empleado ON encuesta.idEmpleado = empleado.id_empleado INNER JOIN evaluador ON encuesta.idEvaluador = evaluador.id_evaluador 


/* Un arreglo de las columnas a mostrar en la tabla */
$columns = ['encuesta.id_encuesta', 'empleado.id_empleado', 'empleado.numero_cedula', 'empleado.nombre', 'empleado.cargo', 'empleado.proceso', 'empleado.fecha_ingreso', 'empleado.tipo_personal' ];

/* Nombre de la tabla */
$table = "encuesta INNER JOIN empleado ON encuesta.idEmpleado = empleado.id_empleado INNER JOIN evaluador ON encuesta.idEvaluador = evaluador.id_evaluador";    

$id = 'id_empleado';

$campo = isset($_POST['campo']) ? $conn->real_escape_string($_POST['campo']) : null;


/* Filtrado */
$where = '';

if ($campo != null) {
    $where = "WHERE (";

    $cont = count($columns);
    for ($i = 0; $i < $cont; $i++) {
        $where .= $columns[$i] . " LIKE '%" . $campo . "%' OR ";
    }
    $where = substr_replace($where, "", -3);
    $where .= ")";
}

/* Limit */
$limit = isset($_POST['registros']) ? $conn->real_escape_string($_POST['registros']) : 10;
$pagina = isset($_POST['pagina']) ? $conn->real_escape_string($_POST['pagina']) : 0;

if (!$pagina) {
    $inicio = 0;
    $pagina = 1;
} else {
    $inicio = ($pagina - 1) * $limit;
}

$sLimit = "LIMIT $inicio , $limit";

/**
 * Ordenamiento
 */

 $sOrder = "";
 if(isset($_POST['orderCol'])){
    $orderCol = $_POST['orderCol'];
    $oderType = isset($_POST['orderType']) ? $_POST['orderType'] : 'asc';
    
    $sOrder = "ORDER BY ". $columns[intval($orderCol)] . ' ' . $oderType;
 }


/* Consulta */
$sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . "
FROM $table
$where
$sOrder
$sLimit";
$resultado = $conn->query($sql);
$num_rows = $resultado->num_rows;

/* Consulta para total de registro filtrados */
$sqlFiltro = "SELECT FOUND_ROWS()";
$resFiltro = $conn->query($sqlFiltro);
$row_filtro = $resFiltro->fetch_array();
$totalFiltro = $row_filtro[0];

/* Consulta para total de registro filtrados */
$sqlTotal = "SELECT count($id) FROM $table ";
$resTotal = $conn->query($sqlTotal);
$row_total = $resTotal->fetch_array();
$totalRegistros = $row_total[0];

/* Mostrado resultados */
$output = [];
$output['totalRegistros'] = $totalRegistros;
$output['totalFiltro'] = $totalFiltro;
$output['data'] = '';
$output['paginacion'] = '';

if ($num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $output['data'] .= '<tr>';
        $output['data'] .= '<td>' . $row['id_empleado'] . '</td>';
        $output['data'] .= '<td>' . $row['numero_cedula'] . '</td>';
        $output['data'] .= '<td>' . $row['nombre'] . '</td>';
        $output['data'] .= '<td>' . $row['cargo'] . '</td>';
        $output['data'] .= '<td>' . $row['proceso'] . '</td>';
        $output['data'] .= '<td>' . $row['fecha_ingreso'] . '</td>';
        $output['data'] .= '<td>' . $row['tipo_personal'] . '</td>';
        $output['data'] .= '<td><p align="center"><a  target="_blank" href="evaluacion_operativa.php?id='.$row['id_encuesta'].'"><img src="images/pd.png" title="celestino" alt="celestino" /></a></P></td>';
        
    }
  
      
         
    
} else {
    $output['data'] .= '<tr>';
    $output['data'] .= '<td colspan="7">Sin resultados</td>';
    $output['data'] .= '</tr>';
}

if ($output['totalRegistros'] > 0) {
    $totalPaginas = ceil($output['totalRegistros'] / $limit);

    $output['paginacion'] .= '<nav>';
    $output['paginacion'] .= '<ul class="pagination">';

    $numeroInicio = 1;

    if(($pagina - 4) > 1){
        $numeroInicio = $pagina - 4;
    }

    $numeroFin = $numeroInicio + 9;

    if($numeroFin > $totalPaginas){
        $numeroFin = $totalPaginas;
    }

    for ($i = $numeroInicio; $i <= $numeroFin; $i++) {
        if ($pagina == $i) {
            $output['paginacion'] .= '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
        } else {
            $output['paginacion'] .= '<li class="page-item"><a class="page-link" href="#" onclick="nextPage(' . $i . ')">' . $i . '</a></li>';
        }
    }

    $output['paginacion'] .= '</ul>';
    $output['paginacion'] .= '</nav>';
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);

<?php
/*
* Script: Cargar datos de lado del servidor con PHP y MySQL
* Autor: Marco Robles
* Team: Códigos de Programación
*/


include 'config.php';



/* Un arreglo de las columnas a mostrar en la tabla */
$columns = ['encuesta.id_encuesta', 'empleado.id_empleado', 'empleado.numero_cedula', 'empleado.nombre', 'empleado.cargo', 'empleado.proceso', 'empleado.fecha_ingreso', 'empleado.tipo_personal', 'encuesta.Periodo_evaluar' ];   

/* Nombre de la tabla */
$table = "encuesta INNER JOIN empleado ON encuesta.idEmpleado = empleado.id_empleado INNER JOIN evaluador ON encuesta.idEvaluador = evaluador.id_evaluador";

$id = 'id_encuesta';

$campo = isset($_POST['campo']) ? $link->real_escape_string($_POST['campo']) : null;


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
$limit = isset($_POST['registros']) ? $link->real_escape_string($_POST['registros']) : 10;
$pagina = isset($_POST['pagina']) ? $link->real_escape_string($_POST['pagina']) : 0;

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
    $oderType = isset($_POST['orderType']) ? $_POST['orderType'] : 'desc';
    
    $sOrder = "ORDER BY id_encuesta DESC";
 }


/* Consulta */
$sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . "
FROM $table
$where
$sOrder
$sLimit";
$resultado = $link->query($sql);
$num_rows = $resultado->num_rows;

/* Consulta para total de registro filtrados */
$sqlFiltro = "SELECT FOUND_ROWS()";
$resFiltro = $link->query($sqlFiltro);
$row_filtro = $resFiltro->fetch_array();
$totalFiltro = $row_filtro[0];

/* Consulta para total de registro filtrados */
$sqlTotal = "SELECT count($id) FROM $table ";
$resTotal = $link->query($sqlTotal);
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
        $output['data'] .= '<td> <p align="center">' . $row['id_encuesta'] . '</p></td>';
        $output['data'] .= '<td><p align="center">' . $row['numero_cedula'] . '</p></td>';
        $output['data'] .= '<td><p align="center">' . $row['nombre'] . '</p></td>';
        $output['data'] .= '<td><p align="center">' . $row['cargo'] . '</p></td>';
        $output['data'] .= '<td><p align="center">' . $row['proceso'] . '</p></td>';
        $output['data'] .= '<td><p align="center">' . $row['fecha_ingreso'] . '</p></td>';
        $output['data'] .= '<td><p align="center">' . $row['tipo_personal'] . '</p></td>';
        $output['data'] .= '<td><p align="center">' . $row['Periodo_evaluar'] . '</p></td>';
        $personal=$row['tipo_personal'];
                
        if($personal == 'ADMINISTRATIVO'){
$output['data'] .= '<td><a  target="_blank" href="evaluacion_administrativa.php?id='.$row['id_encuesta'].'"  class="btn btn-sm btn-primary"> Ver </a></td>';
        }elseif($personal == 'OPERATIVO'){
            $output['data'] .= '<td><a  target="_blank" href="evaluacion_operativa.php?id='.$row['id_encuesta'].'" class="btn btn-sm btn-primary"> Ver </a></td>';
        }
       
         
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
<?php

    require 'vendor/autoload.php';
    require 'config.php';

    use PhpOffice\PhpSpreadsheet\{Spreadsheet, IOFactory};
    
 


    $sql= "SELECT * FROM encuesta INNER JOIN empleado ON encuesta.idEmpleado = empleado.id_empleado INNER JOIN evaluador ON encuesta.idEvaluador = evaluador.id_evaluador   WHERE Periodo_evaluar >= '2020'";

  
    $resultado = $link->query($sql);

    $excel = new Spreadsheet();
    $hojaActiva = $excel->getActiveSheet();
    $hojaActiva->setTitle("empleados");
    
    $hojaActiva->setCellValue('A1','ID');
    $hojaActiva->setCellValue('B1','NUMERO DE CEDULA');
    $hojaActiva->setCellValue('C1','NOMBRE');
    $hojaActiva->setCellValue('D1','CARGO');
    $hojaActiva->setCellValue('E1','PROCESO');
    $hojaActiva->setCellValue('F1','FECHA_INGRESO');
    $hojaActiva->setCellValue('G1','TIPO DE PERSONAL');
    $hojaActiva->setCellValue('H1','PRODUCTIVIDAD');

    $hojaActiva->setCellValue('I1','CEDULA EVALUADOR');
    $hojaActiva->setCellValue('J1','NOMBRE EVALUADOR');
    $hojaActiva->setCellValue('K1','CARGO EVALUADOR');
    $hojaActiva->setCellValue('L1','PROCESO EVALUADOR');


    $hojaActiva->setCellValue('M1','FECHA DE EVALUACION');
    $hojaActiva->setCellValue('N1','PERIODO EVALUADO');
    $hojaActiva->setCellValue('O1','DESEMPEÑO');
    $hojaActiva->setCellValue('P1','CALIFICACION GENERAL');
    $hojaActiva->setCellValue('Q1','CALIFICACION GENERAL (EN LETRA)');
 

    $fila = 2;

    while($rows = $resultado->fetch_assoc()){

        
        $hojaActiva->setCellValue('A'. $fila, $rows['id_empleado']);
        $hojaActiva->setCellValue('B'. $fila, $rows['numero_cedula']);
        $hojaActiva->setCellValue('C'. $fila, $rows['nombre']);
        $hojaActiva->setCellValue('D'. $fila, $rows['cargo']);
        $hojaActiva->setCellValue('E'. $fila, $rows['proceso']);
        $hojaActiva->setCellValue('F'. $fila, $rows['fecha_ingreso']);
        $hojaActiva->setCellValue('G'. $fila, $rows['tipo_personal']);
        
        if ($rows['productividad'] > 0){
        $hojaActiva->setCellValue('H'. $fila, $rows['productividad']);
        }else{
        $hojaActiva->setCellValue('H'. $fila,'NO APLICA');
        }
        $hojaActiva->setCellValue('I'. $fila, $rows['Numero_cedula']);
        $hojaActiva->setCellValue('J'. $fila, $rows['Nombre']);
        $hojaActiva->setCellValue('K'. $fila, $rows['Cargo']);
        $hojaActiva->setCellValue('L'. $fila, $rows['Proceso']);
        
        $hojaActiva->setCellValue('M'. $fila, $rows['fecha_evaluacion']);
        $hojaActiva->setCellValue('N'. $fila, $rows['Periodo_evaluar']);
        $hojaActiva->setCellValue('O'. $fila, $rows['desempeno']);
        $hojaActiva->setCellValue('P'. $fila, $rows['calificacion_general']);
        $hojaActiva->setCellValue('Q'. $fila, $rows['calificacionFinal']);
        

        $fila ++;

       

    }
    ob_end_clean(); 
    header("Content-Type:  application/vnd.ms-excel; charset=utf-8");
    header("Content-type:  application/x-msexcel; charset=utf-8");
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Colaboradores Evaluados.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');

exit;



?>
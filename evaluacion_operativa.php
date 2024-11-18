<?php

require "fpdf/fpdf.php";
include ("config.php");



$pdf = new FPDF($orientation='P');
$pdf->AddPage();

$pdf->SetFont('Arial', '', 12, 'UTF-8');
$pdf->Image('./images/operativo.jpg', 1, 2, 208, 291, 'jpg');



$id=$_GET['id'];


$sql="SELECT * FROM encuesta INNER JOIN empleado ON encuesta.idEmpleado = empleado.id_empleado INNER JOIN evaluador ON encuesta.idEvaluador = evaluador.id_evaluador  WHERE id_encuesta = '$id'";


$resultadoEvaluador = mysqli_query($link, $sql);
$total1 = mysqli_num_rows($resultadoEvaluador);
$dataFila = mysqli_fetch_assoc($resultadoEvaluador); 



if($total1 >0){


    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(35, 43);
    $pdf->Cell(60,0,utf8_decode($dataFila['nombre']),0,0,'R');
    
    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(48, 270);
    $pdf->MultiCell(80, 5, utf8_decode ($dataFila['nombre']), 0, 'L', 0, 0, '', '', true);
    

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(63, 47);
    $pdf->Cell(32,0, utf8_decode($dataFila['cargo']),0,0,'R');
    
 
    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(33, 51);
    $pdf->Cell(62,0, utf8_decode($dataFila['proceso']),0,0,'R');
    
    
    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(70, 59);
    $pdf->Cell(25,0, ($dataFila['fecha_ingreso']),0,0,'R');
    
        /*evaluador*/
    if($total1 >0){

    

    $pdf->SetFont('', '', 7, '', 'false');
    $pdf->SetXY(122, 43);
    $pdf->Cell(60,0, utf8_decode ($dataFila['Nombre']),0,0,'L');
        
    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(138, 273);
    $pdf->Cell(60,0, utf8_decode ($dataFila['Nombre']),0,0,'L');
    
    
    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(122, 47);
    $pdf->Cell(32,0, utf8_decode ($dataFila['Cargo']),0,0,'L');
    
   
    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(122, 51);
    $pdf->Cell(62,0, utf8_decode ($dataFila['Proceso']),0,0,'L');
        
    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(45, 29);
    $pdf->Cell(25,0, ($dataFila['fecha_evaluacion']),0,0,'C');
    

}
    /*datos de encuesta*/

/*datos de encuesta*/
    if($total1>0)
    
    {
        
        
    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(101, 29);
    $pdf->Cell(25,0, ($dataFila['Periodo_evaluar']),0,0,'C');
        
   
    }


if($total1 > 0){

        if($dataFila['fila_1'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 92);
                    $pdf->Cell(25,0, ($dataFila['fila_1']),0,0,'C');
           }elseif($dataFila['fila_1'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 92);
                    $pdf->Cell(25,0, ($dataFila['fila_1']),0,0,'C');
           }elseif($dataFila['fila_1'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 92);
                    $pdf->Cell(25,0, ($dataFila['fila_1']),0,0,'C');
           }

           
            if($dataFila['fila_2'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 100);
                    $pdf->Cell(25,0, ($dataFila['fila_2']),0,0,'C');
           }elseif($dataFila['fila_2'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 100);
                    $pdf->Cell(25,0, ($dataFila['fila_2']),0,0,'C');
           }elseif($dataFila['fila_2'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 100);
                    
                    $pdf->Cell(25,0, ($dataFila['fila_2']),0,0,'C');
           }
            
            

            if($dataFila['fila_3'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 114);
                    $pdf->Cell(25,0, ($dataFila['fila_3']),0,0,'C');
           }elseif($dataFila['fila_3'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 114);
                    $pdf->Cell(25,0, ($dataFila['fila_3']),0,0,'C');
           }elseif($dataFila['fila_3'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 114);
                    $pdf->Cell(25,0, ($dataFila['fila_3']),0,0,'C');
           }
            
          

            if($dataFila['fila_4'] == 1){

                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 122);
                    $pdf->Cell(25,0,($dataFila['fila_4']),0,0,'C');
           }elseif($dataFila['fila_4'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 122);
                    $pdf->Cell(25,0, ($dataFila['fila_4']),0,0,'C');
           }elseif($dataFila['fila_4'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 122);
                    $pdf->Cell(25,0, ($dataFila['fila_4']),0,0,'C');
           }

          

            if($dataFila['fila_5'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 129);
                    $pdf->Cell(25,0, ($dataFila['fila_5']),0,0,'C');
           }elseif($dataFila['fila_5'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 129);
                    $pdf->Cell(25,0, ($dataFila['fila_5']),0,0,'C');
           }elseif($dataFila['fila_5'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 129);
                    $pdf->Cell(25,0, ($dataFila['fila_5']),0,0,'C');
           }
            
           


            if($dataFila['fila_6'] == 1){

                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 135);
                    $pdf->Cell(25,0, ($dataFila['fila_6']),0,0,'C');
           }elseif($dataFila['fila_6'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 135);
                    $pdf->Cell(25,0, ($dataFila['fila_6']),0,0,'C');
                    
           }elseif($dataFila['fila_6'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 135);
                    $pdf->Cell(25,0, ($dataFila['fila_6']),0,0,'C');
           }

            

            if($dataFila['fila_7'] == 1){

                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 150);
                    $pdf->Cell(25,0, ($dataFila['fila_7']),0,0,'C');
           }elseif($dataFila['fila_7'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 150);
                    $pdf->Cell(25,0, ($dataFila['fila_7']),0,0,'C');
           }elseif($dataFila['fila_7'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 150);
                    $pdf->Cell(25,0, ($dataFila['fila_7']),0,0,'C');
           }

            


            if($dataFila['fila_8'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 157);
                    $pdf->Cell(25,0, ($dataFila['fila_8']),0,0,'C');
           }elseif($dataFila['fila_8'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 157);
                    $pdf->Cell(25,0, ($dataFila['fila_8']),0,0,'C');
           }elseif($dataFila['fila_8'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 157);
                    $pdf->Cell(25,0, ($dataFila['fila_8']),0,0,'C');
           }

           

            if($dataFila['fila_9'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 162);
                    $pdf->Cell(25,0, ($dataFila['fila_9']),0,0,'C');
           }elseif($dataFila['fila_9'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 162);
                    $pdf->Cell(25,0, ($dataFila['fila_9']),0,0,'C');
           }elseif($dataFila['fila_9'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 162);
                    $pdf->Cell(25,0, ($dataFila['fila_9']),0,0,'C');
           }


            

            if($dataFila['fila_10'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 168);
                    $pdf->Cell(25,0, ($dataFila['fila_10']),0,0,'C');
           }elseif($dataFila['fila_10'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 168);
                    $pdf->Cell(25,0, ($dataFila['fila_10']),0,0,'C');
           }elseif($dataFila['fila_10'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 168);
                    $pdf->Cell(25,0, ($dataFila['fila_10']),0,0,'C');
           }

            

            if($dataFila['fila_11'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 174);
                    $pdf->Cell(25,0, ($dataFila['fila_11']),0,0,'C');
           }elseif($dataFila['fila_11'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 174);
                    $pdf->Cell(25,0, ($dataFila['fila_11']),0,0,'C');
           }elseif($dataFila['fila_11'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 174);
                    $pdf->Cell(25,0, ($dataFila['fila_11']),0,0,'C');
           }

            

            if($dataFila['fila_12'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 179);
                    $pdf->Cell(25,0, ($dataFila['fila_12']),0,0,'C');
           }elseif($dataFila['fila_12'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 179);
                    $pdf->Cell(25,0, ($dataFila['fila_12']),0,0,'C');
           }elseif($dataFila['fila_12'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 179);
                    $pdf->Cell(25,0, ($dataFila['fila_12']),0,0,'C');
           }


            

            if($dataFila['fila_13'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 184);
                    $pdf->Cell(25,0, ($dataFila['fila_13']),0,0,'C');
           }elseif($dataFila['fila_13'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 184);
                    $pdf->Cell(25,0, ($dataFila['fila_13']),0,0,'C');
           }elseif($dataFila['fila_13'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 184);
                    $pdf->Cell(25,0, ($dataFila['fila_13']),0,0,'C');
           }

          

            if($dataFila['fila_14'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 191);
                    $pdf->Cell(25,0, ($dataFila['fila_14']),0,0,'C');
           }elseif($dataFila['fila_14'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 191);
                    $pdf->Cell(25,0, ($dataFila['fila_14']),0,0,'C');
           }elseif($dataFila['fila_14'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 191);
                    $pdf->Cell(25,0, ($dataFila['fila_14']),0,0,'C');
           }

           

        
            if($dataFila['fila_15'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 198);
                    $pdf->Cell(25,0, ($dataFila['fila_15']),0,0,'C');
           }elseif($dataFila['fila_15'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 198);
                    $pdf->Cell(25,0, ($dataFila['fila_15']),0,0,'C');
           }elseif($dataFila['fila_15'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 198);
                    $pdf->Cell(25,0, ($dataFila['fila_15']),0,0,'C');
           }

         

        if($dataFila['fila_16'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 207);
                    $pdf->Cell(25,0, ($dataFila['fila_16']),0,0,'C');
           }elseif($dataFila['fila_16'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 207);
                    $pdf->Cell(25,0, ($dataFila['fila_16']),0,0,'C');
           }elseif($dataFila['fila_16'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 207);
                    $pdf->Cell(25,0, ($dataFila['fila_16']),0,0,'C');
           }


           

            if($dataFila['fila_17'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 214);
                    $pdf->Cell(25,0, ($dataFila['fila_17']),0,0,'C');
           }elseif($dataFila['fila_17'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 214);
                    $pdf->Cell(25,0, ($dataFila['fila_17']),0,0,'C');
           }elseif($dataFila['fila_17'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 214);
                    $pdf->Cell(25,0, ($dataFila['fila_17']),0,0,'C');
           }


            
            
            if($dataFila['fila_18'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 221);
                    $pdf->Cell(25,0, ($dataFila['fila_18']),0,0,'C');
           }elseif($dataFila['fila_18'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 221);
                    $pdf->Cell(25,0, ($dataFila['fila_18']),0,0,'C');
           }elseif($dataFila['fila_18'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 221 );
                    $pdf->Cell(25,0, ($dataFila['fila_18']),0,0,'C');}

}

                if($total1>0){
              
        
                /* fila 1*/
                if($dataFila['fila_1'] == 1){
                $calificacion1 = ($dataFila['fila_1']) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
               // $pdf->Cell(25,0 ,($calificacion1),0,0,'C');
                
                }else{
                    $calificacion1 = 0 ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
            //    $pdf->Cell(25,0 ,($calificacion1),0,0,'C');
                }
                    
                if($dataFila['fila_2']== 1){
                $calificacion2  = ($calificacion1 + 1) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 229);
             //  $pdf->Cell(25,0, ($calificacion2),0,0,'C');
                
                }else{
                $calificacion2 = ($calificacion1 + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
             //   $pdf->Cell(25,0 ,($calificacion1),0,0,'C');
                    
                }
                    if($dataFila['fila_3']== 1){
                $calificacion3  = ($calificacion2 + 1) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 229);
              // $pdf->Cell(25,0, ($calificacion3),0,0,'C');
                
                }else{
                $calificacion3 = ($calificacion2 + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
              //  $pdf->Cell(25,0 ,($calificacion3),0,0,'C');
                    
                }
                    if($dataFila['fila_4']== 1){
                $calificacion4  = ($calificacion3 + 1) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 229);
            //   $pdf->Cell(25,0, ($calificacion4),0,0,'C');
                
                }else{
                $calificacion4 = ($calificacion3 + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
               // $pdf->Cell(25,0 ,($calificacion4),0,0,'C');
                    
                }
        
                    if($dataFila['fila_5']== 1){
                $calificacion5  = ($calificacion4 + 1) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 229);
                //$pdf->Cell(25,0, ($calificacion5),0,0,'C');
                
                }else{
                $calificacion5 = ($calificacion4 + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
              //  $pdf->Cell(25,0 ,($calificacion5),0,0,'C');
                    
                }
        
                    if($dataFila['fila_6']== 1){
                $calificacion6  = ($calificacion5 + 1) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 229);
             //  $pdf->Cell(25,0, ($calificacion6),0,0,'C');
                
                }else{
                $calificacion6 = ($calificacion5 + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
               // $pdf->Cell(25,0 ,($calificacion6),0,0,'C');
                    
                }
        
                if($dataFila['fila_7']== 1){
                $calificacion7  = ($calificacion6 + 1) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 229);
                //$pdf->Cell(25,0, ($calificacion7),0,0,'C');
                
                }else{
                $calificacion7 = ($calificacion6 + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
               // $pdf->Cell(25,0 ,($calificacion7),0,0,'C');
                    
                }
        
                if($dataFila['fila_8']== 1){
                $calificacion8  = ($calificacion7 + 1) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacion8),0,0,'C');
                
                }else{
                $calificacion8 = ($calificacion7 + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacion8),0,0,'C');
                    
                }
        
                if($dataFila['fila_9']== 1){
                $calificacion9  = ($calificacion8 + 1) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacion9),0,0,'C');
                
                }else{
                $calificacion9 = ($calificacion8 + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacion9),0,0,'C');
                }
        
                if($dataFila['fila_10']== 1){
                $calificacion10  = ($calificacion9 + 1) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacion10),0,0,'C');
                
                }else{
                $calificacion10 = ($calificacion9 + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacion10),0,0,'C');
                }
                    
                if($dataFila['fila_11']== 1){
                $calificacion11  = ($calificacion10 + 1) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacion11),0,0,'C');
                
                }else{
                $calificacion11 = ($calificacion10 + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacion11),0,0,'C');
                }
        
                if($dataFila['fila_12']== 1){
                $calificacion12  = ($calificacion11 + 1) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacion12),0,0,'C');
                
                }else{
                $calificacion12 = ($calificacion11 + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacion12),0,0,'C');
                }
        
                if($dataFila['fila_13']== 1){
                $calificacion13 = ($calificacion12 + 1) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacion13),0,0,'C');
                
                }else{
                $calificacion13 = ($calificacion12 + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacion13),0,0,'C');
                }
                    
                if($dataFila['fila_14']== 1){
                $calificacion14  = ($calificacion13 + 1) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacion13),0,0,'C');
                
                }else{
                $calificacion14 = ($calificacion13 + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacion13),0,0,'C');
                }
                    
                if($dataFila['fila_15']== 1){
                $calificacion15  = ($calificacion14 + 1) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacion15),0,0,'C');
                
                }else{
                $calificacion15 = ($calificacion14 + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacion15),0,0,'C');
                }
        
                if($dataFila['fila_16']== 1){
                $calificacion16  = ($calificacion15 + 1) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacion16),0,0,'C');
                
                }else{
                $calificacion16 = ($calificacion15 + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacion16),0,0,'C');
                }
        
                if($dataFila['fila_17']== 1){
                $calificacion17  = ($calificacion16 + 1) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacion17),0,0,'C');
                
                }else{
                $calificacion17 = ($calificacion16 + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacion17),0,0,'C');
                }
        
                if($dataFila['fila_18']== 1){
                $calificacion18  = ($calificacion17 + 1) ;
                                
                $pdf->SetFont('Helvetica', '', 9, '', 'false');
                $pdf->SetXY(102,228);
                $pdf->Cell(25,0, ($calificacion18),0,0,'C');
                
                }else{
                $calificacion18 = ($calificacion17 + 0) ;
                
                $pdf->SetFont('Helvetica', '', 9, '', 'false');
                $pdf->SetXY(102,228);
                $pdf->Cell(25,0 ,($calificacion18),0,0,'C');
                }
             
    }


/*columna 2*/

if($total1>0){
              
        
                /* fila 1*/
                if($dataFila['fila_1'] == 2){
                $calificacionA = 2 ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
               // $pdf->Cell(25,0 ,($calificacionA),0,0,'C');
                
                }else{
                    $calificacionA = 0 ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
            //    $pdf->Cell(25,0 ,($calificacionA),0,0,'C');
                }
                    
                if($dataFila['fila_2']== 2){
                $calificacionB  = ($calificacionA + 2) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 229);
             //  $pdf->Cell(25,0, ($calificacionB),0,0,'C');
                
                }else{
                $calificacionB = ($calificacionA + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
             //   $pdf->Cell(25,0 ,($calificacionB),0,0,'C');
                    
                }
                    if($dataFila['fila_3']== 2){
                $calificacionC  = ($calificacionB + 2) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 229);
              // $pdf->Cell(25,0, ($calificacionC),0,0,'C');
                
                }else{
                $calificacionC = ($calificacionB + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
              //  $pdf->Cell(25,0 ,($calificacionC),0,0,'C');
                    
                }
                    if($dataFila['fila_4']== 2){
                $calificacionD  = ($calificacionC + 2) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 229);
            //   $pdf->Cell(25,0, ($calificacionD),0,0,'C');
                
                }else{
                $calificacionD = ($calificacionC + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
               // $pdf->Cell(25,0 ,($calificacionD),0,0,'C');
                    
                }
        
                    if($dataFila['fila_5']== 2){
                $calificacionE  = ($calificacionD + 2) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 229);
                //$pdf->Cell(25,0, ($calificacionE),0,0,'C');
                
                }else{
                $calificacionE = ($calificacionD + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
              //  $pdf->Cell(25,0 ,($calificacionE),0,0,'C');
                    
                }
        
                    if($dataFila['fila_6']== 2){
                $calificacionF  = ($calificacionE + 2) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 229);
             //  $pdf->Cell(25,0, ($calificacionF),0,0,'C');
                
                }else{
                $calificacionF = ($calificacionE + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
               // $pdf->Cell(25,0 ,($calificacionF),0,0,'C');
                    
                }
        
                if($dataFila['fila_7']== 2){
                $calificacionG  = ($calificacionF + 2) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 229);
                //$pdf->Cell(25,0, ($calificacionG),0,0,'C');
                
                }else{
                $calificacionG = ($calificacionF + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
               // $pdf->Cell(25,0 ,($calificacionG),0,0,'C');
                    
                }
        
                if($dataFila['fila_8']== 2){
                $calificacionH  = ($calificacionG + 2) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacionH),0,0,'C');
                
                }else{
                $calificacionH = ($calificacionG + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacionH),0,0,'C');
                    
                }
        
                if($dataFila['fila_9']== 2){
                $calificacionI  = ($calificacionH + 2) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacionI),0,0,'C');
                
                }else{
                $calificacionI = ($calificacionH + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacionI),0,0,'C');
                }
        
                if($dataFila['fila_10']== 2){
                $calificacionJ  = ($calificacionI + 2) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacionJ),0,0,'C');
                
                }else{
                $calificacionJ = ($calificacionI + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacionJ),0,0,'C');
                }
                    
                if($dataFila['fila_11']== 2){
                $calificacionK  = ($calificacionJ + 2) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacionK),0,0,'C');
                
                }else{
                $calificacionK = ($calificacionJ + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacionK),0,0,'C');
                }
        
                if($dataFila['fila_12']== 2){
                $calificacionL  = ($calificacionK + 2) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacionL),0,0,'C');
                
                }else{
                $calificacionL = ($calificacionK + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacionL),0,0,'C');
                }
        
                if($dataFila['fila_13']== 2){
                $calificacionM = ($calificacionL + 2) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacionM),0,0,'C');
                
                }else{
                $calificacionM = ($calificacionL + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacionM),0,0,'C');
                }
                    
                if($dataFila['fila_14']== 2){
                $calificacionN  = ($calificacionM + 2) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacionN),0,0,'C');
                
                }else{
                $calificacionN = ($calificacionM + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacionN),0,0,'C');
                }
        
                 if($dataFila['fila_15']== 2){
                $calificacionO  = ($calificacionN + 2) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacionO),0,0,'C');
                
                }else{
                $calificacionO = ($calificacionN + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacionO),0,0,'C');
                }
        
                if($dataFila['fila_16']== 2){
                $calificacionP  = ($calificacionO + 2) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacionP),0,0,'C');
                
                }else{
                $calificacionP = ($calificacionO + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacionP),0,0,'C');
                }
        
                if($dataFila['fila_17']== 2){
                $calificacionQ  = ($calificacionP + 2) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacionQ),0,0,'C');
                
                }else{
                $calificacionQ = ($calificacionP + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacionQ),0,0,'C');
                }
        
        
                if($dataFila['fila_18']== 2){
                $calificacionR  = ($calificacionQ + 2) ;
                                
                $pdf->SetFont('Helvetica', '', 9, '', 'false');
                $pdf->SetXY(118,218);
                $pdf->Cell(25,0, ($calificacionR),0,0,'C');
                
                }else{
                $calificacionR = ($calificacionQ + 0) ;
                
                $pdf->SetFont('Helvetica', '', 9, '', 'false');
                $pdf->SetXY(118,228);
                $pdf->Cell(25,0 ,($calificacionR),0,0,'C');
                }
             
    }


            /*COLUMNA 3*/


if($total1>0){
              
        
                /* fila 1*/
                if($dataFila['fila_1'] == 3){
                $calificacion1A = 3 ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
               // $pdf->Cell(25,0 ,($calificacion1A),0,0,'C');
                
                }else{
                    $calificacion1A = 0 ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
            //    $pdf->Cell(25,0 ,($calificacion1A),0,0,'C');
                }
                    
                if($dataFila['fila_2']== 3){
                $calificacion1B  = ($calificacion1A + 3) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 229);
             //  $pdf->Cell(25,0, ($calificacion1B),0,0,'C');
                
                }else{
                $calificacion1B = ($calificacion1A + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
             //   $pdf->Cell(25,0 ,($calificacion1B),0,0,'C');
                    
                }
                    if($dataFila['fila_3']== 3){
                $calificacion1C  = ($calificacion1B + 3) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 229);
              // $pdf->Cell(25,0, ($calificacion1C),0,0,'C');
                
                }else{
                $calificacion1C = ($calificacion1B + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
              //  $pdf->Cell(25,0 ,($calificacion1C),0,0,'C');
                    
                }
                    if($dataFila['fila_4']== 3){
                $calificacion1D  = ($calificacion1C + 3) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 229);
            //   $pdf->Cell(25,0, ($calificacion1D),0,0,'C');
                
                }else{
                $calificacion1D = ($calificacion1C + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
               // $pdf->Cell(25,0 ,($calificacion1D),0,0,'C');
                    
                }
        
                    if($dataFila['fila_5']== 3){
                $calificacion1E  = ($calificacion1D + 3) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 229);
                //$pdf->Cell(25,0, ($calificacion1E),0,0,'C');
                
                }else{
                $calificacion1E = ($calificacion1D + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
              //  $pdf->Cell(25,0 ,($calificacion1E),0,0,'C');
                    
                }
        
                    if($dataFila['fila_6']== 3){
                $calificacion1F  = ($calificacion1E + 3) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 229);
             //  $pdf->Cell(25,0, ($calificacion1F),0,0,'C');
                
                }else{
                $calificacion1F = ($calificacion1E + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
               // $pdf->Cell(25,0 ,($calificacion1F),0,0,'C');
                    
                }
        
                if($dataFila['fila_7']== 3){
                $calificacion1G  = ($calificacion1F + 3) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 229);
                //$pdf->Cell(25,0, ($calificacion1G),0,0,'C');
                
                }else{
                $calificacion1G = ($calificacion1F + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
               // $pdf->Cell(25,0 ,($calificacion1G),0,0,'C');
                    
                }
        
                if($dataFila['fila_8']== 3){
                $calificacion1H  = ($calificacion1G + 3) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacion1H),0,0,'C');
                
                }else{
                $calificacion1H = ($calificacion1G + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacion1H),0,0,'C');
                    
                }
        
                if($dataFila['fila_9']== 3){
                $calificacion1I  = ($calificacion1H + 3) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacion1I),0,0,'C');
                
                }else{
                $calificacion1I = ($calificacion1H + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacion1I),0,0,'C');
                }
        
                if($dataFila['fila_10']== 3){
                $calificacion1J  = ($calificacion1I + 3) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacion1J),0,0,'C');
                
                }else{
                $calificacion1J = ($calificacion1I + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacion1J),0,0,'C');
                }
                    
                if($dataFila['fila_11']== 3){
                $calificacion1K  = ($calificacion1J + 3) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacion1K),0,0,'C');
                
                }else{
                $calificacion1K = ($calificacion1J + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacion1K),0,0,'C');
                }
        
                if($dataFila['fila_12']== 3){
                $calificacion1L  = ($calificacion1K + 3) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacion1L),0,0,'C');
                
                }else{
                $calificacion1L = ($calificacion1K + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacion1L),0,0,'C');
                }
        
                if($dataFila['fila_13']== 3){
                $calificacion1M = ($calificacion1L + 3) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacion1M),0,0,'C');
                
                }else{
                $calificacion1M = ($calificacion1L + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacion1M),0,0,'C');
                }
                    
                if($dataFila['fila_14']== 3){
                $calificacion1N  = ($calificacion1M + 3) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacion1N),0,0,'C');
                
                }else{
                $calificacion1N = ($calificacion1M + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacion1N),0,0,'C');
                }
        
                if($dataFila['fila_15']== 3){
                $calificacion1O  = ($calificacion1N + 3) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacion1O),0,0,'C');
                
                }else{
                $calificacion1O = ($calificacion1N + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacion1O),0,0,'C');
                }
        
                if($dataFila['fila_16']== 3){
                $calificacion1P  = ($calificacion1O + 3) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacion1P),0,0,'C');
                
                }else{
                $calificacion1P = ($calificacion1O + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacion1P),0,0,'C');
                }
        
                if($dataFila['fila_17']== 3){
                $calificacion1Q  = ($calificacion1P + 3) ;
                                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(120, 226);
               // $pdf->Cell(25,0, ($calificacion1Q),0,0,'C');
                
                }else{
                $calificacion1Q = ($calificacion1P + 0) ;
                
                $pdf->SetFont('Helvetica', 'B', 9, '', 'false');
                $pdf->SetXY(138, 229);
                //$pdf->Cell(25,0 ,($calificacion1Q),0,0,'C');
                }
        
                if($dataFila['fila_18']== 3){
                $calificacion1R  = ($calificacion1Q + 3) ;
                                
                $pdf->SetFont('Helvetica', '', 9, '', 'false');
                $pdf->SetXY(134,228);
                $pdf->Cell(25,0, ($calificacion1R),0,0,'C');
                
                }else{
                $calificacion1R = ($calificacion1Q + 0) ;
                
                $pdf->SetFont('Helvetica', '', 9, '', 'false');
                $pdf->SetXY(134,228);
                $pdf->Cell(25,0 ,($calificacion1R),0,0,'C');
                }
             
    



               $notafinal =($calificacion1R + $calificacionR + $calificacion18);
               $pdf->SetFont('helvetica','',12); 
               $pdf->SetXY(115,236);
               $pdf->Cell(30, 0, ($notafinal),0,0,'C');



if  ($notafinal >= 43 && $notafinal <=54){
                  $TipoEvaluacionAnual ="A";
                  $pdf->SetFont('helvetica','',20); 
                  $pdf->SetXY(183, 237.5);
                 // $pdf->Cell(60, 0, ($TipoEvaluacionAnual));
                  }
                  elseif($notafinal >= 26 &&  $notafinal  <=42){
                  $TipoEvaluacionAnual ="B";
                  $pdf->SetFont('helvetica','',20); 
                  $pdf->SetXY(183, 237.5);
                  //$pdf->Cell(60, 0, ($TipoEvaluacionAnual));
                  }
                  elseif($notafinal >= 18 &&  $notafinal  <=25){
                  $TipoEvaluacionAnual ="C";
                  $pdf->SetFont('helvetica','',20); 
                  $pdf->SetXY(183, 237.5);
                  $pdf->Cell(60, 0, ($TipoEvaluacionAnual));
                  }
                  $pdf->Cell(60, 0, ($TipoEvaluacionAnual));

}




        if($total1 >0){

    $pdf->SetFont('Helvetica', '', 6, '', 'false');
    $pdf->SetXY(8, 248);
    $pdf->MultiCell(195, 3, utf8_decode ($dataFila['desempeno']), 0, 'l', 0, 0, '', '', true);       
            
    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 89);
    $pdf->MultiCell(51, 3, utf8_decode ($dataFila['observ_1']), 0, 'L', 0, 0, '', '', true);
    

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 96);
    $pdf->MultiCell(51, 3, utf8_decode ($dataFila['observ_2']), 0, 'L', 0, 0, '', '', true);
    

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 109.5);
    $pdf->MultiCell(51, 3, utf8_decode ($dataFila['observ_3']), 0, 'L', 0, 0, '', '', true);            

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 119);
    $pdf->MultiCell(51, 3, utf8_decode ($dataFila['observ_4']), 0, 'L', 0, 0, '', '', true);
    

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 126);
    $pdf->MultiCell(51, 2, utf8_decode ($dataFila['observ_5']), 0, 'L', 0, 0, '', '', true);
    

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 133);
    $pdf->MultiCell(51, 2, utf8_decode ($dataFila['observ_6']), 0, 'L', 0, 0, '', '', true);            

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 143.5);
    $pdf->MultiCell(51, 3, utf8_decode ($dataFila['observ_7']), 0, 'L', 0, 0, '', '', true);
    

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 155.5);
    $pdf->MultiCell(51, 1.5, utf8_decode ($dataFila['observ_8']), 0, 'L', 0, 0, '', '', true);
    

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 160);
    $pdf->MultiCell(51, 2, utf8_decode ($dataFila['observ_9']), 0, 'L', 0, 0, '', '', true);            
            
    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 165);
    $pdf->MultiCell(51, 3, utf8_decode ($dataFila['observ_10']), 0, 'L', 0, 0, '', '', true);    
    
    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 171.5);
    $pdf->MultiCell(51, 2, utf8_decode ($dataFila['observ_11']), 0, 'L', 0, 0, '', '', true);
    

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 175);
    $pdf->MultiCell(51, 3, utf8_decode ($dataFila['observ_12']), 0, 'L', 0, 0, '', '', true);
    

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 182);
    $pdf->MultiCell(51, 2, utf8_decode ($dataFila['observ_13']), 0, 'L', 0, 0, '', '', true);            
             
    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 188);
    $pdf->MultiCell(51, 3, utf8_decode ($dataFila['observ_14']), 0, 'L', 0, 0, '', '', true);
    

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 195);
    $pdf->MultiCell(51, 3, utf8_decode ($dataFila['observ_15']), 0, 'L', 0, 0, '', '', true);
    

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 203);
    $pdf->MultiCell(51, 3,utf8_decode($dataFila['observ_16']), 0, 'L', 0, 0, '', '', true);            

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 210);
    $pdf->MultiCell(51, 3, utf8_decode($dataFila['observ_17']), 0, 'L', 0, 0, '', '', true);
    

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 218);
    $pdf->MultiCell(51, 3, utf8_decode ($dataFila['observ_18']), 0, 'L', 0, 0, '', '', true);
    
        }

    
    
    
    
       if($dataFila['firma_empleado']!=""){
            
          $pdf->SetXY(134,232);
          $pdf->Image('./firmas_operativas/'.($dataFila['firma_empleado']), 45, 259,25 , 7, 'png');
            }
            if($dataFila['firma']!=""){
            
                $pdf->SetXY(134,232);
                $pdf->Image('./firmas_evaluativas/'.($dataFila['firma']), 145, 257,23 , 7, 'png');
                  }

    $TipoEvaluacionAnual ="X";
    $pdf->SetFont('helvetica','',14); 
    $pdf->SetXY(195, 29);
    $pdf->Cell(60, 0, ($TipoEvaluacionAnual));


   $pdf->Output('Resultado_'.($dataFila['nombre']).'_'.date('d_m_y').'.pdf', 'I');
}

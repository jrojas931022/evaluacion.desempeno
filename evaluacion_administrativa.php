<?php

require "fpdf/fpdf.php";
include ("config.php");



$pdf = new FPDF($orientation='P');
$pdf->AddPage();

$pdf->SetFont('Arial', '', 12, 'UTF-8');
$pdf->Image('./images/administrativos.png', 1, 2, 208, 291, 'png');



$id=$_GET['id'];


$sql="SELECT * FROM encuesta INNER JOIN empleado ON encuesta.idEmpleado = empleado.id_empleado INNER JOIN evaluador ON encuesta.idEvaluador = evaluador.id_evaluador  WHERE id_encuesta = '$id'";


$resultadoEvaluador = mysqli_query($link, $sql);
$total1 = mysqli_num_rows($resultadoEvaluador);
$dataFila = mysqli_fetch_assoc($resultadoEvaluador); 



if($total1 >0){


    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(35, 52.5);
    $pdf->Cell(60,0,utf8_decode($dataFila['nombre']),0,0,'R');
    
    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(39, 266.5);
    $pdf->MultiCell(80, 5, utf8_decode ($dataFila['nombre']), 0, 'L', 0, 0, '', '', true);
    

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(63, 56);
    $pdf->Cell(32,0, utf8_decode($dataFila['cargo']),0,0,'R');
    
 
    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(33, 60);
    $pdf->Cell(62,0, utf8_decode($dataFila['proceso']),0,0,'R');
    
    
    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(70, 67);
    $pdf->Cell(25,0, ($dataFila['fecha_ingreso']),0,0,'R');
    
        /*evaluador*/
    if($total1 >0){

    

    $pdf->SetFont('', '', 7, '', 'false');
    $pdf->SetXY(122, 52.5);
    $pdf->Cell(60,0, utf8_decode ($dataFila['Nombre']),0,0,'L');
        
    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(138, 269);
    $pdf->Cell(60,0, utf8_decode ($dataFila['Nombre']),0,0,'L');
    
    
    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(122, 56);
    $pdf->Cell(32,0, utf8_decode ($dataFila['Cargo']),0,0,'L');
    
   
    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(122, 60);
    $pdf->Cell(62,0, utf8_decode ($dataFila['Proceso']),0,0,'L');
        
    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(45, 39);
    $pdf->Cell(25,0, ($dataFila['fecha_evaluacion']),0,0,'C');
    

}
    /*datos de encuesta*/

/*datos de encuesta*/
    if($total1>0)
    
    {
        
        
    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(101, 39);
    $pdf->Cell(25,0, ($dataFila['Periodo_evaluar']),0,0,'C');
        
   
    }


if($total1 > 0){

        if($dataFila['fila_1'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 97);
                    $pdf->Cell(25,0, ($dataFila['fila_1']),0,0,'C');
           }elseif($dataFila['fila_1'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 97);
                    $pdf->Cell(25,0, ($dataFila['fila_1']),0,0,'C');
           }elseif($dataFila['fila_1'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 97);
                    $pdf->Cell(25,0, ($dataFila['fila_1']),0,0,'C');
           }

           
            if($dataFila['fila_2'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 104);
                    $pdf->Cell(25,0, ($dataFila['fila_2']),0,0,'C');
           }elseif($dataFila['fila_2'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 104);
                    $pdf->Cell(25,0, ($dataFila['fila_2']),0,0,'C');
           }elseif($dataFila['fila_2'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 104);
                    
                    $pdf->Cell(25,0, ($dataFila['fila_2']),0,0,'C');
           }
            
            

            if($dataFila['fila_3'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 115.5);
                    $pdf->Cell(25,0, ($dataFila['fila_3']),0,0,'C');
           }elseif($dataFila['fila_3'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 115.5);
                    $pdf->Cell(25,0, ($dataFila['fila_3']),0,0,'C');
           }elseif($dataFila['fila_3'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 115.5);
                    $pdf->Cell(25,0, ($dataFila['fila_3']),0,0,'C');
           }
            
          

            if($dataFila['fila_4'] == 1){

                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 124);
                    $pdf->Cell(25,0,($dataFila['fila_4']),0,0,'C');
           }elseif($dataFila['fila_4'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 124);
                    $pdf->Cell(25,0, ($dataFila['fila_4']),0,0,'C');
           }elseif($dataFila['fila_4'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 124);
                    $pdf->Cell(25,0, ($dataFila['fila_4']),0,0,'C');
           }

          

            if($dataFila['fila_5'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 132.5);
                    $pdf->Cell(25,0, ($dataFila['fila_5']),0,0,'C');
           }elseif($dataFila['fila_5'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 132.5);
                    $pdf->Cell(25,0, ($dataFila['fila_5']),0,0,'C');
           }elseif($dataFila['fila_5'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 132.5);
                    $pdf->Cell(25,0, ($dataFila['fila_5']),0,0,'C');
           }
            
           


            if($dataFila['fila_6'] == 1){

                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 138);
                    $pdf->Cell(25,0, ($dataFila['fila_6']),0,0,'C');
           }elseif($dataFila['fila_6'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 138);
                    $pdf->Cell(25,0, ($dataFila['fila_6']),0,0,'C');
                    
           }elseif($dataFila['fila_6'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 138);
                    $pdf->Cell(25,0, ($dataFila['fila_6']),0,0,'C');
           }

            

            if($dataFila['fila_7'] == 1){

                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 144);
                    $pdf->Cell(25,0, ($dataFila['fila_7']),0,0,'C');
           }elseif($dataFila['fila_7'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 144);
                    $pdf->Cell(25,0, ($dataFila['fila_7']),0,0,'C');
           }elseif($dataFila['fila_7'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 144);
                    $pdf->Cell(25,0, ($dataFila['fila_7']),0,0,'C');
           }

            


            if($dataFila['fila_8'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 151);
                    $pdf->Cell(25,0, ($dataFila['fila_8']),0,0,'C');
           }elseif($dataFila['fila_8'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 151);
                    $pdf->Cell(25,0, ($dataFila['fila_8']),0,0,'C');
           }elseif($dataFila['fila_8'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 151);
                    $pdf->Cell(25,0, ($dataFila['fila_8']),0,0,'C');
           }

           

            if($dataFila['fila_9'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 158);
                    $pdf->Cell(25,0, ($dataFila['fila_9']),0,0,'C');
           }elseif($dataFila['fila_9'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 158);
                    $pdf->Cell(25,0, ($dataFila['fila_9']),0,0,'C');
           }elseif($dataFila['fila_9'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 158);
                    $pdf->Cell(25,0, ($dataFila['fila_9']),0,0,'C');
           }


            

            if($dataFila['fila_10'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 164);
                    $pdf->Cell(25,0, ($dataFila['fila_10']),0,0,'C');
           }elseif($dataFila['fila_10'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 164);
                    $pdf->Cell(25,0, ($dataFila['fila_10']),0,0,'C');
           }elseif($dataFila['fila_10'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 164);
                    $pdf->Cell(25,0, ($dataFila['fila_10']),0,0,'C');
           }

            

            if($dataFila['fila_11'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 175);
                    $pdf->Cell(25,0, ($dataFila['fila_11']),0,0,'C');
           }elseif($dataFila['fila_11'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 175);
                    $pdf->Cell(25,0, ($dataFila['fila_11']),0,0,'C');
           }elseif($dataFila['fila_11'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 175);
                    $pdf->Cell(25,0, ($dataFila['fila_11']),0,0,'C');
           }

            

            if($dataFila['fila_12'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 182.5);
                    $pdf->Cell(25,0, ($dataFila['fila_12']),0,0,'C');
           }elseif($dataFila['fila_12'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 182.5);
                    $pdf->Cell(25,0, ($dataFila['fila_12']),0,0,'C');
           }elseif($dataFila['fila_12'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 182.5);
                    $pdf->Cell(25,0, ($dataFila['fila_12']),0,0,'C');
           }


            

            if($dataFila['fila_13'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 189);
                    $pdf->Cell(25,0, ($dataFila['fila_13']),0,0,'C');
           }elseif($dataFila['fila_13'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 189);
                    $pdf->Cell(25,0, ($dataFila['fila_13']),0,0,'C');
           }elseif($dataFila['fila_13'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 189);
                    $pdf->Cell(25,0, ($dataFila['fila_13']),0,0,'C');
           }

          

            if($dataFila['fila_14'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 195);
                    $pdf->Cell(25,0, ($dataFila['fila_14']),0,0,'C');
           }elseif($dataFila['fila_14'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 195);
                    $pdf->Cell(25,0, ($dataFila['fila_14']),0,0,'C');
           }elseif($dataFila['fila_14'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 195);
                    $pdf->Cell(25,0, ($dataFila['fila_14']),0,0,'C');
           }

           

        
            if($dataFila['fila_15'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 201);
                    $pdf->Cell(25,0, ($dataFila['fila_15']),0,0,'C');
           }elseif($dataFila['fila_15'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 201);
                    $pdf->Cell(25,0, ($dataFila['fila_15']),0,0,'C');
           }elseif($dataFila['fila_15'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 201);
                    $pdf->Cell(25,0, ($dataFila['fila_15']),0,0,'C');
           }

         

        if($dataFila['fila_16'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 208);
                    $pdf->Cell(25,0, ($dataFila['fila_16']),0,0,'C');
           }elseif($dataFila['fila_16'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 208);
                    $pdf->Cell(25,0, ($dataFila['fila_16']),0,0,'C');
           }elseif($dataFila['fila_16'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 208);
                    $pdf->Cell(25,0, ($dataFila['fila_16']),0,0,'C');
           }


           

            if($dataFila['fila_17'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 216);
                    $pdf->Cell(25,0, ($dataFila['fila_17']),0,0,'C');
           }elseif($dataFila['fila_17'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 216);
                    $pdf->Cell(25,0, ($dataFila['fila_17']),0,0,'C');
           }elseif($dataFila['fila_17'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 216);
                    $pdf->Cell(25,0, ($dataFila['fila_17']),0,0,'C');
           }


            
            
            if($dataFila['fila_18'] == 1){

                   $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(101, 224    );
                    $pdf->Cell(25,0, ($dataFila['fila_18']),0,0,'C');
           }elseif($dataFila['fila_18'] == 2){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(117, 224    );
                    $pdf->Cell(25,0, ($dataFila['fila_18']),0,0,'C');
           }elseif($dataFila['fila_18'] == 3){
                    $pdf->SetFont('Helvetica', '', 9, '', 'false');
                    $pdf->SetXY(133, 224     );
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
                $pdf->SetXY(102,231);
                $pdf->Cell(25,0, ($calificacion18),0,0,'C');
                
                }else{
                $calificacion18 = ($calificacion17 + 0) ;
                
                $pdf->SetFont('Helvetica', '', 9, '', 'false');
                $pdf->SetXY(102,231);
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
                $pdf->SetXY(118,231);
                $pdf->Cell(25,0, ($calificacionR),0,0,'C');
                
                }else{
                $calificacionR = ($calificacionQ + 0) ;
                
                $pdf->SetFont('Helvetica', '', 9, '', 'false');
                $pdf->SetXY(118,231);
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
                $pdf->SetXY(134,231);
                $pdf->Cell(25,0, ($calificacion1R),0,0,'C');
                
                }else{
                $calificacion1R = ($calificacion1Q + 0) ;
                
                $pdf->SetFont('Helvetica', '', 9, '', 'false');
                $pdf->SetXY(134,231);
                $pdf->Cell(25,0 ,($calificacion1R),0,0,'C');
                }
             
    



               $notafinal =($calificacion1R + $calificacionR + $calificacion18);
               $pdf->SetFont('helvetica','',12); 
               $pdf->SetXY(115,238);
               $pdf->Cell(30, 0, ($notafinal),0,0,'C');



if  ($notafinal >= 43 && $notafinal <=54){
                  $TipoEvaluacionAnual ="A";
                  $pdf->SetFont('helvetica','',20); 
                  $pdf->SetXY(183, 234);
                 // $pdf->Cell(60, 0, ($TipoEvaluacionAnual));
                  }
                  elseif($notafinal >= 26 &&  $notafinal  <=42){
                  $TipoEvaluacionAnual ="B";
                  $pdf->SetFont('helvetica','',20); 
                  $pdf->SetXY(183, 234);
                  //$pdf->Cell(60, 0, ($TipoEvaluacionAnual));
                  }
                  elseif($notafinal >= 18 &&  $notafinal  <=25){
                  $TipoEvaluacionAnual ="C";
                  $pdf->SetFont('helvetica','',20); 
                  $pdf->SetXY(183, 234);
                  $pdf->Cell(60, 0, ($TipoEvaluacionAnual));
                 }
                 $pdf->Cell(60, 0, ($TipoEvaluacionAnual));

}




        if($total1 >0){

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(8, 248.5);
    $pdf->MultiCell(195, 5, utf8_decode ($dataFila['desempeno']), 0, 'l', 0, 0, '', '', true);       
            
    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 93);
    $pdf->MultiCell(51, 3, utf8_decode ($dataFila['observ_1']), 0, 'L', 0, 0, '', '', true);
    

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 100);
    $pdf->MultiCell(51, 3, utf8_decode ($dataFila['observ_2']), 0, 'L', 0, 0, '', '', true);
    

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 112);
    $pdf->MultiCell(51, 3, utf8_decode ($dataFila['observ_3']), 0, 'L', 0, 0, '', '', true);            

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 119);
    $pdf->MultiCell(51, 3, utf8_decode ($dataFila['observ_4']), 0, 'L', 0, 0, '', '', true);
    

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 130);
    $pdf->MultiCell(51, 2, utf8_decode ($dataFila['observ_5']), 0, 'L', 0, 0, '', '', true);
    

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 135.5);
    $pdf->MultiCell(51, 2, utf8_decode ($dataFila['observ_6']), 0, 'L', 0, 0, '', '', true);            

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 141);
    $pdf->MultiCell(51, 3, utf8_decode ($dataFila['observ_7']), 0, 'L', 0, 0, '', '', true);
    

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 149);
    $pdf->MultiCell(51, 2, utf8_decode ($dataFila['observ_8']), 0, 'L', 0, 0, '', '', true);
    

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 154);
    $pdf->MultiCell(51, 3, utf8_decode ($dataFila['observ_9']), 0, 'L', 0, 0, '', '', true);            
            
    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 160.5);
    $pdf->MultiCell(51, 3, utf8_decode ($dataFila['observ_10']), 0, 'L', 0, 0, '', '', true);    
    
    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 172);
    $pdf->MultiCell(51, 3, utf8_decode ($dataFila['observ_11']), 0, 'L', 0, 0, '', '', true);
    

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 178.5);
    $pdf->MultiCell(51, 3, utf8_decode ($dataFila['observ_12']), 0, 'L', 0, 0, '', '', true);
    

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 186);
    $pdf->MultiCell(51, 3, utf8_decode ($dataFila['observ_13']), 0, 'L', 0, 0, '', '', true);            
             
    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 191.5);
    $pdf->MultiCell(51, 3, utf8_decode ($dataFila['observ_14']), 0, 'L', 0, 0, '', '', true);
    

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 198);
    $pdf->MultiCell(51, 3, utf8_decode ($dataFila['observ_15']), 0, 'L', 0, 0, '', '', true);
    

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 205);
    $pdf->MultiCell(51, 3,utf8_decode($dataFila['observ_16']), 0, 'L', 0, 0, '', '', true);            

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 212);
    $pdf->MultiCell(51, 3, utf8_decode($dataFila['observ_17']), 0, 'L', 0, 0, '', '', true);
    

    $pdf->SetFont('Helvetica', '', 7, '', 'false');
    $pdf->SetXY(153, 220);
    $pdf->MultiCell(51, 3, utf8_decode ($dataFila['observ_18']), 0, 'L', 0, 0, '', '', true);
    
        }

    
    
    
    
       if($dataFila['firma_empleado']!=""){
            
          $pdf->SetXY(134,232);
          $pdf->Image('./firmas_administrativas/'.($dataFila['firma_empleado']), 45, 257,23 , 7, 'png');
            }
            
            if($dataFila['firma']!=""){
            
                $pdf->SetXY(134,232);
                $pdf->Image('./firmas_evaluativas/'.($dataFila['firma']), 145, 257,23 , 7, 'png');
                  }
                  

    $TipoEvaluacionAnual ="X";
    $pdf->SetFont('helvetica','',14); 
    $pdf->SetXY(195, 40);
    $pdf->Cell(60, 0, ($TipoEvaluacionAnual));


   $pdf->Output('Resultado_'.($dataFila['nombre']).'_'.date('d_m_y').'.pdf', 'I');
}

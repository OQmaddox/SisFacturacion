<?php



// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 15, 'CIERRE DE CAJA DIARIO  ', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nego-w');
$pdf->SetTitle('Reporte PDF');
$pdf->SetSubject('Cierre de caja');
$pdf->SetKeywords('Reporte,Cierre');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'BI', 12);

// add a page
$pdf->AddPage();

// set some text to print
$txt = <<<EOD
Creador por : $nombre $apellido 
$fechah


EOD;

// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

$html = '<h1> Fecha del cierre : '.$fecha.'</h1>  <span color="#cc260c">DINERO EFECTIVO</span><hr>';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, 'J', true);
$table =    '<table class="table">';
$table .=   ' <thead>
            <tr>
                <th color="#0c2fcc">Inicio de Caja</th>
                <th color="#0c2fcc">Valor Inicio</th>
                <th color="#ed34e1">Cierre de Caja</th>
                <th color="#ed34e1">Valor Final</th>
                <th color="#048a35">Usuario</th>
                <th>vFinal - vInicial</th>
            </tr>
        </thead>
        <tbody>';
            $sum=0;
                     foreach ($data1 as $result1){ 

        $table .= '<tr>             
                <td >'.$result1->CAJ_FECHA_A.' --></td>                                              
                <th color="#0c2fcc">$'.$result1->CAJ_APERTURA_V.'</th>
                <td >'.$result1->CAJ_FECHA_C.' --></td>
                <th color="#ed34e1">$'.$result1->CAJ_CIERRE_V.'</th>
                <th color="#048a35">'.$result1->USU_NOMBRE.'</th>
                <th scope="row">$'.$rest=$result1->CAJ_CIERRE_V-$result1->CAJ_APERTURA_V.'</th>                                           
            </tr>'; 
             }                                              
      $table .='  </tbody>
    </table>';

$pdf->writeHTMLCell(0, 0, '', '', $table, 0, 1, 0, true, 'C', true);
// ---------------------------------------------------------

$html = ' <span color="#cc260c">INGRESOS O EGRESOS</span><hr>';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, 'J', true);
$table2 =   ' <table class="table">';
$table2 .=   '<thead>
                                                <tr>
                                                    <th>MOTIVO</th>
                                                    <th>FECHA</th>
                                                    <th>DESCRIPCIÓN</th>
                                                    <th color="#048a35">USUARIO</th>
                                                    <th>MONTO</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>';
                                        $sum=0;                                                 
                                         foreach ($data3 as $result3){                                                                
                                        $table2 .= '<tr>';                 
                                            if ($result3->ACC_MOTIVO=='EGRESO') {
                                                $table2 .='<th scope="row" color="#ffab3d">'.$result3->ACC_MOTIVO.'</th> ';
                                                    } else {
                                                $table2 .= '<th scope="row" color="#1a13d6">'.$result3->ACC_MOTIVO.'</th> ';            
                                                    }
                                                    
                                                    $table2 .= '<td class="text-info">'.$result3->ACC_FECHA.'</td>           
                                                    <td class="text-info">'.$result3->ACC_DESCRIPCION.'</td>  
                                                    <th color="#048a35">'.$result3->USU_NOMBRE.'</th>                              
                                                    <th class="text-info">$'.$result3->ACC_MONTO.'</th>                                                                               
                                                </tr> ';
                                                  
                                                 }                                              
                                            
                                                 $table2 .='</tbody>
                                        </table>';

$pdf->writeHTMLCell(0, 0, '', '', $table2, 0, 1, 0, true, 'C', true);
// ---------------------------------------------------------

$html = ' <span color="#cc260c">VENTAS DEL SISTEMA</span><hr>';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, 'J', true);
$table3 =    '<table class="table">
<thead>
   <tr>
      
       <th width="100" color="#048a35">USUARIO</th>
       <th  width="80">Total Usuario </th>
      
       
   </tr>
</thead>
<tbody>';
    
     $sum_fac=0;
            foreach ($data2 as $result2){
             $sum_fac=$result2->FAC_TOTAL1+$sum_fac;         
$table3 .= '<tr>

       <th  width="100" color="#048a35">'.$result2->USU_NOMBRE.'</th>  
       <th  width="60" >$'.round($result2->FAC_TOTAL1,2).'</th>
                                                    
   </tr>'; 
    }                                             
    $table3 .='</tbody>
</table>';

$pdf->writeHTMLCell(0, 0, '', '', $table3, 0, 1, 0, true, 'C', true);
// ---------------------------------------------------------

$table4 =   ' <table class="table">
                                           
<tbody>
    <tr>
        <th  >  </th>
        <th color="#7d13e8">TOTAL DE VENTAS: </th>
        <th color="#7d13e8">$'. round($sum_fac,2).'</th>                                               
    </tr>                                               
</tbody>
</table>';

$pdf->writeHTMLCell(0, 0, '', '', $table4, 0, 1, 0, true, 'C', true);
// ---------------------------------------------------------


$html = ' <span color="#cc260c">PRODUCTOS VENDIDOS</span><hr>';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, 'J', true);
$table5 =   ' <table border="1">
<thead>
    <tr>
    <th ><p>Nombre del Producto</p></th>
    <th ><p>Cantidad</p></th>
    <th ><p>P/Uni</p></th>
    <th ><p>Total</p></th>
        
     
    </tr>
</thead>
<tbody>';

     $sum=0;
             foreach ($data4 as $result4){
                 $sum=$result4->CANT+$sum;
$table5 .='<tr>
    <th>'.$result4->PROD_NOM.'</th>
        <th>'.$result4->CANT.'</th> 
        <th>'.$result4->PRO_PRECIOA.'</th>   
        <th>'.round(($result4->CANT*$result4->PRO_PRECIOA),2).'</th>                                                
        
   
                                                     
    </tr>'; 
     }                                            
     $table5 .='</tbody>
</table>';                              

$pdf->writeHTMLCell(0, 0, '', '', $table5, 0, 1, 0, true, 'C', true);
// ---------------------------------------------------------
$table6 =    '<table class="table">
                                           
<tbody>
    <tr>
        <th  >  </th>
        <th color="#7d13e8">TOTAL ITEMS VENDIDOS:  </th>
        <th color="#7d13e8">'.$sum.'</th>                                               
    </tr>                                               
</tbody>
</table>  ';                           

$pdf->writeHTMLCell(0, 0, '', '', $table6, 0, 1, 0, true, 'C', true);
// ---------------------------------------------------------

// --------------------------facturas diarias-------------------------------
$html = ' <span color="#cc260c">VENTAS REGISTRADAS</span><hr>';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, 'J', true);
$table7 = '<table class="table table-bordered">
<thead class="thead-dark">
  <tr>
  
    <th>Documento #</th>
    <th>USUARIO</th>
    <th>NOMBRE CLIENTE</th>
    <th>FECHA</th>
    <th>TOTAL FACTURA</th>
    
  </tr>
</thead>
<tbody id="myTable">';
  $i =1;
        foreach ($data5 as $result5){

$table7 .='<tr>
            <th scope="row">'.$result5->factura_id.'</th>
            <td>'.$result5->USU_NOMBRE.'</td>
            <td>'.$result5->CLI_NOMBRE.'</td>
            <td>'.$result5->FAC_FECHA.'</td>
            <td>'.$result5->FAC_TOTAL.'</td> 
           
            
      </tr>';
    } 
    $table7 .='</tbody>
</table>';                             

$pdf->writeHTMLCell(0, 0, '', '', $table7, 0, 1, 0, true, 'C', true);
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Cierre_caja_general.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
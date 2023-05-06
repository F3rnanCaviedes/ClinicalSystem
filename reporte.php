<?php 
//Activamos el almacenamiento en el buffer
ob_start();
//Inlcuímos a la clase PDF_MC_Table
require('../PDF_MC_Table.php');

//Instanciamos la clase para generar el documento pdf
$pdf=new PDF_MC_Table();

//Agregamos la primera página al documento pdf
$pdf->AddPage();

//Seteamos el inicio del margen superior en 25 pixeles 
$y_axis_initial = 25;

//Seteamos el tipo de letra y creamos el título de la página. No es un encabezado no se repetirá
$pdf->SetFont('Arial','B',12);

$pdf->Cell(40,6,'',0,0,'C');
$pdf->Cell(100,6,'LISTA DE PERSONAS',1,0,'C'); 
$pdf->Ln(10);

//Creamos las celdas para los títulos de cada columna y le asignamos un fondo gris y el tipo de letra
$pdf->SetFillColor(232,232,232); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(15,6,utf8_decode('Nit'),1,0,'C',1); 
$pdf->Cell(35,6,utf8_decode('Nombre Persona'),1,0,'C',1);
$pdf->Cell(35,6,utf8_decode('Email'),1,0,'C',1);
$pdf->Cell(15,6,utf8_decode('Genero'),1,0,'C',1);
$pdf->Cell(25,6,utf8_decode('Nacionalidad'),1,0,'C',1);
$pdf->Cell(25,6,utf8_decode('Estado Civil'),1,0,'C',1);
$pdf->Cell(25,6,utf8_decode('Cumpleaños'),1,0,'C',1);
$pdf->Cell(15,6,utf8_decode('RH'),1,0,'C',1);

$pdf->Ln(16);
//Comenzamos a crear las filas de los registros según la consulta mysql
require_once "../funciones.php";
// $articulo = new Articulo();
//Implementamos las celdas de la tabla con los registros a mostrar
$pdf->SetWidths(array(15,35,35,15,25,25,25,15));

$mysqli = new mysqli('localhost', 'root', '', 'proyecto_final');                               
$query = $mysqli -> query ("SELECT
Nit,
CONCAT(First_Name,' ',Second_Name,' ',SurName,' ',SecondSurname) As NamePerson,            
Email,
CASE 
    WHEN Gender = 1 THEN 'Mujer' 
    WHEN Gender = 2 THEN 'Hombre' 
END AS Gender,
CASE
    WHEN Nacionality = 1 THEN 'Colombiano'
    WHEN Nacionality = 2 THEN 'Extranjero'
END AS Nacionality,
CASE
    WHEN Marital_Status = 1 THEN 'Soltero'
    WHEN Marital_Status = 2 THEN 'Casado'
    WHEN Marital_Status = 3 THEN 'Separado '
    WHEN Marital_Status = 4 THEN 'Viudo'
END AS Marital_Status,    
Birthday,
RH
FROM person");

while ($resultado = mysqli_fetch_array($query)){

    $pdf->SetFont('Arial','',10);
    $pdf->Row(array(
    utf8_decode($resultado['Nit']),
    utf8_decode($resultado['NamePerson']),    
    utf8_decode($resultado['Email']),
    utf8_decode($resultado['Gender']),
    utf8_decode($resultado['Nacionality']),
    utf8_decode($resultado['Marital_Status']),
    utf8_decode($resultado['Birthday']),
    utf8_decode($resultado['RH'])
    ));
   
}

// $rspta = $articulo->obtener_todos_registros();


// while($reg= $rspta->fetch_object())
// {  
//     $nombre = $reg->Nit;
//     $categoria = $reg->First_Name;

     
  
// }

//Mostramos el documento pdf
$pdf->Output();

ob_end_flush();
?>
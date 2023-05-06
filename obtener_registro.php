<?php

include("../conexion.php");
include("funciones.php");

if (isset($_POST["idPerson"])) {
    $salida = array();
    $stmt = $conexion->prepare("SELECT idPerson,
    Nit,
    First_Name,
    Second_Name,
    SurName,
    SecondSurname,            
    Telephone,
    Email,
    Gender,
    Nacionality,
    Marital_Status,    
    Birthday,
    RH 
    FROM person WHERE idPerson = '".$_POST["idPerson"]."' LIMIT 1");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    foreach($resultado as $fila){           
        $salida["idPerson"] = $fila["idPerson"];
        $salida["Nit"] = $fila["Nit"];
        $salida["First_Name"] = $fila["First_Name"] ;
        $salida["Second_Name"] = $fila["Second_Name"] ;
        $salida["SurName"] = $fila["SurName"];
        $salida["SecondSurname"] = $fila["SecondSurname"] ;
        $salida["Telephone"] = $fila["Telephone"];
        $salida["Email"] = $fila["Email"];        
        $salida["Gender"] = $fila["Gender"];        
        $salida["Nacionality"] = $fila["Nacionality"];
        $salida["Marital_Status"] = $fila["Marital_Status"];
        $salida["Birthday"] = $fila["Birthday"];
        $salida["RH"] = $fila["RH"];    
    }

    echo json_encode($salida);
}
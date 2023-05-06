<?php

include("../conexion.php");
include("funciones.php");


if ($_POST["operacion"] == "Crear") {

        $stmt = $conexion->prepare("INSERT INTO person(Nit, First_Name, Second_Name, SurName, SecondSurname,Telephone, Email,Gender,Nacionality,Marital_Status,Birthday,RH)
        VALUES(:Nit, :First_Name, :Second_Name, :SurName, :SecondSurname, :Telephone, :Email, :Gender,:Nacionality,:Marital_Status,:Birthday,:RH)");

        $resultado = $stmt->execute(
            array(
                ':Nit'    => $_POST["Nit"],
                ':First_Name'    => $_POST["First_Name"],
                ':Second_Name'    => $_POST["Second_Name"],
                ':SurName'    => $_POST["SurName"],
                ':SecondSurname'    => $_POST["SecondSurname"],
                ':Telephone'    => $_POST["Telephone"],
                ':Email'    => $_POST["Email"],
                ':Gender'    => $_POST["Gender"],
                ':Nacionality'    => $_POST["Nacionality"],
                ':Marital_Status'    => $_POST["Marital_Status"],
                ':Birthday'    => $_POST["Birthday"],
                ':RH'    => $_POST["RH"]
            )
        );

        if (!empty($resultado)) {
            echo 'Registro creado';
        }   

}


if ($_POST["operacion"] == "Editar") {

        $stmt = $conexion->prepare("UPDATE person SET Nit=:Nit, First_Name=:First_Name, Second_Name=:Second_Name, SurName=:SurName, 
        SecondSurname=:SecondSurname,Telephone=:Telephone, Email=:Email,Gender=:Gender,Nacionality=:Nacionality,
        Marital_Status=:Marital_Status,Birthday=:Birthday,RH=:RH WHERE idPerson = :idPerson");
    
        $resultado = $stmt->execute(
            array(
                ':Nit'    => $_POST["Nit"],
                ':First_Name'    => $_POST["First_Name"],
                ':Second_Name'    => $_POST["Second_Name"],
                ':SurName'    => $_POST["SurName"],
                ':SecondSurname'    => $_POST["SecondSurname"],
                ':Telephone'    => $_POST["Telephone"],
                ':Email'    => $_POST["Email"],
                ':Gender'    => $_POST["Gender"],
                ':Nacionality'    => $_POST["Nacionality"],
                ':Marital_Status'    => $_POST["Marital_Status"],
                ':Birthday'    => $_POST["Birthday"],
                ':RH'    => $_POST["RH"],
                ':idPerson'    => $_POST["idPerson"]
            )
        );
    
        if (!empty($resultado)) {
            echo 'Registro actualizado';
        }
    

   
}
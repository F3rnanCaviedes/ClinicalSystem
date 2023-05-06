<?php

    include("../conexion.php");
    include("funciones.php");

    $query = "";
    $salidPersona = array();
    $query = "SELECT
            idPerson,
            Nit,
            First_Name,
            Second_Name,
            SurName,
            SecondSurname,            
            Telephone,
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
        FROM person;
        ";

    if (isset($_POST["search"]["value"])) {
       $query .= 'WHERE Nit LIKE "%' . $_POST["search"]["value"] . '%" ';
       $query .= 'OR First_Name LIKE "%' . $_POST["search"]["value"] . '%" ';
    }

    if (isset($_POST["order"])) {
        $query .= 'ORDER BY' . $_POST['order']['0']['column'] .' '.$_POST["order"][0]['dir'] . ' ';        
    }else{
        $query .= 'ORDER BY idPerson DESC ';
    }

    if($_POST["length"] != -1){
        $query .= 'LIMIT ' . $_POST["start"] . ','. $_POST["length"];
    }



    $stmt = $conexion->prepare($query);
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    $datos = array();
    $filtered_rows = $stmt->rowCount();
    foreach($resultado as $fila){
      
        $sub_array = array();
        $sub_array[] = $fila["idPerson"];
        $sub_array[] = $fila["Nit"];
        $sub_array[] = $fila["First_Name"] .' '. $fila["Second_Name"] ;
        $sub_array[] = $fila["SurName"] .' '. $fila["SecondSurname"] ;            
        $sub_array[] = $fila["Telephone"];
        $sub_array[] = $fila["Email"];        
        $sub_array[] = $fila["Gender"];        
        $sub_array[] = $fila["Nacionality"];
        $sub_array[] = $fila["Marital_Status"];
        $sub_array[] = $fila["Birthday"];
        $sub_array[] = $fila["RH"];            
        $sub_array[] = '<button type="button" name="editar" idPerson="'.$fila["idPerson"].'" class="btn btn-warning btn-xs editar">Editar</button>';
        $sub_array[] = '<button type="button" name="borrar" idPerson="'.$fila["idPerson"].'" class="btn btn-danger btn-xs borrar">Borrar</button>';
        $datos[] = $sub_array;
    }

    $salidPersona = array(
        "draw"               => intval($_POST["draw"]),
        "recordsTotal"       => $filtered_rows,
        "recordsFiltered"    => obtener_todos_registros(),
        "data"               => $datos
    );

    echo json_encode($salidPersona);
    
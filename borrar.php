<?php

include('../conexion.php');
include("funciones.php");

if(isset($_POST["idPerson"]))
{
	
	$stmt = $conexion->prepare(
		"DELETE FROM person WHERE idPerson = :idPerson"
	);
	$resultado = $stmt->execute(
		array(
			':idPerson'	=>	$_POST["idPerson"]
		)
	);
	
	if(!empty($resultado))
	{
		echo 'Registro borrado';
	}else{
		echo 'Error, no se puede borrar! Existe una relación';
	}
}



?>
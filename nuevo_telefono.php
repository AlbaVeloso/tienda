<?php

if(! isset($_POST["telefono"]) ){
    header("Location: proveedores");
    exit();
}
include ("conexiondb.php");
$sql="INSERT INTO telefonos (numero, idproveedores) VALUES (:numero, :idproveedores)";
$stm=$conexion->prepare($sql);
$stm->bindParam(":idproveedores", $_POST["id"]);
$stm->bindParam(":numero", $_POST["telefono"]);
$stm->execute();
$id=$conexion->lastInsertId();
header("location: proveedores?id=$id");




?>
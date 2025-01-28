<?php

if(! isset($_POST["calle"]) ){
    header("Location: proveedores");
    exit();
}
include ("conexiondb.php");
$sql="INSERT INTO direcciones (calle, numero, comuna, ciudad, proveedores_id) VALUES (:calle, :numero, :comuna, :ciudad, :proveedorid)";
$stm=$conexion->prepare($sql);
$stm->bindParam(":calle", $_POST["calle"]);
$stm->bindParam(":numero", $_POST["numero"]);
$stm->bindParam("comuna", $_POST["comuna"]);
$stm->bindParam("ciudad", $_POST["ciudad"]);
$stm->bindParam("idproveedor", $_POST["idproveedor"]);
$stm->execute();
$id=$conexion->lastInsertId();
header("location: proveedores?id=$id");




?>
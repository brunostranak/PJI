<?php

session_start();
require("../conexaobd.php");
$cnx= conexao();

$id=$_SESSION["idUser"];
$bio=strip_tags($_POST["bio"]);


$sql="UPDATE usuarios SET bio='$bio' WHERE idUser='$id'";

mysqli_query($cnx,$sql);

header("location:perfil.php");   

?>


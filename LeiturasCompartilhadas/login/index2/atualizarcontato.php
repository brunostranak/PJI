<?php

session_start();
require("../conexaobd.php");
$cnx= conexao();

$id=$_SESSION["idUser"];
$email=$_POST["email"];
$telefone=$_POST["telefone"];

$sql="UPDATE usuarios SET email='$email', telefone='$telefone' WHERE idUser='$id'";

mysqli_query($cnx,$sql);

header("location:perfil.php");




?>


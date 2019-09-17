<?php

session_start();
require("../conexaobd.php");
$cnx= conexao();

$id=$_SESSION["idUser"];
$email=strip_tags($_POST["email"]);
$telefone=strip_tags($_POST["telefone"]);

$sql="UPDATE usuarios SET email='$email', telefone='$telefone' WHERE idUser='$id'";

mysqli_query($cnx,$sql);

header("location:perfil.php");




?>


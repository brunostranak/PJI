<?php
session_start();
require("../conexaobd.php");
$cnx= conexao();
$sql="delete from notific where idUser=$_SESSION[idUser]";

mysqli_query($cnx,$sql);


header("location:perfil.php");


?>


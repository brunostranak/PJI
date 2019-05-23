<?php
session_start();
require("../conexaobd.php");
$cnx= conexao();

$feedback=$_POST["fb"];

$sql="INSERT INTO feedbacks (idUser,idLivro,feedback) VALUES('$_SESSION[idUser]','$_GET[idlivro]','$feedback')";
mysqli_query($cnx, $sql);
header("location:sobrelivro.php?id=".$_GET[idlivro]);

?>

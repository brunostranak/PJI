<?php
session_start();
require("../conexaobd.php");
$cnx= conexao();
$idfeedback=$_GET["feed"];
$idlivro=$_GET["livro"];




$sql="delete FROM feedbacks where idFeedback = '$idfeedback'";

mysqli_query($cnx,$sql);
   
   
header("location:sobrelivro.php?id=".$idlivro);


?>


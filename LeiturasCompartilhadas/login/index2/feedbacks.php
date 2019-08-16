<?php
session_start();
require("../conexaobd.php");
$cnx= conexao();

$feedback=$_POST["fb"];

$sql="INSERT INTO feedbacks (idUser,idLivro,feedback) VALUES('$_SESSION[idUser]','$_GET[idlivro]','$feedback')";
mysqli_query($cnx, $sql);

$sqlfb= "SELECT COUNT(idFeedback) FROM feedbacks WHERE idLivro='$_GET[idlivro]';";
$qtdFeed= mysqli_query($cnx,$sqlfb);
$qtdFeed= mysqli_fetch_array($qtdFeed);


$sql2="UPDATE livros set qtdFeed = '$qtdFeed[0]' WHERE idLivro = '$_GET[idlivro]';";
mysqli_query($cnx, $sql2);



header("location:sobrelivro.php?id=".$_GET[idlivro]);

?>

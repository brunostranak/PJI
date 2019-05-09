<?php
session_start();
require("../conexaobd.php");
$cnx= conexao();


$sql= "UPDATE livros SET status='afk' WHERE idLivro = '$_GET[id]'";

$dtInicio=date("d/m/Y");

$dtFim= date('d/m/Y', strtotime('+1 months'));
$sql2= "INSERT INTO emprestimos (idLivro,idEmprestante,dtInicio,dtFim VALUES('$_GET[id]','$_SESSION[idUser],'$dtInicio','$dtFim')";
mysqli_query($cnx,$sql);

header("location:sobrelivro.php?id='$_GET[id]'");

?>


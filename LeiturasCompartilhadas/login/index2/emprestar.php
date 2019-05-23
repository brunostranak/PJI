<?php
session_start();
require("../conexaobd.php");
$cnx= conexao();


$sql= "UPDATE livros SET status='afk' WHERE idLivro = '$_GET[id]'";

$dtInicio=date("Y-m-d");

$dtFim= date('Y-m-d', strtotime('+1 months'));
$sql1= "SELECT idUser from livros WHERE idLivro='$_GET[id]'";
$result=mysqli_query($cnx,$sql1);
$idDono= mysqli_fetch_assoc($result);
$idDono= $idDono["idUser"];
$sql2= "INSERT INTO emprestimos (idLivro,idUser,idEmprestante,dtInicio,dtFim ) VALUES('$_GET[id]','$idDono','$_SESSION[idUser]','$dtInicio','$dtFim')";
mysqli_query($cnx,$sql);
mysqli_query($cnx,$sql2);
echo mysqli_error($cnx);


$id= $_GET["id"];

header("location:sobrelivro.php?id=".$id);


?>


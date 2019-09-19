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

$sql3="SELECT e.idUser, e.idEmprestante, e.idEmprestimo, u.nomeUser, l.nomeLivro FROM livros as l, emprestimos as e
        INNER JOIN usuarios ON e.idUser=u.idUser WHERE e.idEmprestimo = (SELECT MAX(e.idEmprestimo));";
$result2=mysqli_query($cnx,$sql3);
echo"<pre>";
print_r($result2);
die();
$registro=mysqli_fetch_assoc($result2);

$idUser=$registro["idUser"];
$idEmprestimo=$registro["idEmprestimo"];
$nomeUser=$registro["nomeUser"];
$nomeLivro=$registro["nomeLivro"];
$texto=$nomeUser." emprestou seu livro '".$nomeLivro."'";
$sql4="INSERT INTO notific (idUser,idEmprestimo,texto) VALUES('$idUser','$idEmprestimo','$texto')";
mysqli_query($sql4);


header("location:sobrelivro.php?id=".$id);


?>


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

$sql3="SELECT e.idUser, e.idEmprestante, e.idEmprestimo, u.nomeUser, l.nomeLivro FROM emprestimos as e
        INNER JOIN usuarios as u ON e.idUser=u.idUser INNER JOIN livros as l ON l.idLivro = e.idLivro WHERE e.idEmprestimo = (select max(e.idEmprestimo) from emprestimos as e)";
$result2=mysqli_query($cnx,$sql3);

$registro=mysqli_fetch_assoc($result2);
echo mysqli_error($cnx);
$idUser=$registro["idUser"];
$idEmprestimo=$registro["idEmprestimo"];
$nomeUser=$registro["nomeUser"];
$nomeLivro=$registro["nomeLivro"];
$texto=$nomeUser." emprestou seu livro ".$nomeLivro;

print_r($registro);
die();
$sql4="INSERT INTO notific (idUser,idEmprestimo,texto) VALUES('$idUser','$idEmprestimo','$texto')";
mysqli_query($cnx,$sql4);



header("location:sobrelivro.php?id=".$id);


?>

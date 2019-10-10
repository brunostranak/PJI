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


$sql3="SELECT e.idEmprestimo, u.nomeUser, l.nomeLivro FROM usuarios as u 
    INNER JOIN emprestimos as e ON e.idEmprestante = u.idUser 
    INNER JOIN livros as l ON e.idLivro = l.idLivro WHERE e.idEmprestimo=(SELECT MAX(e.idEmprestimo) FROM emprestimos) 
    ";


$result2=mysqli_query($cnx,$sql3);


$registro=mysqli_fetch_assoc($result2);


$sql5=" SELECT nomeUser FROM usuarios WHERE idUser=$_SESSION[idUser]";
$result3=mysqli_query($cnx,$sql5);
$registro2=mysqli_fetch_assoc($result3);

$idUser=$_SESSION["idUser"];
$idEmprestimo=$registro["idEmprestimo"];
$nomeUser=$registro2["nomeUser"];
$nomeLivro=$registro["nomeLivro"];
$texto=$nomeUser." emprestou seu livro ".$nomeLivro;


$sql4="INSERT INTO notific (idUser,idEmprestimo,texto) VALUES('$idUser','$idEmprestimo','$texto')";
mysqli_query($cnx,$sql4);



header("location:sobrelivro.php?id=".$id);


?>

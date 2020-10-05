<?php

session_start();
require("../conexaobd.php");
$cnx= conexao();
$id=$_GET["id"];
$dtInicio=date("Y-m-d");
$sql1= "SELECT idUser from livros WHERE idLivro='$_GET[id]'";
$result=mysqli_query($cnx,$sql1);
$idDono= mysqli_fetch_assoc($result);
$idDono= $idDono["idUser"];

$sql3="SELECT e.dtInicio, e.idEmprestimo, u.nomeUser, l.nomeLivro FROM usuarios as u 
    INNER JOIN emprestimos as e ON e.idEmprestante = u.idUser 
    INNER JOIN livros as l ON e.idLivro = l.idLivro ORDER BY e.idEmprestimo DESC LIMIT 0, 1
    ";


$result2=mysqli_query($cnx,$sql3);


$registro=mysqli_fetch_assoc($result2);



$sql5=" SELECT nomeUser FROM usuarios WHERE idUser=$_SESSION[idUser]";
$result3=mysqli_query($cnx,$sql5);
$registro2=mysqli_fetch_assoc($result3);


$idEmprestimo=$registro["idEmprestimo"];
$nomeUser=$registro2["nomeUser"];
$nomeLivro=$registro["nomeLivro"];
$texto=$nomeUser." devolveu seu livro ".$nomeLivro;

$sql="UPDATE livros SET status='on' where idLivro=$id";
#$sql2="INSERT INTO notific (idUser,idEmprestimo,texto,dtInicio) VALUES('$idDono','$idEmprestimo','$texto','$dtInicio');";


mysqli_query($cnx,$sql);


#mysqli_query($cnx,$sql2);



header("location:http://localhost/LeiturasCompartilhadas/login/index2/sobrelivro.php?id=$id");
?>

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


$dtInicio=date("Y-m-d");
$sql1= "SELECT idUser from livros WHERE idLivro='$_GET[idlivro]'";
$result=mysqli_query($cnx,$sql1);
$idDono= mysqli_fetch_assoc($result);
$idDono= $idDono["idUser"];

$sql3="SELECT e.dtInicio, e.idEmprestimo, u.nomeUser, l.nomeLivro FROM usuarios as u 
    INNER JOIN emprestimos as e ON e.idEmprestante = u.idUser 
    INNER JOIN livros as l ON e.idLivro = $_GET[idlivro] ORDER BY e.idEmprestimo DESC LIMIT 0, 1
    ";


$result2=mysqli_query($cnx,$sql3);


$registro=mysqli_fetch_assoc($result2);


$sql5=" SELECT nomeUser FROM usuarios WHERE idUser=$_SESSION[idUser]";
$result3=mysqli_query($cnx,$sql5);
$registro2=mysqli_fetch_assoc($result3);


$idEmprestimo=$registro["idEmprestimo"];
$nomeUser=$registro2["nomeUser"];
$nomeLivro=$registro["nomeLivro"];
$texto=$nomeUser." fez um comentário sobre seu livro ".$nomeLivro;

$sql4="INSERT INTO notific (idUser,idEmprestimo,texto,dtInicio) VALUES('$idDono','$idEmprestimo','$texto','$dtInicio');";

mysqli_query($cnx,$sql4);

header("location:sobrelivro.php?id=".$_GET[idlivro]);

?>

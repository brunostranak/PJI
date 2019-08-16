<?php
session_start();
require("../conexaobd.php");
$cnx= conexao();
$idlivro=$_GET["id"];

$sqlfb= "SELECT COUNT(idFeedback) FROM feedbacks WHERE idLivro='$idlivro]';";
$qtdFeed= mysqli_query($cnx,$sqlfb);
$qtdFeed= mysqli_fetch_array($qtdFeed);


$sql3="UPDATE livros set qtdFeed = '$qtdFeed[0]' WHERE idLivro = '$idlivro';";
mysqli_query($cnx, $sql3);



$sql="delete FROM livros where idLivro = '$idlivro'";
$sql2="SELECT * FROM livros where idLivro='$idlivro' and status='on' and qtdFeed='NULL'";

$status= mysqli_query($cnx,$sql2);
$status= mysqli_fetch_assoc($status);
print_r($status);



if(!empty($status)){
mysqli_query($cnx,$sql);


header("location:perfil.php");
}else{
    
$_SESSION["error"]=1;    
    
header("location:perfil.php");
}
    
    
    
    









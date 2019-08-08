<?php
session_start();
require("../conexaobd.php");
$cnx= conexao();


$idlivro=$_GET["id"];

$sql="delete FROM livros where idLivro = '$idlivro'";
$sql2="SELECT * FROM livros where idLivro='$idlivro' and status='on'";

$status=mysqli_query($cnx,$sql2);

if($status){
mysqli_query($cnx,$sql);

header("location:perfil.php");
}else{
$_SESSION["status"]="afk";    
header("location:perfil.php");
}
    
    
    
    









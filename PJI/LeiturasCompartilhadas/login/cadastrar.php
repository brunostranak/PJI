<?php
session_start();
require("conexaobd.php");

$cnx= conexao();


$nome= strip_tags($_POST["nome"]);
$email=strip_tags($_POST["email"]);
$senha=strip_tags($_POST["senha"]);



$sql = "INSERT INTO usuarios (nomeUser,email,senha) 
 VALUES ('$nome','$email','$senha')";

$sql2= "SELECT * FROM usuarios WHERE email = '$email'";
$resultadoverific=mysqli_query($cnx,$sql2);
$vetorinformacoes=mysqli_fetch_assoc($resultadoverific);
if (isset($vetorinformacoes)){
    $_SESSION["msg"]="Já há um cadastro com esse email!";
   
    header('location:paginacadastro.php');
}else{
    session_destroy();
    
$resultado = mysqli_query($cnx,$sql);
header('location:index.php');
}



?>
<?php
session_start();
require("conexaobd.php");

$cnx= conexao();
$email=strip_tags($_POST["email"]);
$senha=strip_tags($_POST["senha"]);

$sql="SELECT * FROM usuarios WHERE email='$email' and senha='$senha'";

$resultados=mysqli_query($cnx,$sql);

$registros= mysqli_fetch_assoc($resultados);


if(!empty($registros)){
    $_SESSION["logado"]="on";
    $_SESSION["nomeUser"]=$registros["nomeUser"];
    $_SESSION["idUser"]=$registros["idUser"];
    header("location:index2/inicio.php");
}else{
    $_SESSION["msg"]="Credenciais inválidas!";
    header("location:index.php");
}


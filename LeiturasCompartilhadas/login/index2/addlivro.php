<?php
session_start();

$idUser=$_SESSION["idUser"];
require("../conexaobd.php");
$cnx= conexao();
$imagem= $_FILES["imagem"];
$nome= strip_tags($_POST["nome"]);
$autor= strip_tags($_POST["autor"]);
$editora= strip_tags($_POST["editora"]);
$resumo= strip_tags($_POST["resumo"]);



 move_uploaded_file($imagem["tmp_name"],"C:/wamp64/www/PJI/LeiturasCompartilhadas/login/imagens/".$imagem["name"]);
 
 
$sql="INSERT INTO livros (idUser,nomelivro,autor,editora,status,resumo,imagem)
    VALUES('$idUser','$nome','$autor','$editora','on','$resumo','$imagem[name]');";

$resultado=mysqli_query($cnx,$sql);
echo mysqli_error($cnx);

header("location:perfil.php");


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
$paginas= strip_tags($_POST["paginas"]);
$ano= strip_tags($_POST["ano"]);


 move_uploaded_file($imagem["tmp_name"],"C:/xampp/htdocs/PJI/LeiturasCompartilhadas/login/imagens/".$imagem["name"]);
 
 
$sql="INSERT INTO livros (idUser,nomelivro,autor,editora,status,resumo,ano,páginas,imagem)
    VALUES('$idUser','$nome','$autor','$editora','on','$resumo','$ano','$paginas','$imagem[name]');";

$resultado=mysqli_query($cnx,$sql);


if (mysqli_error($cnx)){
    header("location:submeter.php");
    $_SESSION["error"]=1;
}else{
    header("location:submeter.php");
    $_SESSION["error"]=0;
}





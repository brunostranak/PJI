<?php
session_start();

$idUser=$_SESSION["idUser"];
require("../conexaobd.php");
$cnx= conexao();
$nome= strip_tags($_POST["nome"]);
$autor= strip_tags($_POST["autor"]);
$editora= strip_tags($_POST["editora"]);
$resumo= strip_tags($_POST["resumo"]);

$sql="INSERT INTO livros (idUser,nomelivro,autor,editora,resumo)
    VALUES('$idUser','$nome','$autor','$editora','$resumo');";

$resultado=mysqli_query($cnx,$sql);
echo mysqli_error($cnx);

header("location:perfil.php");
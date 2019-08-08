<?php
session_start();

$cnx= conexao();
$idlivro=$_GET["id"];

$sql="delete FROM livros where idLivro = '$idlivro'";

mysqli_query($cnx,$sql);







?>
<?php
require("../conexaobd.php");
$cnx= conexao();

echo $_GET["id"];
$sql= "UPDATE livros SET status='afk' WHERE idLivro = '$_GET[id]'";

mysqli_query($cnx,$sql);
header("location:sobrelivro.php");

?>


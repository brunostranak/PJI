<?php
session_start();
require("../conexaobd.php");
$cnx= conexao();


$idlivro=$_GET["id"];

$sql="delete FROM livros where idLivro = '$idlivro'";

mysqli_query($cnx,$sql);

header("location:perfil.php");

}    
    
    
    
</script>








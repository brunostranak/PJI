<?php
session_start();
$imagem= $_FILES["imagem"];
require("conexaobd.php");
     
     
            // Caminho de onde ficará a imagem
            
     
            move_uploaded_file($imagem["tmp_name"],"C:/wamp64/www/PJI/LeiturasCompartilhadas/login/imagens/".$imagem["name"]);
            
           
            
                    
            
                    
            
            
    
    $sql = "UPDATE usuarios SET imagem='$imagem[name]' WHERE idUser='$_SESSION[idUser]'";
    $cnx= conexao();
    mysqli_query($cnx,$sql);
    
    header("location:index2/perfil.php");
?>


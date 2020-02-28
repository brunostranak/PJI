<?php
session_start();
require("../conexaobd.php");
$cnx= conexao();


$sql4="DELETE FROM notific_temp WHERE idUser='$_SESSION[idUser]'";
mysqli_query($cnx, $sql4);

header("Location: ".$_SERVER['HTTP_REFERER']."");


?>

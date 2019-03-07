<?php
function conexao() {
	$cnx = mysqli_connect(
		"localhost", //endereco do servido 
		"root", //usuario do BD
		"", //senha do usuario do BD
		"pji"); //nome da base de dados
		
	
	/*$cnx_servidor = mysqli_connect(
		"fdb17.awardspace.net", //endereco do servido 
		"2546850_webloja", //usuario do BD
		"webloja123", //senha do usuario do BD
		"2546850_webloja"); //nome da base de dados
*/
	return $cnx;
}
?>

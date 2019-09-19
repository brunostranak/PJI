<?php
session_start();


?>




 


<!DOCTYPE html>
<html lang="en" >

<head>
    
    

  <meta charset="UTF-8">
  <title>Flat Login Form</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  
<div class="container">
    
  <div class="info">
    <h1>Crie uma conta ou logue-se!</h1>
    
  </div>
</div>
    
<div class="form">
    
  <div class="thumbnail"><img src="https://image.flaticon.com/icons/svg/201/201556.svg"/></div>
  
  <form action="cadastrar.php" method="post">
      
    <input required type="text" placeholder="Nome e Sobrenome" name="nome"/>
    <input required type="email" placeholder="Email" name="email"/>
   


    <input required type="password" placeholder="Senha" name="senha"/>
    <script>
    function Mascara(objeto){
   if(objeto.value.length == 0)
     objeto.value = '(' + objeto.value;

   if(objeto.value.length == 3)
      objeto.value = objeto.value + ') ';

 if(objeto.value.length == 10)
     objeto.value = objeto.value + '-';
}
</script>
    <input onkeypress="Mascara(this);" required type="text"  placeholder="Celular" name="telefone" maxlength="15"/>
    
    
    <button type="submit">Cadastrar</button>
    <p class="message" style="color:red"><?php
    
    
        if(isset($_SESSION["msg"])){
            echo $_SESSION["msg"];
        }
        ?>
        </p>
    
    
    <p class="message">Já se registrou? <a href="index.php">Logue-se</a></p>
  </form>
</div>




</body>

</html>




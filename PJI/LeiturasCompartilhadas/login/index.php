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
  <form class="login-form" method="post" action="login.php">
    <input type="text" placeholder="Email" name="email">
    <input type="password" placeholder="Senha" name="senha"/>
    <button type='submit'>Login</button>
    <p class="message" style="color:red"><?php
    
    
        if(isset($_SESSION["msg"])){
            echo $_SESSION["msg"];
            unset($_SESSION["msg"]);
        }
        ?>
        </p>
    
    <p class="message">Não se registrou? <a href="paginacadastro.php">Crie uma conta</a></p>
  </form>
</div>
<video id="video" autoplay="autoplay" loop="loop" poster="polina.jpg">
  <source src="http://andytran.me/A%20peaceful%20nature%20timelapse%20video.mp4" type="video/mp4"/>
</video>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>




</body>

</html>


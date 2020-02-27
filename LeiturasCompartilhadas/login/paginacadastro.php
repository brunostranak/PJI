<?php
session_start();


?>




 


<!DOCTYPE html>
<html lang="en" >

<head>
    
    

  <meta charset="UTF-8">
  <title>Flat Login Form</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    
<div class="form" >
    
  <div class="thumbnail"><img src="https://image.flaticon.com/icons/svg/201/201556.svg"/></div>
  
  <form action="cadastrar.php" method="post">
      
    <input required type="text" placeholder="Nome e Sobrenome" name="nome"/>
    <input required placeholder="Data de Nascimento" name="dtNasc" class="textbox-n" type="text" onfocus="(this.type='date')"  id="date">
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
    
    
    <span style="float:left; margin-left:6%;"> Curso</span>
    <select required class="form-control" required id="curso" name="curso">
        <option value="info1">1º ano Integrado Informática</option>
        <option value="info2">2º ano Integrado Informática</option>
        <option value="info3">3º ano Integrado Informática</option>
        <option value="info4">4º ano Integrado Informática</option>
        <option value="eletro1">1º ano Integrado Eletromecânica</option>
        <option value="eletro2">2º ano Integrado Eletromecânica</option>
        <option value="eletro3">3º ano Integrado Eletromecânica</option>
        <option value="eletro4">4º ano Integrado Eletromecânica</option>
        <option value="outro">Outro</option>
    </select>
           
    
    <br>
    
    <span style="float:left; margin-left:6%;"> Gênero</span>
    
    <br>
    <label for="male">Masculino</label>
    
    <input style="width:20px;" type="radio" id="male" name="gender" value="male">
    
    
    <br>
    <label for="female">Feminino</label>
    
    <input style="width:20px;" type="radio" id="female" name="gender" value="female">
    
    <br>
    
    <label for="other">Outro</label>
    
    <input style="width:20px;" type="radio" id="other" name="gender" value="other">
    
    
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




<?php
session_start();
//ob_start();
require("../conexaobd.php");
$cnx= conexao();
$sql="SELECT * from usuarios where idUser='$_SESSION[idUser]'";
$resultado=mysqli_query($cnx,$sql);
$registro=mysqli_fetch_assoc($resultado);
$sql2="SELECT * FROM livros where idUser='$_SESSION[idUser]'";
$resultado2=mysqli_query($cnx,$sql2);
while($livru=mysqli_fetch_assoc($resultado2)){
    $livros[]=$livru;
}
if($_SESSION["logado"]=="on"){
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Leituras Compartilhadas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,
initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500"
rel="stylesheet">


    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
      
    <div class="wrap">

    <div class="block-45">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
              <p style="color:white;font-size:15px">Olá,
<?=$_SESSION["nomeUser"];?></p>
          </div>
          <div class="col-md-6 text-md-right">
            <ul class="block-45-icons">
              <li><a href="3"><span class="fa fa-facebook"></span></a></li>
              <li><a href="3"><span class="fa fa-twitter"></span></a></li>
              <li><a href="3"><span class="fa fa-linkedin"></span></a></li>
              <li><a href="3"><span class="fa fa-instagram"></span></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <header role="banner">

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand absolute" href="inicio.php">Aventure-se!<span class="fa fa-heart text-primary"></span>  </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
            <ul class="navbar-nav ml-auto">
              
                <a class="nav-link" href="inicio.php">Home</a>
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="ministry.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Perfil</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="perfil.php">Meu perfil</a>
                  <a class="dropdown-item" href="../deslogar.php">Sair</a>
                  
                </div>
                </li>
              
              <li class="nav-item">
                <a class="nav-link" href="obras.php">Obras</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="submeter.php">Submeter</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contato</a>
              </li>
            </ul>
            
            
          </div>
        </div>
      </nav>

    </header>
    <!-- END header -->

    <!-- END section -->
    
    <div class="container col-md-8 text-center">
        <br>
        <br>
        <h1>Submeta alguma obra</h1>
        <br>
        <?php
        if(isset($_SESSION["error"])){
        if($_SESSION["error"]==1){
            echo "<div class='alert alert-danger' role='alert'>
  Não foi possível submeter essa obra, tente retirar as aspas do resumo ou entre em contato com os desenvolvedores.
</div>";
        } elseif ($_SESSION["error"]==0) {
           echo "<div class='alert alert-success' role='alert'>
  Obra cadastrada com sucesso!
</div>";
            
        }
        unset($_SESSION["error"]);
        }
        ?>
        
        <form action="addlivro.php" method="post" id="livroform"
enctype="multipart/form-data">
<div class="form-group">
            <input required type="text" class="form-control" name="nome" placeholder="Título">
</div>
            
            
            <div class="form-group">
            <input type="text" class="form-control" required name="autor" placeholder="Autor">
            </div>
            
            <div class="form-group">
            <input type="text" class="form-control" required name="editora" placeholder="Editora">
            </div>
            
            
            
            <div class="form-group">
<textarea form="livroform" class="form-control" required name="resumo" placeholder="Breve resumo (max 1000 caracteres)" rows="10"
cols="50"></textarea>
                </div>
            <br>
            
            <span style="color:black">Imagem da capa (recomendamos que faça o download da internet e o upload aqui em baixo) </span><br>
            <input type="file" name="imagem">
            <br>
            <br>
            <button type="submit" class="btn btn-primary">Cadastrar obra</button>
                <br>
        </form>
        
       
    

        </div>



    <br>
      

<?php
}else{
    
    header("location:../index.php");
}
?>

    

    <footer class="site-footer">
      <div class="container">
        
        <div class="row pt-5">
          <div class="col-md-12 text-center copyright">
            
            <p class="float-md-left"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            <p class="float-md-right">
              <a href="#" class="fa fa-facebook p-2"></a>
              <a href="#" class="fa fa-twitter p-2"></a>
              <a href="#" class="fa fa-linkedin p-2"></a>
              <a href="#" class="fa fa-instagram p-2"></a>

            </p>
          </div>
        </div>
      </div>
    </footer>
    <!-- END footer -->

    

    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular"
width="48px" height="48px"><circle class="path-bg" cx="24" cy="24"
r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle
class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>

    <script src="js/jquery.magnific-popup.min.js"></script>

    <script src="js/main.js"></script>
  </body>
</html>
</div>

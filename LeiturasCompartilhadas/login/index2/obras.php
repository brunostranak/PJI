<?php
session_start();
require("../conexaobd.php");
$cnx= conexao();
$sql2="SELECT * FROM livros";

$resultado2=mysqli_query($cnx,$sql2);
while($livru=mysqli_fetch_assoc($resultado2)){
    
    
    
    $livros[]=$livru;

}


if($_SESSION["logado"]=="on"){
    
    


?>
<!doctype html>
<html lang="pt">
  <head>
    <title>Leituras Compartilhadas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">

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
            <p style="color:white;font-size:15px">Olá, <?=$_SESSION["nomeUser"];?></p>
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
              
              <li class="nav-item active">
                <a class="nav-link" href="obras.php">Obras</a>
              </li>
              <li class="nav-item ">
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

      <div class="container">
        <div class="row align-items-center justify-content-center site-hero-inner">
          <div class="col-md-8 text-center">
  
            <div class="mb-5 element-animate">
              <div class="block-17">
                <h1 class="heading mb-4">Leituras Compartilhadas.</h1>
                
            </div>
            
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

   
            
   
    
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2 class="heading">Obras cadastradas</h2>
            </div>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-md-6 col-lg-4 mb-5">
            <div class="block-20">
              <figure>
                <a href="#"><img src="images/image_1.jpg" alt="Image placeholder" class="img-fluid"></a>
              </figure>
              <div class="text text-center">
                <h3 class="heading"><a href="#">Bible studies like Bereans did</a></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia natus asperiores exercitationem cupiditate!</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-5">
            <div class="block-20">
              <figure>
                <a href="#"><img src="images/image_2.jpg" alt="Image placeholder" class="img-fluid"></a>
              </figure>
              <div class="text text-center">
                <h3 class="heading"><a href="#">Piano Lesson for Children</a></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia natus asperiores exercitationem cupiditate!</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-5">
            <div class="block-20">
              <figure>
                <a href="#"><img src="images/image_3.jpg" alt="Image placeholder" class="img-fluid"></a>
              </figure>
              <div class="text text-center">
                <h3 class="heading"><a href="#">The Truth will set us free</a></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia natus asperiores exercitationem cupiditate!</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>
        </div> -->
      </div>
        
        
              <div style="text-align:center" class="container">

      <?php



        if(!empty($livros)){
            foreach ($livros as $livro){


?>


                 
        <a href="sobrelivro.php?id=<?=$livro["idLivro"];?>"><img class="image"
style="width:250px;height:350px;padding:30px;"
src="../imagens/<?=$livro["imagem"];?>" alt="Image placeholder" ></a>


   <?php
            }
        }

   ?>

        </div>

    
                      
            

            
           

            


          </div>
        
      
    


    

    
  
    

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
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos os direitos reservados Bruno Stranak | Fernanda Camilo <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
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
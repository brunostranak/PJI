<?php

session_start();

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
    <title>BrotherlyLove Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,
initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500"
rel="stylesheet">
<link rel="stylesheet" type="text/css" href="livros.css">

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
          <a class="navbar-brand absolute" href="perfil.php">Meu Perfil</a>
          <button class="navbar-toggler" type="button"
data-toggle="collapse" data-target="#navbarsExample05"
aria-controls="navbarsExample05" aria-expanded="false"
aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>


          <div class="collapse navbar-collapse navbar-light"
id="navbarsExample05">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                  <a class="nav-link" href="inicio.php">Home</a>
              </li>

              <li class="nav-item dropdown active">

                <a class="nav-link dropdown-toggle" href="perfil.php"
id="dropdown04" data-toggle="dropdown" aria-haspopup="true"
aria-expanded="false">Perfil</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="perfil.php">Meu Perfil</a>

                  <a class="dropdown-item" href="../deslogar.php">Sair</a>

                </div>

              </li>


              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="sermon.html"
id="dropdown05" data-toggle="dropdown" aria-haspopup="true"
aria-expanded="false">Sermons</a>
                <div class="dropdown-menu" aria-labelledby="dropdown05">
                  <a class="dropdown-item" href="sermon.html">Daily Sermon</a>
                  <a class="dropdown-item" href="sermon.html">Music</a>
                  <a class="dropdown-item" href="sermon.html">Audio</a>
                  <a class="dropdown-item" href="sermon.html">Video</a>
                </div>

              </li>
              <li class="nav-item">
                <a class="nav-link" href="events.html">Events</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact</a>
              </li>
            </ul>


          </div>
        </div>
      </nav>

    </header>
    <!-- END header -->


      <div class="container">
        <div class="row align-items-center justify-content-center
site-hero-inner">

            <div style="margin-top:25%" class="block-13">
                <form class="mb-5 element-animate" style="margin-top:
-70%" action="../atualizarinfo.php" method="POST"
enctype="multipart/form-data">
                    <img class="mb-5 element-animate"
style="border-radius: 50px; " width="150px" height="200px"
src="../imagens/<?=$registro["imagem"];?>" alt="Foto de Perfil">

                    <br>
                    <input type="file" name="imagem">

                    <br>
                    <button type='submit'>Enviar</button>
                </form>
                </div>

          <div class="col-md-8 text-center">

            <div class="mb-5 element-animate">
              <div class="block-17">

                <h1 class="heading mb-4">Outreach Ministry</h1>
                <h1 style="margin-left:55%" >Contato</h1>
                <div class="lead"
style="margin-left:55%">Email:<?=$registro["email"]?>
                    <br>
                    Telefone:<?php if(empty($registro["telefone"])){
                        ?>


                    <?php
                    }
                    ?>


                    </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- END section -->
    <div class="container">

        <form action="addlivro.php" method="post" id="livroform"
enctype="multipart/form-data">

            <span style="color:black">Nome da obra</span> <input
required type="text" name="nome">
            <br>
            <br>
            <span style="color:black">Autor </span> <input type="text"
required name="autor">
            <br>
            <br>
            <span style="color:black">Editora </span> <input
type="text" required name="editora">
            <br>
            <br>
            <span style="color:black">Breve resumo </span><br>
<textarea form="livroform" required name="resumo" rows="10"
cols="50"></textarea>
            <br>
            <input type="file" name="imagem">
            <br>
            <button type="submit">Enviar</button>
                <br>
        </form>
        <h1 style="text-align:center">Meus livros</h1>
        <div id="livros" style="text-align:center">
        <?php



        if(!empty($livros)){
            foreach ($livros as $livro){


?>



            <a href="sobrelivro.php?id=<?=$livro['idLivro'];?>"><img class="image"
style="width:250px;height:350px;padding:30px;"
src="../imagens/<?=$livro["imagem"];?>" alt="Image placeholder" ></a>


   <?php
            }
        }

   ?>

        </div>



    <section class="site-section bg-light">
      <div class="container">





          <div class="col-md-8 pl-md-5">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing
elit. Ducimus animi explicabo asperiores accusantium laborum
distinctio quos, placeat eligendi nesciunt aliquid ut corrupti id
sapiente libero, quod doloremque minima odit debitis minus. Sequi enim
quibusdam, doloremque iste iure? Excepturi, ad, ratione!</p>
            <p><img src="images/big_image_1.jpg" alt="Image
placeholder" class="img-fluid"></p>
            <p>Deleniti asperiores delectus, nemo consequatur omnis
dolorum vel voluptatem? Consequuntur doloribus iusto adipisci quam eos
fugiat, hic architecto. Consequatur ipsa error architecto? Deserunt
id, consectetur non labore odio accusantium veritatis incidunt?
Molestias velit deserunt harum, quibusdam est minus, sapiente
modi.</p>
            <p>Adipisci tempore soluta, sed aperiam consequatur error
dolorem, repellendus quos minima rem ex ipsum possimus maiores
reiciendis quo, accusantium officia omnis! Porro quidem ullam
architecto, sapiente, a consequatur ex nostrum eos culpa vitae tenetur
voluptates, nobis temporibus, fuga facilis pariatur.</p>
            <p>Rerum, molestias ipsa doloremque velit distinctio
laboriosam quidem ratione minima inventore. Blanditiis quaerat ipsa
nobis fugit repudiandae, at repellendus itaque odit! Quibusdam ducimus
exercitationem optio dolore, modi repudiandae beatae enim incidunt,
saepe atque amet suscipit, aliquam placeat pariatur ipsam facilis.</p>
            <p>A suscipit facilis minima fugiat ipsum provident
pariatur, culpa! Quia fuga aperiam, error beatae vel dolorem velit eos
incidunt ducimus animi nostrum, ipsa impedit praesentium libero
voluptatem est magni doloribus! Atque illum, aut deleniti adipisci
natus quas, beatae nihil sit!</p>
          </div>

      </div>
    </section>



    <footer class="site-footer">
      <div class="container">
        <div class="row mb-5">
        <!--   <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
            <p>Perferendis eum illum voluptatibus dolore tempora
consequatur minus asperiores temporibus.</p>
          </div> -->
          <div class="col-md-6 col-lg-6 mb-5 mb-lg-0">
            <h3 class="heading">Church Quick Links</h3>
            <div class="row">
              <div class="col-md-4">
                <ul class="list-unstyled">
                  <li><a href="#">Men's Ministry</a></li>
                  <li><a href="#">Women's Ministry</a></li>
                  <li><a href="#">Children's Ministry</a></li>
                  <li><a href="#">Youth Ministry</a></li>
                </ul>
              </div>
              <div class="col-md-4">
                <ul class="list-unstyled">
                  <li><a href="#">Senior Adult Ministry</a></li>
                  <li><a href="#">Marriage Ministries</a></li>
                  <li><a href="#">Missions & Outreach</a></li>
                  <li><a href="#">Prayer Ministry</a></li>
                </ul>
              </div>
              <div class="col-md-4">
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Location</a></li>
                  <li><a href="#">Contact</a></li>
                  <li><a href="#">Privacy &amp; Policy</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
            <h3 class="heading">Events</h3>
            <div class="block-21 d-flex mb-4">
              <div class="text">
                <h3 class="heading mb-0"><a href="#">Consectetur
Adipisicing Elit</a></h3>
                <div class="meta">
                  <div><a href="#"><span
class="ion-android-calendar"></span> May 29, 2018</a></div>
                  <div><a href="#"><span
class="ion-android-person"></span> Admin</a></div>
                  <div><a href="#"><span
class="ion-chatbubble"></span> 19</a></div>
                </div>
              </div>
            </div>
            <div class="block-21 d-flex mb-4">
              <div class="text">
                <h3 class="heading mb-0"><a href="#">Dolore Tempora
Consequatur</a></h3>
                <div class="meta">
                  <div><a href="#"><span
class="ion-android-calendar"></span> May 29, 2018</a></div>
                  <div><a href="#"><span
class="ion-android-person"></span> Admin</a></div>
                  <div><a href="#"><span
class="ion-chatbubble"></span> 19</a></div>
                </div>
              </div>
            </div>
            <div class="block-21 d-flex mb-4">
              <div class="text">
                <h3 class="heading mb-0"><a href="#">Perferendis eum
illum</a></h3>
                <div class="meta">
                  <div><a href="#"><span
class="ion-android-calendar"></span> May 29, 2018</a></div>
                  <div><a href="#"><span
class="ion-android-person"></span> Admin</a></div>
                  <div><a href="#"><span
class="ion-chatbubble"></span> 19</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
            <h3 class="heading">Contact Information</h3>
            <div class="block-23">
              <ul>
                <li><span class="icon ion-android-pin"></span><span
class="text">203 Fake St. Mountain View, San Francisco, California,
USA</span></li>
                <li><a href="#"><span class="icon
ion-ios-telephone"></span><span class="text">+2 392 3929
210</span></a></li>
                <li><a href="#"><span class="icon
ion-android-mail"></span><span
class="text">info@yourdomain.com</span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row pt-5">
          <div class="col-md-12 text-center copyright">

            <p class="float-md-left"><!-- Link back to Colorlib can't
be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new
Date().getFullYear());</script> All rights reserved | This template is
made with <i class="fa fa-heart" aria-hidden="true"></i> by <a
href="https://colorlib.com" target="_blank"
class="text-primary">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed
under CC BY 3.0. --></p>
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

    </div>

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


<?php



}else{
    
    header("location:../index.php");
}


?>
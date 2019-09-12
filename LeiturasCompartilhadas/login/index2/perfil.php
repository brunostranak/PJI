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
    <title>BrotherlyLove Bootstrap 4 Template by Colorlib</title>
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
          <a class="navbar-brand absolute" href="index.html">Aventure-se!<span class="fa fa-heart text-primary"></span>  </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          
          <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
            <ul class="navbar-nav ml-auto">
              
                <a class="nav-link" href="inicio.php">Home</a>
              
              <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="ministry.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Perfil</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="perfil.php">Meu perfil</a>
                  <a class="dropdown-item" href="../deslogar.php">Sair</a>
                  
                </div>
                </li>
              
              <li class="nav-item">
                <a class="nav-link" href="obras.php">Obras</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="submeter.php">Submeter</a>
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
                   

<?php 
if (!empty($registro["imagem"])){
    
?>

 <img class="mb-5 element-animate" src="../imagens/<?=$registro["imagem"];?>" alt="Foto de Perfil" style="border-radius: 0px; " width="150px" height="200px">
<?php
}else{
   
?>
 <img class="mb-5 element-animate" src="../imagens/unknown.png" alt="Foto de Perfil" style="border-radius: 0px; " width="150px" height="200px">
<?php
}
?>


                    
                    <br>
                    
                    <input type="file" name="imagem">

                    <br>
                    <br>
                    <button type='submit' class="btn btn-primary">Enviar</button>
                </form>
                </div>

          <div class="col-md-8 text-center">

            <div class="mb-5 element-animate">
              <div class="block-17">

                <h1 class="heading mb-4">Outreach Ministry</h1>
                <h1 style="margin-left:86%;">Contato</h1>
                
                <div class="container">
                <form style="width:250px;margin-left:80%;"class="form-control" action="atualizarcontato.php" method="post">
                
                     <input class="form-control" name="email"
                        value="<?php 
                       echo @$registro['email']; ?>">
                    <br>
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
                    <input maxlength="15" onkeypress="Mascara(this);" class="form-control" name="telefone"
                       value="<?php 
                       echo @$registro['telefone']; ?>">
                    <br>
                   <button type='submit' class="btn btn-primary">Atualizar</button>


                    
                    </form>
                    </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- END section -->
    <div class="container col-10" >

        
        <h1 style="text-align:center">MEU ACERVO</h1>
        <div id="livros" style="text-align:center">
        <?php
        if(!empty($livros)){
            foreach ($livros as $livro){
                if(isset($_SESSION["error"])){
                    echo "<script>window.alert('Este livro não pode ser deletado pois está em empréstimo ou possui registros de feedback. Por favor, contate um administrador')</script>";
                    unset ($_SESSION["error"]);
                }
                
                
                
?>
            
            

        <span>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</span>
        <img onclick="javascript:excluir('<?php echo $livro['idLivro'];?>','<?php echo $livro['nomeLivro'];?>')"style="width:20px;height:20px;margin-bottom:270px;" src="../imagens/x.png">   
          
        
        
        
       <script> 
           
           function excluir(id,nome){ 
               
           idlivro=id;
           nomelivro=nome;
           
          
           
              if (window.confirm('Tem certeza que deseja excluir "'+ nomelivro +'" do acervo do clube?')){
    
                window.location.href = 'excluirlivro.php?id='+idlivro;
            }
            
            }
   
         </script>
         <a href="sobrelivro.php?id=<?=$livro['idLivro'];?>"><img class="image"
style="width:250px;height:350px;padding:30px;"
src="../imagens/<?=$livro["imagem"];?>" alt="Image placeholder" ></a>
       <?php
        
            
            
        }
        }
       
       ?>
    

        </div>
    </div>



    
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
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

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
</div>
  
</html>


<?php
}else{
    
    header("location:../index.php");
}
?>
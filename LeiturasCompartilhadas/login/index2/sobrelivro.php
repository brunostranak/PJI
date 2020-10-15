<?php
session_start();
require("../conexaobd.php");
$cnx = conexao();
$idlivro = $_GET["id"];

$sql2 = "SELECT * FROM livros WHERE idLivro = '$idlivro'";

$resultado2 = mysqli_query($cnx, $sql2);
$livro = mysqli_fetch_assoc($resultado2);

$sql3 = "SELECT idEmprestante from emprestimos WHERE idLivro='$idlivro'";
$result = mysqli_query($cnx, $sql3);


$registros = mysqli_fetch_assoc($result);
if(!empty($registros)){
$idEmprestante = $registros["idEmprestante"];
}

$sql4 = "SELECT dtFim from emprestimos WHERE idEmprestante='$_SESSION[idUser]'";
$result2 = mysqli_query($cnx, $sql4);


$dtFim = mysqli_fetch_assoc($result2);
echo mysqli_error($cnx);

if (!empty($dtFim)){
$dtFim = $dtFim["dtFim"];
}



$sql5 = "SELECT dtFim from emprestimos WHERE idLivro='$idlivro'";
$result3 = mysqli_query($cnx, $sql5);
$dataFim = mysqli_fetch_assoc($result3);


$sql6 = "SELECT u.nomeUser FROM usuarios as u INNER JOIN emprestimos as e ON e.idEmprestante = u.idUser
       WHERE e.idUser = $_SESSION[idUser] and e.idLivro = $idlivro ORDER BY e.idEmprestimo DESC";
$result4 = mysqli_query($cnx, $sql6);
$nome = mysqli_fetch_assoc($result4);




if ($_SESSION["logado"] == "on") {
    ?>
    <!doctype html>
    <html lang="pt">
        
        <head>

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
                                <p style="color:white;font-size:15px">Olá, <?= $_SESSION["nomeUser"]; ?></p>
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
                                    <li class="nav-item">
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

                    <h1 id="titulo" style="margin-left:2%;"><?= $livro["nomeLivro"] ?></h1>

                    <p  style="margin-left:60%;float:right" id="sinopse">
                    <div class="container">
                        <img class="image"
                             style="padding:30px;width:350px;height:520px;margin-top:-3%;float:left;margin-left:"
                             src="../imagens/<?= $livro["imagem"]; ?>" alt="Image placeholder" >    

                        <?php echo "Resumo:"; ?>
                        <br>
                        <?php echo "<h5>" . $livro['resumo'] . "</h5>"; ?>

                    </div>

                    <?php
                    $sql5 = "SELECT * FROM usuarios WHERE idUser='$livro[idUser]'";
                    $resul = mysqli_query($cnx, $sql5);
                    $resul2 = mysqli_fetch_assoc($resul);

                    if ($livro["idUser"] <> $_SESSION["idUser"]) {
                        echo "Dono: ";
                        echo "<h5>" . $resul2["nomeUser"] . "</h5>";
                        echo "Contato: ";
                        echo "<h5>" . $resul2["email"] . " - " . $resul2["telefone"] . "</h5>";
                        if ($livro["status"] <> "afk") {
                            echo "Status:";
                            echo "<h5>Livro disponível para empréstimo</h5>";
                            ?>  


                            <button style="" onclick="javascript:emprestar(<?= $livro['idLivro']; ?>)" type="submit" href="" class="btn btn-primary">EMPRESTAR</button>

                            <script>
                                function emprestar(id) {
                                    idlivro = id;
                                    window.location.href = 'emprestar.php?id=' + idlivro;
                                }

                            </script>
                            <?php
                        } else {

                            if ($_SESSION["idUser"] == $idEmprestante) {
                                echo "Status:";
                                echo "<h5>Esse livro está com você, seu empréstimo expirará em " . date('d-m-Y', strtotime($dtFim)) . "</h5>";
                                ?>

                                <?php
                            } else {

                                echo "Status:";
                                echo "<h5>Livro indisponível para empréstimo, volte no dia " . date('d-m-Y', strtotime($dataFim['dtFim'])) . "</h5>";
                            }
                        }
                    } elseif ($livro["status"] == "afk") {
                        

                        echo "Dono: ";
                        echo "<h5>" . $resul2["nomeUser"] . "</h5>";
                        echo "Contato: ";
                        echo "<h5>" . $resul2["email"] . " - " . $resul2["telefone"] . "</h5>";   
                        ?>
                        <button onclick="window.location.href = 'devolver.php/?id=<?= $livro['idLivro']; ?>'" type='submit' class="btn btn-primary">Confirmar devolução
                            de <?= $nome["nomeUser"] ?>

                        </button>
                        <?php
                    }else{
                        echo "Dono: ";
                        echo "<h5>" . $resul2["nomeUser"] . "</h5>";
                        echo "Contato: ";
                        echo "<h5>" . $resul2["email"] . " - " . $resul2["telefone"] . "</h5>";
                    }
                    ?>


                    <br>
                    <br>
                    
                    <h4 style="">Conte-nos aqui, sua experiência com essa obra:</h4>
                    <form style="" action="feedbacks.php?idlivro=<?= $livro["idLivro"]; ?>" method="post">
                        <textarea rows="3" cols="60" maxlength="500" name="fb"> </textarea>
                        <br>

                        <button type="submit" class="btn btn-primary">Enviar</button>


                    </form>
                    <br>
                    <br>


                    <div style="text-align:center" class="container">


                        <?php
                        $sql6 = "SELECT  u.nomeUser, u.imagem, f.feedback, f.idUser, f.idFeedback, f.idLivro FROM usuarios as u INNER JOIN feedbacks as f ON u.idUser = f.idUser WHERE f.idLivro = $livro[idLivro]";
                        $resuls = mysqli_query($cnx, $sql6);

                        while ($resu = mysqli_fetch_assoc($resuls)) {
                            $dados[] = $resu;
                        }
                        if (!empty($dados)) {
                            
                            
                            echo "<div id='coments'>";
                            foreach ($dados as $dado) {
                                
                                ?>
                        
                                <div class="container" id='borda' style='word-wrap: break-word;'>
                                    <img style='width:60px;height:60px;float:left;' src='../imagens/<?= $dado['imagem']; ?>'>
                                    <p id='comentario' style='border-style: solid; background-color:#f7f7f7; border-color:#f7f7f7;'>
                                        <?php if ($_SESSION["idUser"]==$dado["idUser"]){
                                            ?>
                                    
                                        <img title="Excluir" onclick="javascript:excluir('<?php echo $dado['idFeedback'];?>','<?= $dado['idLivro']?>')"style="float:right;width:20px;height:20px;" src="../imagens/excluir.png">
                                        
                                    
                                    
                                   

                                    


                                        <script>
                                            
                                            function excluir(feed,livro){

                                            idfeed=feed;
                                            idlivro=livro;
                                           



                                               if (window.confirm('Tem certeza que deseja excluir esse comentário?')){
                                                        
                                                 window.location.href = 'excluircomentario.php?feed='+idfeed+'&livro='+idlivro;
                                             }

                                             }
                                           
                                             

                                          </script> 
                                          <?php
                                        }
                                          ?>
                                        
                                    <h7  style='display:flex;font-weight:bold;float:left;margin-left:2%'><?= $dado["nomeUser"]; ?></h7>
                                    
                                    <br>
                                    <br>
                                    <span style="display:flex;margin-top:-3%;float:left;margin-left:7.4%;text-align:justify;width:800px; " id='fb'><?= $dado["feedback"]; ?></span>
                                    <br>
                                    
                                    <br>
                                    </p>
                                </div>
                            

                            <?php
                        }
                        echo"</div>";
                    }
                    ?>

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
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
        </div>
    </body>


    </html>

    <?php
} else {
    header("location:../index.php");
}
?>

<?php
session_start();
  if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES') 
{?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="stylesheet" href="../src/css/bootstrap.css">
    <link rel="stylesheet" href="../src/css/all.css">

    <script src="../src/js/jquery-3.4.1.js"></script>
    <script src="../src/js/bootstrap.js"></script>
   
</head>

<body>
    <div class="wrapper">
    <?php
            require("sidebar.php");
           ?>

        <div id="content" class="bg-ccc">
        <?php
                  require("header.html");
                ?>
              <div class="mx-width-1075 container-fluid mt-3 " >

                <div  class="mycards">
                  <div class="content-mycards">
                    <h1 class="text-center mt-4">Bienvenido al QuickImage usted esta en modo <?php echo $_SESSION['rol'];?>.</h1>
                  </div>
                </div>
         <div id="contadores">
          
            <?php
              $tipoRol =$_SESSION['rol'];
              if($tipoRol == "Administrador"){
            ?>
            <div  class="mycards" >
              <div class="content-mycards">
                  <div class="card-columns text-white">
                        <div class="card bg-primary">
                          <div class="card-body text-center">
                            <h4 class="card-text">{{usuarios}}</h4>
                          <h4>{{countUsers}}</h4>
                          <i class="fa fa-user  fa-4x"></i>
                          </div>
                        </div>
                        <div class="card bg-danger">
                          <div class="card-body text-center">
                            <h4 class="card-text">Categorias</h4>
                            <h4>{{countCategory}}</h4>
                            <i class="fa fa-bookmark fa-4x"></i>
                          </div>
                        </div>
                        <div class="card bg-success">
                          <div class="card-body text-center">
                            <h4 class="card-text">Imagenes</h4>
                            <h4>{{countImages}}</h4>
                            <i class="fa fa-image fa-4x"></i>
                          </div>
                        </div>          
                  </div> 
              </div>      
            </div>
            <?php
              } 
            ?>   
             </div>     
                 
              </div>
                
              <?php
            require('footer.html');
          ?>
          
        </div>
       
    </div>

    <script src="../src/js/axios.js"></script>
    <script src="../src/js/vue.js"></script>
    <script src="../src/js/extras.js"></script>
</body>

</html>
<?php

  }
  else
  {
    header("location: ../index.html");
  }
 ?>
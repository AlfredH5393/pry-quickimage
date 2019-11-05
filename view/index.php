<?php
session_start();
  if (isset($_SESSION['ingreso']) && $_SESSION['ingreso']=='YES'  && $_SESSION['rol']=="76") 
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
    <script src="../src/js/config.js"></script>
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar">
            <div class="sidebar-header">
               <div class="logo">
                   <img  class ="d-block mx-auto" src="../src/img/logo_blanco.png" width="150" height="70" alt="">
               
               </div>
               <div>
                <img src="../src/img/user.png" class="mx-auto d-block mt-3 img-user" alt="" height="150" width="150">
                   
               </div>
                    
                     <div class="content-user ">
                            <p class=" name-user text-center mt-3" > Antonio Liborio </p>
                            <p class=" email-user text-center">AntonioLiborio@gmail.com</p>
                     </div>
                     
              
            </div>
            
            
            <ul class="list-unstyled components">
                <li class="">
                    <a href="index.php"><i class="fa fa-home"></i> Inicio</a>
                </li>
                <li class="">
                     <a href="#"><i class=" fa fa-bookmark fa-1x"></i> Categorias</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-image  fa-1x"></i> Imagenes</a>
                </li>
                <li>
                    <a href="roles.php"><i class="fa fa-users  fa-1x"></i> Roles</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user  fa-1x"></i> Usuarios</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-download  fa-1x"></i> Descargas</a>
                </li>
            </ul>
            
    </nav>

        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button type="button" id="sidebarCollapse" class="btn btn-success">
                  <i class="fa fa-align-justify fa-1x"></i>
                </button>
              <div style="margin: 0px 12px 0px 12px;"></div>
                      <div class="btn-group d-block float-left " >
                              <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-cog fa-1x"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right">
                                <button class="dropdown-item" type="button">Cuenta</button>
                                <a class="dropdown-item d-block" href="../model/destroysesion.php">Cerrar sesion</a>
                              </div>
                    </div>
              
              </nav>
              <div class="container-fluid mt-3" >
                <div class="card-columns text-white">
                    <div class="card bg-primary">
                      <div class="card-body text-center">
                        <h4 class="card-text">Usuarios</h4>
                       <h4>6</h4>
                       <i class="fa fa-user  fa-4x"></i>
                      </div>
                    </div>
                    <div class="card bg-danger">
                      <div class="card-body text-center">
                        <h4 class="card-text">Categorias</h4>
                        <h4>6</h4>
                        <i class="fa fa-bookmark fa-4x"></i>
                      </div>
                    </div>
                    <div class="card bg-success">
                      <div class="card-body text-center">
                        <h4 class="card-text">Imagenes</h4>
                        <h4>6</h4>
                        <i class="fa fa-image fa-4x"></i>
                      </div>
                    </div>          
                  </div>  
                  <h1 class="text-center mt-4">Bienvenido al panel de administracion.</h1>
                 
              </div>
                
            
                


           

              <footer id="sticky-footer" class="py-1 bg-light ">
                    <div class="container text-center">
                      <p>Copyright &copy; QuickImage 2019</p>
                    </div>
            </footer>
        </div>
        
    </div>

    <script>
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
    </script>

</body>

</html>
<?php

  }
  else
  {
    header("location: ../index.html");
  }
 ?>
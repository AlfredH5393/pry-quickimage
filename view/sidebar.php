<nav id="sidebar">
    <div class="sidebar-header">
       <div class="logo">
           <img  class ="d-block mx-auto" src="../src/img/logo_blanco.png" width="150" height="70" alt="">
       
       </div>
             <img 
             <?php
              $ruta = $_SESSION['img'];
             echo $varSrc = 'src="../src/img/'.$ruta.'"';
             ?>  class="mx-auto d-block mt-3 img-user" alt="" width="150" height="150">
           
             <div class="content-user ">
                    <p class=" name-user text-center mt-3" > 
                    <?php
                         echo $_SESSION['name_usuario']; 
                    ?></p>
                    <p class=" email-user text-center"><?php
                        echo $_SESSION['email_user'];  
                    ?></p>
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
            <a href="usuarios.php"><i class="fa fa-user  fa-1x"></i> Usuarios</a>
        </li>
        <li>
            <a href="#"><i class="fa fa-download  fa-1x"></i> Descargas</a>
        </li>
    </ul>
    
</nav>
<?php
require('conexion.php');
    class usuario
    {

        function autenticacion($user,$password){
            $connect=new conexion();
            //  $usuariivalidado =mysql_real_escape_string($user);
            $pass = sha1($password);
  
              $sql = "SELECT * FROM tblusuarios WHERE vchCorreo='{$user}' && vchContrasena='{$password}'"; 
              $res = mysqli_query($connect->conectarbd(),$sql);
              if($res->num_rows > 0){
                  $r=$res->fetch_array(); 
              }else{
                  $r[0]=[0];
              }
              return $r;
        }
    }
?>
<?php
require('conexion.php');
    class usuario
    {

        function autenticacion($user,$password){
            $connect=new conexion();
            //  $usuariivalidado =mysql_real_escape_string($user);
            $pass = sha1($password);
  
            //   $sql = "SELECT * FROM tblusuarios WHERE vchCorreo='{$user}' && vchContrasena='{$password}'"; 
            $sql = "SELECT 
            `tblusuarios`.`idUsuario`,
            `tblusuarios`.`vchNombre`,
            `tblusuarios`.`vchAppeliidoP`,
            `tblusuarios`.`vchApellidoM`,
            `tblusuarios`.`vchCorreo`,
            `tblusuarios`.`vchUsuario`,
            `tblusuarios`.`vchContrasena`,
            `tblusuarios`.imgPerfil,
             tblroles.idRol,
             tblroles.`Nombre` AS NombreRol	
             FROM 
             `tblusuarios`,`tblroles`
             WHERE
             `tblusuarios`.`fk_Rol`=`tblroles`.`idRol`
             AND `tblusuarios`.`vchCorreo` = '{$user}' AND `tblusuarios`.`vchContrasena` = '{$password}'"; 
              $res = mysqli_query($connect->conectarbd(),$sql);
              if($res->num_rows > 0){
                  $r=$res->fetch_array(); 
              }else{
                  $r[0]=[0];
              }
              return $r;
        }
     
        function registrarusuario($nombre,$apaterno,$amaterno,$correo,$usuario,$password){
                $connect = new conexion();
                //    $pass = sha1($password);
                //   $fecha= date("Y-m-d");
                $imagen='user.png';
                  $sql = "INSERT INTO tblusuarios
                  (
                   `vchNombre`,
                   `vchAppeliidoP`,
                   `vchApellidoM`,
                   `vchCorreo`,
                   `vchUsuario`,
                   `vchContrasena`,
                   `imgPerfil`,
                   `fk_Rol`)
                VALUES (
                        '$nombre',
                        '$apaterno',
                        '$amaterno',
                        '$correo',
                        '$usuario',
                        '$password',
                        '$imagen',
                         77)";
                  $registrar=mysqli_query($connect->conectarbd(),$sql);
                   
                return $registrar;
                  
                    
         }

        function insert($nombre,$apaterno,$amaterno,$correo,$usuario,$password,$imagen,$filename,$sourcepat,$rol){
            $connect = new conexion();
            if($filename == "")
            {
                $insert = "no ha insertado la foto de perfil"; 
            }else{
                if(($imagen["type"]=='image/jpeg') || ($imagen["type"]=='image/png') || ($imagen["type"]=='image/jpg')){
                    $ruta="../src/img/".$filename;
                    $sql="INSERT INTO `tblusuarios`
                    (`vchNombre`,
                     `vchAppeliidoP`,
                     `vchApellidoM`,
                     `vchCorreo`,
                     `vchUsuario`,
                     `vchContrasena`,
                     `imgPerfil`,
                     `fk_Rol`)
                    VALUES (
                            '$nombre',
                            '$apaterno',
                            '$amaterno',
                            '$correo',
                            '$usuario',
                            '$password',
                            '$filename',
                            '$rol');";
                    $insert=mysqli_query($connect->conectarbd(),$sql);
                    if($insert){
                        move_uploaded_file($sourcepat,$ruta);
                    }else{
                        echo "<script>alert('Archivo no permitido')</script>";
                    }
                }else{
                    $insert="el archivo no es valido ";
                }  
            }
            return $insert;
        }
    
        function update($id,$nombre,$apaterno,$amaterno,$correo,$usuario,$password,$imagen,$filename,$sourcepat,$rol){
            $connect = new conexion();
            $ruta="../src/img/".$filename;

            if($filename=="")
            {
                $sql="UPDATE `tblusuarios`
                SET 
                  `vchNombre` = '$nombre',
                  `vchAppeliidoP` = '$apaterno',
                  `vchApellidoM` = '$amaterno',
                  `vchCorreo` = '$correo',
                  `vchUsuario` = '$usuario',
                  `vchContrasena` = '$password',
                  `fk_Rol` = '$rol'
                WHERE `idUsuario` = '$id'";

                $update=mysqli_query($connect->conectarbd(),$sql);
                
            }else
            {
                if(($imagen["type"]=='image/jpeg') || ($imagen["type"]=='image/png') || ($imagen["type"]=='image/jpg')){
                $sql="UPDATE `tblusuarios`
                SET 
                  `vchNombre` = '$nombre',
                  `vchAppeliidoP` = '$apaterno',
                  `vchApellidoM` = '$amaterno',
                  `vchCorreo` = '$correo',
                  `vchUsuario` = '$usuario',
                  `vchContrasena` = '$password',
                  `imgPerfil` = '$filename',
                  `fk_Rol` = '$rol'
                WHERE `idUsuario` = '$id'";
                    
                    $update=mysqli_query($connect->conectarbd(),$sql);
                  if($update){
                      move_uploaded_file($sourcepat,$ruta);
                  }else{
                      echo "<script>alert('Archivo no permitido')</script>";
                  }

                }else{
                    $update= " el  archivo  no es  valido";
                }

            }

            return $update;
        }

        function delete($id){
            $connect = new conexion();
            $sql="DELETE
            FROM `tblusuarios`
            WHERE `idUsuario` = '$id'";
            $delete= mysqli_query($connect->conectarbd(),$sql);
            return $delete;
        }

        function getDatos(){
            $conectar = new conexion();
            $sql="SELECT * FROM tblusuarios";  
            mysqli_set_charset($conectar->conectarbd(),"utf8");
            if(!$select=mysqli_query($conectar->conectarbd(),$sql)) die("Error al consultar");
            $usuarios=array();
            
            while($row=mysqli_fetch_array($select)){
                $id=$row['idUsuario'];
                $nombre=$row['vchNombre'];
                $apaterno=$row['vchAppeliidoP'];
                $amaterno=$row['vchApellidoM'];
                $correo=$row['vchCorreo'];
                $usuario=$row['vchUsuario'];
                $password=$row['vchContrasena'];
                $imagen=$row['imgPerfil'];
                $rol=$row['fk_Rol'];

                $usuarios[] = array(
                    'Id'=> $id,
                    'nombre'=> $nombre,
                    'Apepaterno' => $apaterno,
                    'Apematerno' => $amaterno,
                    'correo' => $correo,
                    'usuario' => $usuario,
                    'pass' => $password,
                    "img" => $imagen,
                    "rol" => $rol     
                );
            }
            
            $encabezado=array("users"=>$usuarios);
            $json_string = json_encode($encabezado,JSON_UNESCAPED_UNICODE);
            return $json_string;
        }
    }
?>
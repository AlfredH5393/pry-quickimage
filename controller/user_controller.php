<?php
require('../model/user.php');

$_POST = json_decode(file_get_contents("php://input"), true);
$operacion=$_POST['option'];
$objusuario= new usuario();

switch($operacion)
{
    case 'access':
       $user = $_POST['user'];
       $pass = $_POST['password'];
       $array=$objusuario->autenticacion($user,$pass);
       if($array[0]==[0])
                {
                    echo '0';
                }
                else{
                    session_start();
                    $_SESSION['ingreso']      = 'YES';
                    $_SESSION['ID']           = $array[0];
                    $_SESSION['nombre']       = $array[1];
                    $_SESSION['AP']           = $array[2];
                    $_SESSION['AM']           = $array[3];
                    $_SESSION['email_user']   = $array[4];
                    $_SESSION['name_usuario'] = $array[5];
                    $_SESSION['img']          = $array[7];
                    $_SESSION['rol']          = $array[8];
                    echo $rol = $array[8];
                }
    break;

    case 'register':
        echo $objusuario->registrarusuario($_POST['nombre'],$_POST['appaterno'],$_POST['apmaterno'],$_POST['correo'],$_POST['usuario'],$_POST['password']);
    break;

    case 'insert':
    
    break;

    case 'update':
   
    break;

    case 'delete':
       
    break;
    
    case 'showdata':
    
    break;

}
?>
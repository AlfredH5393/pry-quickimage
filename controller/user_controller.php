<?php
require('../model/user.php');

// $_POST = json_decode(file_get_contents("php://input"), true);
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
                    $_SESSION['rol']          = $array[9];
                    echo $rol = $array[9];
                }
    break;

    case 'register':
        echo $objusuario->registrarusuario($_POST['nombre'],$_POST['appaterno'],$_POST['apmaterno'],$_POST['correo'],$_POST['usuario'],$_POST['password']);
    break;

    case 'insert':
        $imagen=$_FILES['img'];
        $filename=$_FILES['img']['name'];
        $sourcepat=$_FILES["img"]['tmp_name']; 
        echo $objusuario->insert($_POST['nombre'],$_POST['appaterno'],$_POST['apmaterno'],$_POST['correo'],$_POST['usuario'], $_POST['password'],$imagen,$filename,$sourcepat,$_POST['rol']);
    break;

    case 'update':
        $imagen=$_FILES['img'];
        $filename=$_FILES['img']['name'];
        $sourcepat=$_FILES["img"]['tmp_name']; 
        echo $objusuario->update($_POST['id'],$_POST['nombre'],$_POST['appaterno'],$_POST['apmaterno'],$_POST['correo'],$_POST['usuario'], $_POST['password'],$imagen,$filename,$sourcepat,$_POST['rol']);
    break;

    case 'delete':
       echo $objusuario->delete($_POST['id']);
    break;
    
    case 'showdata':
        echo $objusuario->getDatos();
    break;

    case 'updateOffPhoto':
        echo $objusuario->updateOffPhoto($_POST['id'],$_POST['nombre'],$_POST['appaterno'],$_POST['apmaterno'],$_POST['correo'],$_POST['usuario'], $_POST['password'],$_POST['rol']);    
    break;

}
?>
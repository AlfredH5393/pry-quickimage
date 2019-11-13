<?php
    require('../model/rol.php');

    $operacion=$_POST['option'];
    
    $rol= new rol();

    switch($operacion)
    {
        case 'insert':
            echo $rol->insert($_POST['nombre']);
        break;

        case 'update':
        echo $rol->update($_POST['id'],$_POST['nombre']);
        break;

        case 'delete':
        echo $rol->delete($_POST['id']);
        break;

        case 'showdata':
            echo $rol->getdatos();
        break;

      
    break;
    }
?>
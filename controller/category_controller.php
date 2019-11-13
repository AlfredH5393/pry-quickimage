<?php
    require('../model/categories.php');

    $operacion=$_POST['option'];
    
    $category= new categories();

    switch($operacion)
    {
        case 'insert':
            echo $category->insert($_POST['nombre']);
        break;

        case 'update':
        echo $category->update($_POST['id'],$_POST['nombre']);
        break;

        case 'delete':
        echo $category->delete($_POST['id']);
        break;

        case 'showdata':
            echo $category->getdatos();
        break;

      
    break;
        

    }



?>
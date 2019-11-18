<?php
require('../model/Image.php');

$operacion=$_POST['option'];
$objusuario= new image();

switch($operacion)
{
    case 'insert':
        $imagenPNG=$_FILES['imagenPNG'];
        $filenamePNG=$_FILES['imagenPNG']['name'];
        $sourcepatPNG=$_FILES["imagenPNG"]['tmp_name']; 
        //-------------------------------------------
        $imagenJPG=$_FILES['imagenJPG'];
        $filenameJPG=$_FILES['imagenJPG']['name'];
        $sourcepatJPG=$_FILES["imagenJPG"]['tmp_name']; 
        //--------------------------------------------
        if(($objusuario->insert($_POST['nombre'],$_POST['descripcion'],$_POST['categoria'],$_POST['idUser']))=="1"){
            $final =  $objusuario->insertImage($imagenPNG,$filenamePNG,$sourcepatPNG,$imagenJPG,$filenameJPG,$sourcepatJPG);
        }
        echo $final;
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
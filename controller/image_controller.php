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
        if( $_FILES['imagenPNG']["type"]=="image/png" && ($_FILES['imagenJPG']["type"]=="image/jpeg" || ($_FILES['imagenJPG']["type"]=="image/jpg")) ){
            $final = $objusuario->insert($_POST['nombre'],$_POST['descripcion'],$_POST['categoria'],$_POST['idUser']);
            if($final=="1"){
                echo  $objusuario->insertImage($imagenPNG,$filenamePNG,$sourcepatPNG,$imagenJPG,$filenameJPG,$sourcepatJPG);
            }else{
                echo $final;
            }
        
        }else{
            echo 'Las extenciones no son las perminitas';
        }
    break;
    case 'update':
        echo $objusuario->update($_POST['id'],$_POST['nombre'],$_POST['descripcion'],$_POST['categoria'],$_POST['id_user']);
    break;

    case 'updateTwoImage':
        $imagenPNG=$_FILES['imagenPNG'];
        $filenamePNG=$_FILES['imagenPNG']['name'];
        $sourcepatPNG=$_FILES["imagenPNG"]['tmp_name']; 
        //-------------------------------------------
        $imagenJPG=$_FILES['imagenJPG'];
        $filenameJPG=$_FILES['imagenJPG']['name'];
        $sourcepatJPG=$_FILES["imagenJPG"]['tmp_name']; 
        
        if( $_FILES['imagenPNG']["type"]=="image/png" && ($_FILES['imagenJPG']["type"]=="image/jpeg" || ($_FILES['imagenJPG']["type"]=="image/jpg")) ){
            $insertTableImagen = $objusuario->update($_POST['id'],$_POST['nombre'],$_POST['descripcion'],$_POST['categoria'],$_POST['id_user']);
            if($insertTableImagen == "1"){
                if($filenameJPG != "" && $filenamePNG != ""){
                    echo $objusuario->updateImage($_POST['id'],$filenamePNG,$sourcepatPNG,$filenameJPG,$sourcepatJPG);
                }else{
                    echo "No selecciono la imagen";
                }

            }else{
                echo 'Error al actualizar datos';
            }
        }else{
            echo "Archivo no permitido";
        }
    break;


    case 'updateOnlyJPG':
        $imagenJPG=$_FILES['imagenJPG'];
        $filenameJPG=$_FILES['imagenJPG']['name'];
        $sourcepatJPG=$_FILES["imagenJPG"]['tmp_name']; 
        
        if($_FILES['imagenJPG']["type"]=="image/jpeg" || ($_FILES['imagenJPG']["type"]=="image/jpg") ){
            $insertTableImagen = $updateTableImage = $objusuario->update($_POST['id'],$_POST['nombre'],$_POST['descripcion'],$_POST['categoria'],$_POST['id_user']);
            if($insertTableImagen == "1"){
                if($filenameJPG != ""){
                    echo $objusuario->updateImageOnlyJPG($_POST['id'],$filenameJPG,$sourcepatJPG);
                }else{
                    echo "No selecciono la imagen";
                }
            }else{
                echo 'Error al actualizar datos';
            }
        }else{
            echo "Archivo no permitido";
        }
    break;


    case 'updateOnlyPNG':
        $imagenPNG=$_FILES['imagenPNG'];
        $filenamePNG=$_FILES['imagenPNG']['name'];
        $sourcepatPNG=$_FILES["imagenPNG"]['tmp_name'];
        if( $_FILES['imagenPNG']["type"]=="image/png"){
            $insertTableImagen = $objusuario->update($_POST['id'],$_POST['nombre'],$_POST['descripcion'],$_POST['categoria'],$_POST['id_user']);
            if($insertTableImagen == "1"){
                if($filenamePNG != ""){
                    echo $objusuario->updateImageOnlyPNG($_POST['id'],$filenamePNG,$sourcepatPNG);
                }else{
                    echo "No selecciono la imagen";
                }
            }else{
                echo 'Error al actualizar datos';
            }
        }else{
            echo "Archivo no permitido";
        }
    break;


    case 'delete':
       echo $objusuario->delete($_POST['id']);
    break;
    
    case 'showdata':
        $idUser= $_POST['id-user'];
        echo $objusuario->getdatos($idUser);
    break;
}
?>
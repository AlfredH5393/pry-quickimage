<?php   
require('conexion.php');
class Image{
    public  function insert($nombre,$descripcion,$fkCategoria,$fkUsuario){
       $connect=new conexion();
       $sql="INSERT INTO `dbquickimage`.`tblimagenes`(`nombre`,`Descripcion`,`fk_Categoria`,`fk_Usuario`) 
       VALUES ('$nombre',
               '$descripcion',
               '$fkCategoria',
               '$fkUsuario');";   
       $insert=mysqli_query($connect->conectarbd(),$sql);
       return $insert;
    }  
    public function insertImage($imagenPNG,$filenamePNG,$sourcepatPNG,$imagenJPG,$filenameJPG,$sourcepatJPG){
      $connect = new conexion();
      $sql1="SELECT MAX(idImagen) AS maximo FROM tblimagenes";  
      $result=mysqli_query($connect->conectarbd(),$sql1);
      $data=mysqli_fetch_array($result);
      $idMaximoImagen=$data["maximo"]; 
      if($filenamePNG == ""){
        $insertarImagen = "no se inserto la foto PNG"; 
      }else if($filenameJPG == ""){
        $insertarImagen = "no se inserto la foto JPG"; 
      }else{
        if( $imagenPNG["type"]=="image/png" && ( $imagenJPG["type"]=="image/jpeg" || ($imagenJPG["type"]=="image/jpg")) ){
            $sql1="SELECT MAX(idImagen) AS maximo FROM tblimagenes";  
            $result=mysqli_query($connect->conectarbd(),$sql1);
            $data=mysqli_fetch_array($result);
            $idMaximoImagen=$data["maximo"]; 

            $rutaPNG="../src/img/PNG/".$filenamePNG;
            $rutaJPG="../src/img/JPG/".$filenameJPG;
            
            $sql="INSERT INTO `dbquickimage`.`tbldescargas` (`PNG`,`JPG`,`fk_Imagen`)
            VALUES ('$filenamePNG','$filenameJPG','$idMaximoImagen');";

            $insertarImagen=mysqli_query($connect->conectarbd(),$sql);
            if($insertarImagen){
              @move_uploaded_file($sourcepatJPG,$rutaJPG);
              @move_uploaded_file($sourcepatPNG,$rutaPNG);
            }else{
              $insertarImagen = "<script>alert('Archivo no permitido')</script>";
            }
        }else{
            $insertarImagen="el archivo no es valido ";
        }  
      return $insertarImagen;
    }
  }

  public function update($idImagen,$nombre,$descripcion,$fkCategoria,$fkUsuario){
    $connect= new conexion();
    $sql="UPDATE `dbquickimage`.`tblimagenes`
          SET `nombre` = '$nombre',
              `Descripcion` = '$descripcion',
              `fk_Categoria` = '$fkCategoria',
              `fk_Usuario` = '$fkUsuario'
          WHERE `idImagen` = '$idImagen';";
    $update=mysqli_query($connect->conectarbd(),$sql);
    return $update; 
}



  public function updateImage($idImage,$filenamePNG,$sourcepatPNG,$filenameJPG,$sourcepatJPG){
      $connect= new conexion();
      $sql="UPDATE `dbquickimage`.`tbldescargas`
            SET `PNG` = '$filenamePNG', 
            JPG = '$filenameJPG'
            WHERE `fk_Imagen` = '$idImage';";
      $update=mysqli_query($connect->conectarbd(),$sql);
      if($update){
        $rutaPNG="../src/img/PNG/".$filenamePNG;
        $rutaJPG="../src/img/JPG/".$filenameJPG;
        @move_uploaded_file($sourcepatJPG,$rutaJPG);
        @move_uploaded_file($sourcepatPNG,$rutaPNG);
      }

      return $update; 
  }

  public function updateImageOnlyPNG($idImage,$filenamePNG,$sourcepatPNG){
     $connect =  new conexion();
     $sql = "UPDATE `dbquickimage`.`tbldescargas`
              SET `PNG` = '$filenamePNG'
              WHERE `fk_Imagen` = '$idImage';";
      $updateOnlyPNG = mysqli_query($connect->conectarbd(),$sql);
      if($updateOnlyPNG){
        $rutaPNG="../src/img/PNG/".$filenamePNG;
        @move_uploaded_file($sourcepatPNG,$rutaPNG);
      }else{
        $updateOnlyPNG = "<script>alert('Archivo no permitido')</script>";
      }
      return $updateOnlyPNG;
  }

  
  public function updateImageOnlyJPG($idImage,$filenameJPG,$sourcepatJPG){
    $connect =  new conexion();
    $sql = "UPDATE tbldescargas SET `JPG` = '$filenameJPG' WHERE `fk_Imagen` = '$idImage'";

    $updateOnlyJPG = mysqli_query($connect->conectarbd(),$sql);

    if($updateOnlyJPG){
      $rutaJPG="../src/img/JPG/".$filenameJPG;
      @move_uploaded_file($sourcepatJPG,$rutaJPG);
    }else{
      $updateOnlyJPG = "<script>alert('Archivo no permitido')</script>";
    }
     return $updateOnlyJPG;
  }





  public  function delete($id){
      $connect= new conexion();
      $sqlDeleteDownload="DELETE FROM `dbquickimage`.`tbldescargas` WHERE `fk_Imagen` = '$id';";
      $deleteDownload=mysqli_query($connect->conectarbd(),$sqlDeleteDownload);
      if($deleteDownload){
        $sqlDeleteImage="DELETE FROM `dbquickimage`.`tblimagenes` WHERE `idImagen` = '$id';";
        $deleteImage=mysqli_query($connect->conectarbd(),$sqlDeleteImage);
        if($deleteImage){
          $delete = $deleteImage;
        }else{
          $delete = "Ocurrio un error al eliminar imagenes";
        }
      }else{
        $delete = "Ocurrio un error al eliminar imagenes";
      } 
      return $delete;
  }

  public  function getdatos(){ 
    $conectar = new conexion();
      $sql="SELECT tblimagenes.`idImagen`,
            tblimagenes.`nombre`,
            tbldescargas.PNG,
            tbldescargas.JPG,
            tblimagenes.`Descripcion`,
            tblcategoria.Nombre AS `categoria`,
            tblcategoria.`idCategoria` AS fk_Categoria,
            CONCAT(vchNombre,' ', vchApellidoM) AS `fk_Usuario`
            FROM tblimagenes, tbldescargas, tblusuarios, tblcategoria
            WHERE idImagen=fk_Imagen AND fk_Usuario = idUsuario AND fk_Categoria=idCategoria ORDER BY `idImagen`";  

    mysqli_set_charset($conectar->conectarbd(),"utf8");
    if(!$select=mysqli_query($conectar->conectarbd(),$sql)) die("Error al consultar");
    $imagenes=array();
      
    while($row=mysqli_fetch_array($select)){
        $id=$row['idImagen'];
        $nombre=$row['nombre'];
        $PNG = $row['PNG'];
        $JPG = $row['JPG'];
        $descripcion=$row['Descripcion'];
        $categoria = $row['categoria'];
        $Idcategoria=$row['fk_Categoria'];
        $usuario=$row['fk_Usuario'];
        
        $imagenes[] = array(
          'Id'=> $id,
          'nombre'=> $nombre,
          'PNG' => $PNG,
          'JPG'=>$JPG,
          'descripcion'=>$descripcion,
          'categoria'=>$categoria,
          'idCategoria' => $Idcategoria,
          'usuario'=>$usuario    
        );
    }
      
      $encabezado=array("imagenes"=>$imagenes);
      $json_string = json_encode($encabezado,JSON_UNESCAPED_UNICODE);
    return $json_string;

  }
}
?>
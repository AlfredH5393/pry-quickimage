<?php   
require('conexion.php');

class categories{
    public  function insert($caegoria){
       $connect=new conexion();
       $sql="INSERT INTO tblcategoria(`Nombre`)VALUES ('$caegoria');";   
       $insert=mysqli_query($connect->conectarbd(),$sql);
       return $insert;
    }  

    public function update($id,$caegoria){
       $connect= new conexion();
       $sql="UPDATE `dbquickimage`.`tblcategoria` SET `Nombre` = '$caegoria'
                WHERE `idCategoria` = '$id';";
       $update=mysqli_query($connect->conectarbd(),$sql);
       return $update;    

    }

    public  function delete($id){
       $connect= new conexion();
       $sql="DELETE FROM `dbquickimage`.`tblcategoria` WHERE `idCategoria` = '$id'; ";
       $delete=mysqli_query($connect->conectarbd(),$sql);
       return $delete;
    }

    public  function getdatos(){ 
      $conectar = new conexion();
      $sql="SELECT `idCategoria`, `Nombre` FROM `dbquickimage`.`tblcategoria`";  
      mysqli_set_charset($conectar->conectarbd(),"utf8");
      if(!$select=mysqli_query($conectar->conectarbd(),$sql)) die("Error al consultar");
      $categorias=array();
       
      while($row=mysqli_fetch_array($select)){
          $id=$row['idCategoria'];
          $categoria=$row['Nombre'];

          $categorias[] = array(
            'Id'=> $id,
            'Categoria'=> $categoria     
          );
      }
       
       $encabezado=array("categories"=>$categorias);
       $json_string = json_encode($encabezado,JSON_UNESCAPED_UNICODE);
      return $json_string;

    }
}
?>
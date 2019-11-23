<?php   
require('conexion.php');
class rol{
    public  function insert($rol){
       $connect=new conexion();
       $sql="CALL SP_Roles ('insert',0,'$rol')";   
       $insert=mysqli_query($connect->conectarbd(),$sql);
       return $insert;
    }  

    public function update($id,$rol){
       $connect= new conexion();
       $sql="CALL SP_Roles ('update',$id,'$rol') ";
       $update=mysqli_query($connect->conectarbd(),$sql);
       return $update;    

    }

    public  function delete($id){
       $connect= new conexion();
       $sql="CALL SP_Roles ('delete',$id,'0') ";
       $delete=mysqli_query($connect->conectarbd(),$sql);
       return $delete;
    }

    public  function getdatos(){ 
      $conectar = new conexion();
      $sql="CALL SP_Roles ('select',0,'0')";  
      mysqli_set_charset($conectar->conectarbd(),"utf8");
      if(!$select=mysqli_query($conectar->conectarbd(),$sql)) die("Error al consultar");
      $roles=array();
       
      while($row=mysqli_fetch_array($select)){
          $id=$row['idRol'];
          $rol=$row['Nombre'];

          $roles[] = array(
            'Id'=> $id,
            'rol'=> $rol     
          );
      }
       $encabezado=array("roles"=>$roles);
       $json_string = json_encode($encabezado,JSON_UNESCAPED_UNICODE);
      return $json_string;

    }
}
?>
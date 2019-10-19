<?php   
require('conexion.php');
class usuarios{
    public  function insert($nombre,$apellidoP,$apellidoM,$correo,$usuario,$contraseña,$foto,$idRol){
       $connect=new conexion();
       $sql="CALL SP_Usuarios('insert',0,'$nombre','$apellidoP','$apellidoM','$correo','$usuario','$contraseña','$foto',$idRol)";   
       $insert=mysqli_query($connect->conectarbd(),$sql);
       return $insert;
    }  

    public function update($id,$nombre,$apellidoP,$apellidoM,$correo,$usuario,$contraseña,$foto,$idRol){
       $connect= new conexion();
       $sql="CALL SP_Usuarios('update','$id','$nombre','$apellidoP','$apellidoM','$correo','$usuario','$contraseña','$foto',$idRol)";
       $update=mysqli_query($connect->conectarbd(),$sql);
       return $update;    

    }

    public  function delete($id){
       $connect= new conexion();
       $sql="CALL SP_Usuarios('delete',$id,'0','0','0','0','0','0','0',0) ";
       $delete=mysqli_query($connect->conectarbd(),$sql);
       return $delete;
    }

    public  function getdatos(){ 
      $conectar = new conexion();
      $sql="CALL SP_Usuarios('showData',0,'0','0','0','0','0','0','0',0)";  
      mysqli_set_charset($conectar->conectarbd(),"utf8");
      if(!$select=mysqli_query($conectar->conectarbd(),$sql)) die("Error al consultar");
      $usuario=array();
      while($row=mysqli_fetch_array($select)){
          $id=$row['ID'];
          $nombre=$row['NOMBRE'];
          $correo=$row['CORREO'];
          $usuario=$row['USUARIO'];
          $contraseña=$row['CONTRASEÑA'];
          $foto=$row['fotoPerfil'];
          $rol=$row['ROL'];
        
          $usuario[] = array(
            'Id'=> $id,
            'nombre'=> $nombre,
            'correo'=> $correo,
            'contraseña'=> $contraseña,
            'foto'=> $foto,
            'rol'=> $rol
          );
      }
       
       $encabezado=array("usuarios"=>$usuario);
       $json_string = json_encode($encabezado,JSON_UNESCAPED_UNICODE);
      return $json_string;

    }
}
?>
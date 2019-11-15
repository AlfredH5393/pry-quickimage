<?php
require('conexion.php');
$conectar = new conexion();
$sql="SELECT * FROM tblusuarios";  
mysqli_set_charset($conectar->conectarbd(),"utf8");
if(!$select=mysqli_query($conectar->conectarbd(),$sql)) die("Error al consultar");
$usuarios=array();

while($row=mysqli_fetch_array($select)){
    $id=$row['idUsuario'];
    $nombre=$row['vchNombre'];
    $apaterno=$row['vchAppeliidoP'];
    $amaterno=$row['vchApellidoM'];
    $correo=$row['vchCorreo'];
    $usuario=$row['vchUsuario'];
    $password=$row['vchContrasena'];
    $imagen=$row['imgPerfil'];
    $rol=$row['fk_Rol'];

    $usuarios[] = array(
        'Id'=> $id,
        'nombre'=> $nombre,
        'Apepaterno' => $apaterno,
        'Apematerno' => $amaterno,
        'correo' => $correo,
        'usuario' => $usuario,
        'pass' => $password,
        "img" => $imagen,
        "rol" => $rol     
    );
}

$encabezado=array( "users" => $usuarios);
$json_string = json_encode($encabezado,JSON_UNESCAPED_UNICODE);
echo $json_string;
?>
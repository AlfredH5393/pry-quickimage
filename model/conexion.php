<?php

class conexion
{
    const user='root';
    const pass='';
    const pass='admin1';
    const db='dbquickimage';
    const servidor='localhost';
    // const user='toolcrea_turismo';
    // const pass='12345';
    // const db='toolcrea_bdturismo';
    // const servidor='toolcreation.x10host.com';

    public function conectarbd()
    {
        $conectar = new mysqli(self::servidor,self::user,self::pass,self::db);
            if ($conectar->connect_errno)
            {
                die("Error en la conexion".$conectar->connect_error);
            }
            return $conectar;
    }
}
?>
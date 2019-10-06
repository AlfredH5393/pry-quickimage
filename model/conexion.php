<?php

class conexion
{
    const user='antonio';
    const pass='123';
    const db='dbquickimage';
    const servidor='192.168.1.73';
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
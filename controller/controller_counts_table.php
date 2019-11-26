<?php 
require('../model/counts_tables.php');
$opcion = $_POST['option'];
$llamar = new counts();
switch($opcion)
{
    case 'countUser':
        echo  $llamar->countUsers();
        break;
    case 'countCategorys':
        echo  $llamar->countCategorys();
        break;

     case 'countImage':
        echo  $llamar->countImagenes();
        break;
}
?>
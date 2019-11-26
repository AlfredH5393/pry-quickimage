<?php
require('conexion.php');

    class counts{
        public function countUsers()
        {
            $connect= new conexion();
            $sql="SELECT COUNT('*') FROM `tblusuarios`";
            $result=mysqli_query($connect->conectarbd(),$sql);
            $row_users=mysqli_fetch_array($result);
            return $row_users[0];

        }
        public function countCategorys(){
            $connect= new conexion();
            $sql="SELECT COUNT('*') FROM `tblcategoria`";
            $result=mysqli_query($connect->conectarbd(),$sql);
            $row=mysqli_fetch_array($result);
            return $row[0];
        }
        public function countImagenes(){
            $connect= new conexion();
            $sql="SELECT COUNT('*') FROM `tblimagenes`";
            $result=mysqli_query($connect->conectarbd(),$sql);
            $row=mysqli_fetch_array($result);
            return $row[0];
        }
 
    }
?>
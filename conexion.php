<?php

class Cconexion{

    function ConexionBD(){

        $host='localhost';
        $dbname='ProyectoGestionBDDu1';
        $username='sa';
        $pasword ='1234';
        $puerto=1433;


        try{
            $conn = new PDO ("sqlsrv:Server=$host,$puerto;Database=$dbname",$username,$pasword);
            echo "Conexión Exitosa";
        }
        catch(PDOException $exp){
            echo ("No se logró conectar correctamente con la base de datos: $dbname, error: $exp");
        }

        return $conn;
    }

}

?>
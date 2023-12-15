<?php

class Cconexion{

    function ConexionBD(){

        $host='Steven';
        $dbname='ProyectoGestionBDDu1';
        $username='sa';
        $pasword ='datos';
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
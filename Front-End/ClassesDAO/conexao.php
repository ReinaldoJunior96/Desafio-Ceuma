<?php

/**
 *
 */
class PDOconectar
{

    function __construct()
    {
    }

    public function conectar()
    {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=desafio_ceuma;charset=utf8", "root", "",
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            //$pdo=new PDO("mysql:host=mysql942.umbler.com;dbname=mont-alverne;charset=utf8","reinaldo555","Reinaldo123",
            //array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            return $pdo;
        } catch (PDOException $ex) {
            echo "Erro: " . $ex->getMessage();
        }
    }
}

?>
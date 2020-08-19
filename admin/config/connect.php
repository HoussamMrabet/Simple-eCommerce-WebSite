<?php 

    $dsn    = 'mysql:host=localhost;dbname=pfeshop';
    $user   = 'root';
    $pass   = '';
    $option = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );

    try{
        $con = new PDO($dsn, $user, $pass, $option);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Connected';
    } catch(PDOEXCEPTION $e) {
        echo 'Error Connection' . $e->getMessage();
    }
?>
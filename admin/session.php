<?php 

    session_start();
    if(isset($_SESSION['Username'])){
        header('location: dashboard.php');
    }else{
        header('location: index.php');
        exit();
    }

?>
<?php 

    if(isset($_SESSION['Username'])){
        header('location: dashboard.php');
    }

?>
<?php  

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $username   =   $_POST['user'];
        $password   =   $_POST['pass'];
        $hashedPass =   sha1($password);

        // Check User Existence

        $st = $con->prepare("SELECT Username, Password From users where Username = ? and Password = ? and userPermission = 1");
        $st->execute(array($username, $hashedPass));
        $count = $st->rowCount();

        // Login if user existe

        if($count > 0){
            $_SESSION['Username'] = $username;
            header('location: dashboard.php');
            exit();
        }

    }

?>





<form class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <h4 class="text-center">Admin Login</h4>
    <input class="form-control" type="text" name="user" placeholder="Username" autocomplete="off"  />
    <input class="form-control" type="password" name="pass" placeholder="Password" autocomplete="new-password" />
    <input class="btn btn-primary btn-block" type="submit" value="Login">
</form>
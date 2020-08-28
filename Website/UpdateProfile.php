<?php

session_start();
include 'init.php';

echo "<h1 class='text-center'>Update Member</h1>";
echo "<div class='container'>";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get Variables From The Form

    $id 	= $_POST['userid'];
    $user 	= $_POST['username'];
    $email 	= $_POST['email'];
    $name 	= $_POST['full'];

    // Password Trick

    $pass = empty($_POST['newpassword']) ? $_POST['oldpassword'] : sha1($_POST['newpassword']);

    // Validate The Form

    $formErrors = array();

    if (strlen($user) < 4) {
        $formErrors[] = 'Username Cant Be Less Than <strong>4 Characters</strong>';
    }

    if (strlen($user) > 20) {
        $formErrors[] = 'Username Cant Be More Than <strong>20 Characters</strong>';
    }

    if (empty($user)) {
        $formErrors[] = 'Username Cant Be <strong>Empty</strong>';
    }

    if (empty($name)) {
        $formErrors[] = 'Full Name Cant Be <strong>Empty</strong>';
    }

    if (empty($email)) {
        $formErrors[] = 'Email Cant Be <strong>Empty</strong>';
    }

    // Loop Into Errors Array And Echo It

    foreach($formErrors as $error) {
        echo '<div class="alert alert-danger">' . $error . '</div>';
    }

    // Check If There's No Error Proceed The Update Operation

    if (empty($formErrors)) {

        $stmt2 = $con->prepare("SELECT 
                                    *
                                FROM 
                                    users
                                WHERE
                                    Username = ?
                                AND 
                                    UserID != ?");

        $stmt2->execute(array($user, $id));

        $count = $stmt2->rowCount();

        if ($count == 1) {

            $theMsg = '<div class="alert alert-danger">Sorry This User Is Exist</div>';

            redirectHome($theMsg, 'back');

        } else { 

            // Update The Database With This Info

            $stmt = $con->prepare("UPDATE users SET Username = ?, Email = ?, FullName = ?, Password = ? WHERE UserID = ?");

            $stmt->execute(array($user, $email, $name, $pass, $id));

            // Echo Success Message

            $theMsg = "<div class='alert alert-success'>" . $stmt->rowCount() . ' Record Updated</div>';

            echo $theMsg;

            $seconds = 2;

		    echo "<div class='alert alert-info'>You Will Be Redirected to your profil After $seconds Seconds.</div>";

		    header("refresh:$seconds;url='profile.php'");

        }

    }

} else {

    $theMsg = '<div class="alert alert-danger">Sorry You Cant Browse This Page Directly</div>';

    redirectHome($theMsg);

}

echo "</div>";
?>
<?php include $tpl . 'footer.php'; ?>
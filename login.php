<?php
// Include the DBController to connect to the database
require 'database/DBController.php';

session_start();

// Create an instance of DBController to connect to the database
$db = new DBController(); 

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate email and password (basic validation)
    if (empty($email) || empty($password)) {
        $error_message = "Email and password are required!";
    } else {
        // Check the database for the user
        $query = "SELECT * FROM user WHERE email = ?";
        $stmt = $db->con->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            
            // Check if password matches (use password_verify to compare hashed passwords)
            if (password_verify($password, $user['password'])) {
                // Password is correct, set session variables
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['first_name'] = $user['first_name'];
                $_SESSION['last_name'] = $user['last_name'];
                
                // Redirect to the homepage or dashboard
                header("Location: index.php");
                exit();
            } else {
                $error_message = "Invalid email or password!";
            }
        } else {
            $error_message = "No user found with that email!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Mobile Shopee</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<!-- start #header -->
<header id="header">
    <!-- Include your header content here -->
</header>
<!-- !start #header -->

<!-- start #login-form -->
<main id="login-form" class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center">Login</h3>

            <!-- Display error message if any -->
            <?php if (isset($error_message)): ?>
                <div class="alert alert-danger">
                    <?php echo $error_message; ?>
                </div>
            <?php endif; ?>

            <!-- Login Form -->
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
            <p class="text-center mt-3">
                Don't have an account? <a href="register.php">Register here</a>
            </p>
        </div>
    </div>
</main>
<!-- !start #login-form -->

<!-- Bootstrap JS and jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zyC0pXizt0oZ6mktR3Jfu9S5gKz5y5RmckjONB6y" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgR2Hk07Ti1z9fU5tUyp9XJ5pF35jpClK28hXy22lFqK9S4B9p9M" crossorigin="anonymous"></script>
</body>
</html>

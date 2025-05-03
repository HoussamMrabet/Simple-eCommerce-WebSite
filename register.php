<?php
// Include the DBController
require 'database/DBController.php';

// Create an instance of DBController
$db = new DBController();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if any field is empty
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        echo "All fields are required!";
        exit;
    }

    // Prepare SQL query to check if the email exists in the `user` table
    $query = "SELECT * FROM user WHERE email = ?";

    if ($stmt = $db->con->prepare($query)) {
        // Bind parameters
        $stmt->bind_param("s", $email);

        // Execute query
        $stmt->execute();

        // Store the result
        $stmt->store_result();

        // Check if the email already exists
        if ($stmt->num_rows > 0) {
            echo "Email already exists!";
        } else {
            // Email does not exist, so we can proceed with registration
            // Hash the password before saving it
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert the user data into the `user` table
            $insert_query = "INSERT INTO user (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";

            if ($insert_stmt = $db->con->prepare($insert_query)) {
                // Bind parameters
                $insert_stmt->bind_param("ssss", $first_name, $last_name, $email, $hashed_password);

                // Execute the insertion query
                if ($insert_stmt->execute()) {
                    echo "Registration successful!";
                } else {
                    echo "Error in registration: " . $insert_stmt->error;
                }

                // Close the statement
                $insert_stmt->close();
            } else {
                echo "Error preparing the insert query.";
            }
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing the query.";
    }

    // Close the connection
    $db->__destruct();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Mobile Shopee</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Register</h2>
    <form method="POST" action="register.php">
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

</body>
</html>

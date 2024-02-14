<?php

session_start();

// If the user is already logged in, redirect to the dashboard
if (isset($_SESSION['email'])) {
    header("Location: dashboard.php");
    exit();
}

// session_start(); // Start the session

include 'connection/connection.php';

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the submitted email and password
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query the database to check if the user exists with the provided credentials
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // If user exists, set session variables and redirect to a dashboard page
        $_SESSION['email'] = $email;
        header("Location: d_pages/dashboard.php");
        exit();
    } else {
        // If user does not exist or credentials are incorrect, display an error message
        echo "<div class='alert alert-danger'>Invalid email or password!</div>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles -->
    <style>
    body {
        background-color: #f5f5f5;
    }

    .login-form {
        width: 340px;
        margin: 150px auto;
        padding: 30px;
        background: #fff;
        border-radius: 5px;
        box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.1);
    }

    .login-form h2 {
        margin-bottom: 30px;
    }
    </style>
</head>

<body>

    <div class="login-form">
        <h2 class="text-center">Log in</h2>
        <form method="post">
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required="required">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Log in</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>

</html>

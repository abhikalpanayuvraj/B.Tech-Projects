<?php

// Start a session to store login information.
session_start();

// Get User ID and password from the form.
$user = $_POST['user_id'] ?? '';
$pass = $_POST['password'] ?? '';

// Check if the entered credentials are correct.
if ($user === 'admin' && $pass === '12345') {

    // Store login status in the session.
    $_SESSION['logged_in'] = true;

    // Store the username in the session.
    $_SESSION['username'] = $user;

    // Send the user to the dashboard.
    header("Location: dashboard.php");

    // Stop the script after redirecting.
    exit;
}

// Display an error if the login details are incorrect.
echo "FAAAH! Wrong username or password!";

// Provide a link to return to the login form.
echo '<br><a href="form.php">Try Again</a>';

?>

<?php
session_start();
if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: forgot.html");
    die();
}

include 'config.php';
$msg = "";

if (isset($_POST['submit'])) {
    $email = pg_escape_string($conn, $_POST['email']);

    if (pg_num_rows(pg_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
        // Generate a unique token
        $token = bin2hex(random_bytes(50));
        
        // Store the token in the database (optional)
        pg_query($conn, "UPDATE users SET reset_token='{$token}' WHERE email='{$email}'");

        // Send an email with the reset link
        $reset_link = "http://yourdomain.com/reset-password.php?token={$token}&email={$email}";
        mail($email, "Reset Your Password", "Click this link to reset your password: " . $reset_link);

        $msg = "<div class='alert alert-success'>A reset link has been sent to your email.</div>";
    } else {
        $msg = "<div class='alert alert-danger'>$email - This email address was not found.</div>";
    }
}
?>



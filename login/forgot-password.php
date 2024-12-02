<?php
session_start();
if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: welcome.php");
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Brave Coder</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="font-['Poppins'] bg-[rgba(99,194,110,0.1)] min-h-screen flex items-center justify-center py-4">
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="w-full max-w-4xl relative">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="flex flex-col md:flex-row">
                        <!-- Brand Side -->
                        <div class="md:w-1/2 bg-[#00c16e] flex items-center justify-center p-8">
                            <img src="images/image3.svg" alt="" class="w-full max-w-md">
                        </div>
                        
                        <!-- Form Side -->
                        <div class="md:w-1/2 p-8">
                            <h2 class="text-2xl font-bold mb-3">Forgot Password</h2>
                            <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            
                            <!-- Error Message Placeholder -->
                            <div id="message-container" class="mb-4">
                                <?php echo $msg; ?>
                            </div>

                            <!-- Forgot Password Form -->
                            <form method="post" action="" class="space-y-4">
                                <div>
                                    <input 
                                        type="email" 
                                        name="email" 
                                        placeholder="Enter Your Email" 
                                        required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#00c16e]"
                                    >
                                </div>
                                <button 
                                    type="submit" 
                                    name="submit" 
                                    class="w-full bg-[#00c16e] text-white py-2 rounded-md hover:bg-[#4ca356] transition duration-300"
                                >
                                    Send Reset Link
                                </button>
                            </form>

                            <!-- Footer Links -->
                            <div class="text-center mt-6">
                                <p class="text-gray-600">
                                    Back to! 
                                    <a href="index.php" class="text-[#00c16e] hover:underline">Login</a>
                                </p>
                                
                                <!-- Social Icons -->
                                <div class="flex justify-center space-x-4 mt-4">
                                    <a href="#" class="text-blue-600 hover:text-blue-700">
                                        <i class="fab fa-facebook text-2xl"></i>
                                    </a>
                                    <a href="#" class="text-blue-400 hover:text-blue-500">
                                        <i class="fab fa-twitter text-2xl"></i>
                                    </a>
                                    <a href="#" class="text-red-600 hover:text-red-700">
                                        <i class="fab fa-pinterest text-2xl"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
</body>
</html>
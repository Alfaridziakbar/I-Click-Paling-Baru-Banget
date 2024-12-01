<?php
ob_start();
session_start();

include 'config.php';
include 'header.php';
$msg = "";

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm-password']));
    $query = "SELECT * FROM users WHERE email='{$email}' AND password='{$password}'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $msg = "<div class='alert alert-danger'>Email and password combination already exists.</div>";
    } else {
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
            $msg = "<div class='alert alert-danger'>{$email} - This email address already exists.</div>";
        } else {
            if ($password === $confirm_password) {
                $sql = "INSERT INTO users (name, email, password) VALUES ('{$name}', '{$email}', '{$password}')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $_SESSION['SESSION_EMAIL'] = $email;
                    header("Location: ../Dashboard/index.html");
                    die();
                } else {
                    $msg = "<div class='alert alert-danger'>Registration failed. Please try again.</div>";
                }
            } else {
                $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match</div>";
            }
        }
    }
}
if (isset($_POST['guest_login'])) {
    $_SESSION['SESSION_EMAIL'] = 'guest@example.com';
    $_SESSION['IS_GUEST'] = true;
    header("Location: ../Dashboard/index.html");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-8 mt-8">
        <!-- Header -->
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-gray-900">Buat Akun Baru</h2>
            <p class="text-gray-600 mt-2">Daftar untuk membuat akun baru</p>
        </div>
        <?php echo $msg; ?>
        <form method="post" class="space-y-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Lengkap
                </label>
                <input type="text" id="name" name="name" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Masukkan nama lengkap">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                    Email
                </label>
                <input type="email" id="email" name="email" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="nama@email.com">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                    Password
                </label>
                <input type="password" id="password" name="password" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="••••••••">
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                    Konfirmasi Password
                </label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 mb-8"
                    placeholder="••••••••">
            </div>
            <button type="submit" name="submit"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mt-8">
                Daftar
            </button>
        </form>
        <div class="relative my-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-2 bg-white text-gray-500">OR</span>
            </div>
        </div>
        <form method="post" class="mb-6">
            <button type="submit" name="guest_login"
                class="w-full flex justify-center items-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <i class="fas fa-user mr-2"></i>Continue as Guest
            </button>
        </form>
        <p class="text-center text-sm text-gray-600">
            Sudah punya akun?
            <a href="index.php" class="font-medium text-blue-600 hover:underline">
                Login
            </a>
        </p>
    </div>
</body>
</html>
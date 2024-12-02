<?php
ob_start();
session_start();

include 'config.php';
include 'header.php';
$msg = "";

if (isset($_POST['submit'])) {

    function generate_uuid_v4() {
        $data = random_bytes(16); // Generate 16 bytes random data
        // Set versi ke 4 (0100)
        $data[6] = chr((ord($data[6]) & 0x0f) | 0x40);
        // Set variant ke 2 (10xx)
        $data[8] = chr((ord($data[8]) & 0x3f) | 0x80);
    
        // Formatkan UUID sesuai standar
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
    $name = pg_escape_string($conn, $_POST['name']);
    $email = pg_escape_string($conn, $_POST['email']);
    $password = pg_escape_string($conn, md5($_POST['password']));
    $confirm_password = pg_escape_string($conn, md5($_POST['confirm-password']));
    $query = "SELECT * FROM users WHERE email='{$email}' AND password='{$password}'";
    $result = pg_query($conn, $query);

    if (pg_num_rows($result) > 0) {
        $msg = "<div class='alert alert-danger'>Email and password combination already exists.</div>";
    } else {
        if (pg_num_rows(pg_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
            $msg = "<div class='alert alert-danger'>{$email} - This email address already exists.</div>";
        } else {
            if ($password === $confirm_password) {
                $id = generate_uuid_v4();
                // $id = 2;
                // var_dump($uuid);exit;
                $sql = "INSERT INTO users (user_id,name, email, password) VALUES ('{$id}','{$name}', '{$email}', '{$password}')";
                $result = pg_query($conn, $sql);

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
<<<<<<< HEAD
<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card form-container">
                    <div class="row g-0">
                        <div class="col-md-6 d-none d-md-block bg-primary text-white p-5 d-flex align-items-center justify-content-center">
                            <img src="" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body p-5">
                                <h2 class="card-title text-center mb-4">Register Now</h2>
                                <p class="text-center text-muted mb-4">Create your account to get started</p>
                                <?php echo $msg; ?>
                                <form action="" method="post">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" value="<?php if (isset($_POST['submit'])) { echo $name; } ?>" required>
                                        <label for="name">Enter Your Name</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" value="<?php if (isset($_POST['submit'])) { echo $email; } ?>" required>
                                        <label for="email">Enter Your Email</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="password" name="password" minlength="8" placeholder="Enter Your Password" required>
                                        <label for="password">Enter Your Password</label>
                                        <small id="passwordError" style="color: red; display: none;">Password harus berisikan minimal 8 karakter</small>
                                        <script>
                                            document.getElementById('password').addEventListener('input', function () {
                                                const passwordError = document.getElementById('passwordError');
                                                if (this.value.length < 8) {
                                                    passwordError.style.display = 'inline';
                                                } else {
                                                    passwordError.style.display = 'none';
                                                }
                                            });
                                        </script>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Enter Your Confirm Password" required>
                                        <label for="confirm-password">Confirm Your Password</label>
                                    </div>
                                    <div class="d-grid">
                                        <button class="btn btn-primary btn-lg" type="submit" name="submit">Register</button>
                                    </div>
                                </form>
                                <div class="divider">
                                    <span>OR</span>
                                </div>
                                <form action="/I-Click-Paling-Baru-Banget/login/index.php" method="post">
                                    <div class="d-grid">
                                        <button type="submit" name="guest_login" class="btn btn-guest">
                                            <i class="fas fa-user me-2"></i>Continue as Guest
                                        </button>
                                    </div>
                                </form>
                                <div class="text-center mt-4">
                                    <p>Have an account! <a href="index.php">Login</a>.</p>
                                </div>
                                <div class="text-center mt-4">
                                    <a href="#" class="text-muted me-3"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="text-muted me-3"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="text-muted"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
=======
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
>>>>>>> d159032c2a63cb779b392c4c105d1d902892eeae
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
<?php
if (isset($_POST['add_products'])) { // agar terhubung dengan button ADD
    
    // Koneksi ke database
    $connection = pg_connect("host=localhost dbname=ecom-abrar user=postgres password=Alifbatasa99");

    if (!$connection) {
        die("Koneksi database gagal: " . pg_last_error());
    }

    // Ambil dan validasi data input
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $price = filter_var($_POST['price'], FILTER_VALIDATE_FLOAT);
    $image = filter_var($_POST['image'], FILTER_SANITIZE_URL);

    if (empty($name) || !$price || !$image) {
        header('location:index.php?error=invalid_input');
        exit();
    }

    // Query yang aman
    $query = "INSERT INTO products (name, description, price, image_url) VALUES ($1, $2, $3, $4)";
    $result = pg_query_params($connection, $query, [$name, $description, $price, $image]);

    if (!$result) {
        die("Query Failed: " . pg_last_error($connection));
    } else {
        header('location:index.php?insert_msg=Your data has been added successfully');
        exit();
    }
}
?>

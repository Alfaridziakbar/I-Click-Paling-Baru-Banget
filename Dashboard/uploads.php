<?php
require_once 'dbconn.php';

if (isset($_POST["submit"])) {
    $productname = $_POST["productname"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $lokasi = $_POST["lokasi"];

    // For uploads photos
    $upload_dir = __DIR__ . "/uploads/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true); // Buat folder jika belum ada
    }

    $filename = str_replace(' ', '_', $_FILES["imageUpload"]["name"]);
    $upload_file = $upload_dir . $filename;
    $imageType = strtolower(pathinfo($upload_file, PATHINFO_EXTENSION));
    $check = $_FILES["imageUpload"]["size"];
    $upload_ok = 1;

    // Validasi file
    if (file_exists($upload_file)) {
        echo "<script>alert('The file already exists.');</script>";
        $upload_ok = 0;
    } elseif ($check > 8 * 1024 * 1024) {
        echo "<script>alert('The file is too large. Max size is 10MB.');</script>";
        $upload_ok = 0;
    } elseif (!in_array($imageType, ['jpg', 'png', 'jpeg', 'gif'])) {
        echo "<script>alert('Invalid file format. Use JPG, PNG, JPEG, or GIF.');</script>";
        $upload_ok = 0;
    }

    if ($upload_ok == 1) {
        if (is_uploaded_file($_FILES["imageUpload"]["tmp_name"])) {
            if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $upload_file)) {
                $sql = "INSERT INTO produk_2 (judul_produk, harga, deskripsi_produk, gambar, lokasi)
                        VALUES ('{$productname}', '{$price}', '{$description}', '{$upload_file}', '{$lokasi}')";

                $result = pg_query($connection, $sql);
                if ($result) {
                    echo "<script>alert('Your product uploaded successfully');</script>";
                } else {
                    echo "<script>alert('Failed to save product to database: " . pg_last_error($connection) . "');</script>";
                }
            } else {
                echo "<script>alert('Failed to move uploaded file');</script>";
            }
        } else {
            echo "<script>alert('File upload failed. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('File validation failed. Please check your input.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="upload.css">
</head>
<body>
    <?php
         include_once 'header.php';

    ?>
    <section id="upload_container">
        <form action="uploads.php" method="POST" enctype="multipart/form-data" >
            <input type="text" name="productname" id="productname" placeholder="Product Name" required>
            <input type="text" name="lokasi" id="lokasi" placeholder="lokasi" required>
            <input type="number" name="price" id="price" placeholder="Product Price" required>
            <input type="text" name="description" id="description" placeholder="Product description">
            <input type="file" name="imageUpload" id="imageUpload" required hidden>
            <button id="choose" type="button" onclick="upload();">Choose Image</button>
            <input type="submit" value="Upload" name="submit">
        </form>
    </section>

    <script>
        var productname = document.getElementById("productname");
        var lokasi = document.getElementById("lokasi");
        var price = document.getElementById("price");
        var description = document.getElementById("description");
        var choose = document.getElementById("choose");
        var uploadImage = document.getElementById("imageUpload");

        function upload(){
            uploadImage.click();
        }

        uploadImage.addEventListener("change",function(){
            var file = this.files[0];
            if(productname.value == ""){
                productname.value = file.name;
            }
            choose.innerHTML = "You can change("+file.name+") picture";
        })
    </script>
</body>
</html>
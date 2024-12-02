<?php
// Informasi koneksi
$host = "localhost";
$port = "5432";
$dbname = "ecom-abrar";
$user = "postgres";
$password = "Alifbatasa99";

// Membuat string koneksi
$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

// Membuka koneksi
$conn = pg_connect($conn_string);

// Periksa koneksi
// if (!$conn) {
//     echo "Koneksi ke PostgreSQL gagal!";
// } else {
//     echo "Koneksi berhasil!";
// }
// ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Produk</title>
<!-- Bootstrap CSS -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="../style/style.css" />
    <style>
      body, html {
        height: 100%;
        margin: 0;
        background-color: #D9F5FB;
        }
    
        .navbar {
        background-color: #03045E !important;
        border-bottom: 1px solid;
        z-index: 1000;
        }
    
        /* Full height loading screen */
        .container-fluid {
        background-color: #03045E; /* Warna latar belakang sama dengan navbar */
        height: 100vh;
        display: flex;
        flex-direction: column; /* Menyusun logo dan loading bar secara vertikal */
        justify-content: center;
        align-items: center;
        position: fixed; /* Menutupi seluruh halaman */
        top: 0;
        left: 0;
        z-index: 9999; /* Menempatkan loading screen di atas konten lain */
        }
    
        /* Logo */
        .logo {
        max-width: 300px; /* Ukuran besar logo */
        width: 100%;
        animation: fadeUpAnimation 1s forwards; /* Menambahkan animasi fade-up */
        }
    
        /* Loading Bar */
        .loading-bar-container {
        width: 80%; /* Lebar kontainer untuk loading bar */
        height: 12px; /* Lebar loading bar lebih besar dari sebelumnya */
        background-color: rgba(255, 255, 255, 0.3); /* Warna latar belakang loading bar */
        margin-top: 20px; /* Jarak antara logo dan loading bar */
        display: flex;
        justify-content: center;
        align-items: center;
        }
    
        .loading-bar {
        height: 100%;
        background-color: #ffffff; /* Warna loading bar */
        width: 0%; /* Awal loading bar */
        transition: width 3s ease-out; /* Progres loading bar selesai dalam 3 detik */
        }
    
        /* Animasi untuk menghilangkan loading screen */
        .fade-out {
        animation: fadeOutAnimation 1s forwards;
        }
    
        @keyframes fadeOutAnimation {
        0% {
            opacity: 1;
        }
        100% {
            opacity: 0;
        }
        }
    
        /* Animasi untuk logo muncul (fade-up) */
        @keyframes fadeUpAnimation {
        0% {
            opacity: 0;
            transform: translateY(20px); /* Mulai dari bawah */
        }
        100% {
            opacity: 1;
            transform: translateY(0); /* Pindah ke posisi semula */
        }
        }
    
        /* Konten utama setelah loading screen menghilang */
        .main-content {
        display: none;
        }

        /* Perbaikan untuk cart-link */
    .cart-link {
      position: relative; /* Tambahkan ini agar badge terikat dengan benar */
    }

    #cart-count {
      position: absolute;
      top: -5px; /* Sesuaikan posisi badge di atas ikon */
      right: -5px;
      background-color: #dc3545; /* Warna merah badge */
      color: white;
      border-radius: 50%;
      font-size: 0.75rem;
      padding: 0.25em 0.4em;
    }

    
        .carousel-image {
        transition: transform 0.3s ease, opacity 0.3s easce;
        cursor: pointer; /* Mengubah kursor menjadi tangan saat hover */
      }
    
      .carousel-image:hover {
        transform: scale(1.05); /* Membesarkan gambar sedikit saat hover */
        opacity: 0.8; /* Mengubah transparansi gambar untuk efek lebih halus */
      }    
    </style>
  </head>
  <body>


    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom fixed-top">
      <div class="container">
        <a class="navbar-brand" href="../Dashboard/index.php"><img src="../Images/group 1.png" alt=""
          style="width: 120px;"></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarContent"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navbarContent">
          <div class="d-flex align-items-center ms-auto">
            <a href="wishlist.html" class="nav-link me-3 wishlist-link">
              <i class="bi bi-heart" style="color: aliceblue;"></i>
            </a>
            <a href="cart-page.php" class="nav-link me-3 cart-link">
              <i class="bi bi-cart" style="color: aliceblue;"></i>
              <span id="cart-count" class="badge bg-danger">0</span>
            </a>
            <div id="loginStateContainer">
              <!-- Login state content -->
            </div>
          </div>
        </div>
      </div>
    </nav>
</head>
<body>
    
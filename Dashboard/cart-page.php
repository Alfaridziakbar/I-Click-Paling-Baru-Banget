<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - I-Click</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        .navbar {
            background-color: #03045E !important;
            border-bottom: 1px solid;
            z-index: 1000;
            }
        .cart-item {
            border-bottom: 1px solid #dee2e6;
            padding: 15px 0;
        }
        .cart-item img {
            max-width: 100px;
        }
        .cart-total {
            font-size: 1.5rem;
            font-weight: bold;
        }

        body{
        background-color: #d9f5fb;
      }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom fixed-top">
        <div class="container">
<<<<<<< HEAD:Dashboard/cart-page.php
            <a class="navbar-brand" href="index.php"><img src="../Images/group 1.png" alt="" style="width: 120px;"></a>
=======
            <a class="navbar-brand" href="index.html"><img src="../Images/group 1.png" alt="" style="width: 120px;"></a>
>>>>>>> 2f54b4a27022c89d6a0454d7f333c1f91edda058:Dashboard/cart-page.html
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarContent">
                <div class="d-flex align-items-center ms-auto">
                    <!-- Wishlist Icon -->
                    <a href="wishlist.html" class="nav-link me-3 wishlist-link">
                        <i class="bi bi-heart" style="color: aliceblue;"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    

    <!-- Cart Page Content -->
    <div class="container mt-5 pt-5">
        <h1 class="mb-4">Keranjang Belanja</h1>

        <!-- Cart Items -->
        <div id="cart-items" class="mb-4"></div>

        <!-- Cart Total -->
        <div class="d-flex justify-content-between align-items-center">
            <span class="cart-total">Total: <span id="cart-total-price">Rp 0</span></span>
            <button id="checkout-btn" class="btn btn-success">Lanjutkan ke Pembayaran</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="../Script/handler.js"></script>
    <script src="../Script/cart-page.js"></script>
    <script src="../Script/product-detail.js"></script>
    <script src="../Script/Shopping-cart.js"></script>
</body>
</html>

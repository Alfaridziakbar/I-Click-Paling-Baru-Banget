<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail - I-Click</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="../style/style.css"/>
    <script type="text/javascript"
		src="https://app.stg.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-pkORmHJnQnn4rzQB"></script>
   
</head>
<body>

<?php include('header.php');?>

            <div class="collapse navbar-collapse" id="navbarContent">
                <div class="d-flex align-items-center ms-auto">
                    <!-- <a href="../Dashboard/cart-page.html" class="nav-link me-3">
                        <i class="bi bi-cart"></i>
                    </a> -->
                    <a href="wishlist.html" class="nav-link me-3 wishlist-link">
                        <i class="bi bi-heart"></i>
                    </a>
                    <a href="cart-page.php
                    " class="nav-link me-3 cart-link">
                        <i class="bi bi-cart"></i>
                        <span id="cart-count" class="badge bg-danger" style="position: absolute; top: -1px; right: 10px;">0</span>
                    </a>
                    
                    
                    <div id="loginStateContainer">
                        <!-- Login state content -->
                    </div>
                </div>
            </div>
        </div>
      </nav>

    <!-- Product Detail Content -->
    <div class="container mt-5 pt-5">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="row">
                <!-- Product Image -->
                <div class="col-md-6">
                    <img id="product-image" class="img-fluid rounded-lg" alt="Product Image">
                </div>
                
                <!-- Product Info -->
                <div class="col-md-6">
                    <h1 id="product-title" class="text-2xl font-bold"></h1>
                    <div class="d-flex align-items-center mb-3">
                        <span id="product-price" class="h4 font-semibold"></span>
                        <span id="product-original-price" class="text-muted ms-3 text-decoration-line-through"></span>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <span class="text-warning">★</span>
                        <span id="product-rating" class="ms-2"></span>
                        <span class="text-muted ms-3">|</span>
                        <span class="ms-2">Terjual <span id="product-sold"></span></span>
                    </div>

                    <div class="border-top border-bottom py-3">
                        <h5>Deskripsi Produk</h5>
                        <p id="product-description"></p>
                    </div>

                    <!-- Quantity Selector -->
                    <div class="d-flex align-items-center mb-4">
                        <span class="me-2">Jumlah:</span>
                        <div class="d-flex align-items-center border rounded">
                            <button id="quantity-decrease" class="btn btn-outline-secondary px-3">-</button>
                            <span type="number" name="quantity" id="quantity" class="px-3">1</span>
                            <button id="quantity-increase" class="btn btn-outline-secondary px-3">+</button>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <!-- <div class="d-flex">
                        <button id="add-to-cart" class="btn btn-primary flex-fill me-2">Tambah ke Keranjang</button>
                        <button id="buy-now" class="btn btn-success flex-fill">Beli Sekarang</button>
                    </div> -->
                    <div id="product-detail" data-id="1" data-name="Produk A" data-price="50000">
                        <!-- Tombol Tambah ke Keranjang dan Beli Sekarang -->
                        <!-- <div class="d-flex">
                            <button id="add-to-cart" class="btn btn-primary flex-fill me-2">Tambah ke Keranjang</button>
                            <button id="buy-now" class="btn btn-success flex-fill">Beli Sekarang</button>
                        </div> -->
                        <div class="d-flex">
                            <button id="add-to-cart" class="btn btn-primary flex-fill me-2">Tambah ke Keranjang</button>
                            <button class="btn btn-secondary flex-fill me-2" onclick="addToWishlist()">Tambah ke Wishlist</button>
                            <button id="buy-now" class="btn btn-success flex-fill">Beli Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="../Script/nav.js"></script>
    <script src="../Script/product-detail.js"></script>
    <script src="../Script/handler.js"></script>
    <script src="../Script/Shopping-cart.js"></script>
    <script src="../Script/cart-page.js"></script>
    <!-- <script src="../Script/cart-hover.js"></script> -->
    <script src="../Script/wishlist.js"></script>
    <script>
        function addToWishlist() {
            const product = {
                id: document.getElementById("product-detail").dataset.id,
                name: document.getElementById("product-title").textContent,
                price: document.getElementById("product-price").textContent,
                image: document.getElementById("product-image").src
            };

            let wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];

            if (!wishlist.some(item => item.id === product.id)) {
                wishlist.push(product);
                localStorage.setItem("wishlist", JSON.stringify(wishlist));
                alert("Produk ditambahkan ke wishlist!");
            } else {
                alert("Produk sudah ada di wishlist.");
            }
        }
    </script>
        <script src="../Script/product-detail.js"></script>
</body>
</html>

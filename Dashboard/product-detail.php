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
    data-client-key="Mid-client-mtMWKML0hsdAsnGg"></script>
   
</head>
<body>

<?php include('header_2.php');?>

    <!-- Product Detail Content -->
    <div class="container mt-5 pt-5">
        <div class="bg-white rounded-lg shadow-md p-6" id="product-detail" data-id="1" data-name="Product 1" data-price="200000">
            <div class="row">
                <!-- Product Image -->
                <div class="col-md-6">
                    <img id="product-image" class="img-fluid rounded-lg" alt="Product Image">
                </div>
                
                <!-- Product Info -->
                <div class="col-md-6">
                    <h1 id="product-title" class="text-2xl font-bold">Product Title</h1>
                    <div class="d-flex align-items-center mb-3">
                        <span id="product-price" class="h4 font-semibold">Rp 200,000</span>
                        <span id="product-original-price" class="text-muted ms-3 text-decoration-line-through">Rp 250,000</span>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <span class="text-warning">★</span>
                        <span id="product-rating" class="ms-2">4.5</span>
                        <span class="text-muted ms-3">|</span>
                        <span class="ms-2">Terjual <span id="product-sold">100</span></span>
                    </div>

                    <div class="border-top border-bottom py-3">
                        <h5>Deskripsi Produk</h5>
                        <p id="product-description">This is the product description</p>
                    </div>

                    <!-- Quantity Selector -->
                    <div class="d-flex align-items-center mb-4">
                        <span class="me-2">Jumlah:</span>
                        <div class="d-flex align-items-center border rounded">
                            <button id="quantity-decrease" class="btn btn-outline-secondary px-3">-</button>
                            <span id="quantity" class="px-3">1</span>
                            <button id="quantity-increase" class="btn btn-outline-secondary px-3">+</button>
                        </div>
                    </div>

                        <div class="d-flex">
                            <button id="add-to-cart" class="btn btn-primary flex-fill me-2">Tambah ke Keranjang</button>
                            <button class="btn btn-secondary flex-fill me-2" onclick="addToWishlist()">Tambah ke Wishlist</button>
                            <button id="buy-now" class="btn btn-success flex-fill">Beli Sekarang</button>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="../Script/nav2.js"></script>
    <script src="../Script/product-detail.js"></script>
    <script src="../Script/handler.js"></script>
    <script src="../Script/price.js"></script>
    <script src="../Script/cart-page.js"></script>
    <script src="../Script/wishlist.js"></script>
    <script 
        type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="YOUR_CLIENT_KEY"></script>
        <script>
        document.getElementById("buy-now").addEventListener("click", function () {
    const productDetail = document.getElementById("product-detail");

    // Get product details
    const product = {
        id: productDetail.dataset.id,
        name: productDetail.dataset.name,
        price: parseInt(document.getElementById("product-price").textContent.replace(/[^\d]/g, "")), // Extract price as number
    };

    if (isNaN(product.price) || product.price <= 0) {
        alert("Harga produk tidak valid!");
        return;
    }

    // Prepare transaction data for Midtrans
    const transactionData = {
        order_id: `ORDER-${Date.now()}`,
        gross_amount: product.price,
        item_details: [{
            id: product.id,
            name: product.name.slice(0, 5000), // Max 50 characters
            price: product.price,
            quantity: 1
        }],
        customer_details: {
            first_name: "John", // Dummy customer data
            last_name: "Doe",
            email: "johndoe@example.com",
            phone: "08123456789"
        }
    };

    // Send transaction data to Midtrans
    fetch("Payment/examples/snap/checkout-process-simple-version.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(transactionData)
    })
    .then(response => response.text()) // Get Snap token
    .then(snapToken => {
        // Open Midtrans payment gateway
        snap.pay(snapToken, {
            onSuccess: function(result) {
                alert("Pembayaran berhasil!");
                console.log(result);
            },
            onPending: function(result) {
                alert("Pembayaran sedang diproses.");
                console.log(result);
            },
            onError: function(result) {
                alert("Pembayaran gagal!");
                console.log(result);
            },
            onClose: function() {
                alert("Pembayaran ditutup.");
            }
        });
    })
    .catch(error => {
        console.error("Error fetching Snap Token:", error);
        alert("Gagal memproses pembayaran. Silakan coba lagi.");
    });
});

    </script>
</body>
</html>

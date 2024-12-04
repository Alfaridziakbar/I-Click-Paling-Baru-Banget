// Fungsi untuk membersihkan dan memformat harga
function extractPrice(priceString) {
    return parseFloat(priceString.replace(/[^0-9,-]+/g, '').replace(',', '.'));
}

function addToWishlist() {
    const product = JSON.parse(sessionStorage.getItem('selectedProduct'));

    if (!product) {
        alert('Tidak ada produk yang dipilih');
        return;
    }

    const wishlistItem = {
        id: Date.now().toString(),
        name: product.title,
        price: extractPrice(product.price),
        image: product.image
    };

    let wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];
    const isDuplicate = wishlist.some(item => item.name === wishlistItem.name && item.price === wishlistItem.price);

    // Menggunakan alert untuk notifikasi
    if (!isDuplicate) {
        wishlist.push(wishlistItem);
        localStorage.setItem("wishlist", JSON.stringify(wishlist));
        alert("Produk berhasil ditambahkan ke wishlist!"); // Notifikasi berhasil
    } else {
        alert("Produk sudah ada di wishlist."); // Notifikasi sudah ada
    }
}

// Tunggu hingga halaman sepenuhnya dimuat
document.addEventListener('DOMContentLoaded', () => {
    const product = JSON.parse(sessionStorage.getItem('selectedProduct'));

    const productImage = document.getElementById('product-image');
    const productTitle = document.getElementById('product-title');
    const productPrice = document.getElementById('product-price');
    const productOriginalPrice = document.getElementById('product-original-price');
    const productRating = document.getElementById('product-rating');
    const productSold = document.getElementById('product-sold');
    const productDescription = document.getElementById('product-description');
    const addToCartBtn = document.getElementById('add-to-cart');
    const addToWishlistBtn = document.getElementById('add-to-wishlist');
    const quantityDecreaseBtn = document.getElementById('quantity-decrease');
    const quantityIncreaseBtn = document.getElementById('quantity-increase');
    const quantityElement = document.getElementById('quantity');

    if (product) {
        productImage.src = product.image || '/api/placeholder/400/400';
        productTitle.textContent = product.title || 'Nama Produk';
        productPrice.textContent = product.price || 'Harga tidak tersedia';
        productOriginalPrice.textContent = product.originalPrice || '';
        productRating.textContent = product.rating || '0';
        productSold.textContent = product.sold || '0';
        productDescription.textContent = product.description || 'Deskripsi tidak tersedia';
    } else {
        console.warn('Tidak ada data produk yang tersedia');
    }

    let quantity = 1;
    quantityElement.textContent = quantity;

    quantityDecreaseBtn.addEventListener('click', () => {
        quantity = Math.max(1, quantity - 1);
        quantityElement.textContent = quantity;
    });

    quantityIncreaseBtn.addEventListener('click', () => {
        quantity += 1;
        quantityElement.textContent = quantity;
    });

    addToCartBtn.addEventListener('click', () => {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        const productPriceValue = extractPrice(product.price);
        const cartItem = {
            ...product,
            price: productPriceValue,
            quantity: quantity
        };

        const existingProduct = cart.find(item => item.title === product.title);
        if (existingProduct) {
            existingProduct.quantity += quantity;
        } else {
            cart.push(cartItem);
        }

        localStorage.setItem('cart', JSON.stringify(cart));
        alert("Produk berhasil ditambahkan ke keranjang!"); // Notifikasi keranjang
    });

    addToWishlistBtn.addEventListener('click', addToWishlist);
});
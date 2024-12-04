// Fungsi untuk memformat harga ke dalam format rupiah
function formatPrice(price) {
    return "Rp " + price.toLocaleString("id-ID", {
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    });
}

// Fungsi untuk menghapus produk dari wishlist
function removeFromWishlist(id) {
    let wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];
    wishlist = wishlist.filter(item => item.id !== id);
    localStorage.setItem("wishlist", JSON.stringify(wishlist));
    loadWishlist(); // Muat ulang wishlist setelah menghapus
}

// Fungsi untuk menambahkan produk dari wishlist ke keranjang
function addToCartFromWishlist(id) {
    let wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    // Temukan produk di wishlist
    const productToAdd = wishlist.find(item => item.id === id);

    if (productToAdd) {
        // Cek apakah produk sudah ada di keranjang
        const existingCartItem = cart.find(item => item.name === productToAdd.name);

        if (existingCartItem) {
            // Jika sudah ada, tambahkan quantitynya
            existingCartItem.quantity += 1;
        } else {
            // Jika belum ada, tambahkan produk baru dengan quantity 1
            cart.push({
                ...productToAdd,
                quantity: 1
            });
        }

        // Simpan ke localStorage
        localStorage.setItem("cart", JSON.stringify(cart));
        
        // Tampilkan notifikasi
        alert("Produk berhasil ditambahkan ke keranjang!");
    }
}

// Fungsi untuk memuat dan menampilkan wishlist
function loadWishlist() {
    const wishlistContainer = document.getElementById("wishlist-container");
    const wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];

    // Bersihkan kontainer sebelum memuat
    wishlistContainer.innerHTML = "";

    // Tampilkan pesan jika wishlist kosong
    if (wishlist.length === 0) {
        wishlistContainer.innerHTML = `
            <div class="col-12 text-center mt-5">
                <i class="bi bi-heart fs-1 text-muted"></i>
                <p class="mt-3">Wishlist Anda masih kosong</p>
            </div>
        `;
        return;
    }

    // Buat kartu untuk setiap produk di wishlist
    wishlist.forEach(product => {
        const productCard = document.createElement("div");
        productCard.classList.add("col-md-4", "mb-4");
        productCard.innerHTML = `
            <div class="card">
                <img src="${product.image}" class="card-img-top" alt="${product.name}">
                <div class="card-body">
                    <h5 class="card-title">${product.name}</h5>
                    <p class="card-text">${formatPrice(product.price)}</p>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary add-to-cart" data-id="${product.id}">
                            <i class="bi bi-cart-plus"></i> Keranjang
                        </button>
                        <button class="btn btn-danger remove-wishlist" data-id="${product.id}">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </div>
                </div>
            </div>
        `;
        wishlistContainer.appendChild(productCard);
    });

    // Tambahkan event listener untuk tombol hapus dan tambah ke keranjang
    wishlistContainer.addEventListener("click", function(event) {
        const target = event.target;

        // Tombol hapus dari wishlist
        if (target.closest(".remove-wishlist")) {
            const id = target.closest(".remove-wishlist").getAttribute("data-id");
            removeFromWishlist(id);
        }

        // Tombol tambah ke keranjang
        if (target.closest(".add-to-cart")) {
            const id = target.closest(".add-to-cart").getAttribute("data-id");
            addToCartFromWishlist(id);
        }
    });
}

// Muat wishlist saat halaman selesai dimuat
window.addEventListener("load", loadWishlist);

// Tambahan: Sinkronisasi wishlist antar tab/window
window.addEventListener("storage", function(event) {
    if (event.key === "wishlist") {
        loadWishlist();
    }
});
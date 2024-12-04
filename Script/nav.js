document.addEventListener("DOMContentLoaded", () => {
  checkLoginState();
  updateCartCount(); // Panggil fungsi untuk memperbarui jumlah barang di keranjang saat halaman dimuat
});

// Fungsi untuk memeriksa status login
function checkLoginState() {
  fetch("check_session.php")
    .then((response) => response.json())
    .then((data) => {
      const container = document.getElementById("loginStateContainer");

      if (data.isLoggedIn) {
        container.innerHTML = `
          <div class="dropdown me-3">
            <div class="d-flex align-items-center">
              <span class="navbar-text me-3">
                Hello, ${data.username}
              </span>
              <a href="../login/logout.php" class="btn btn-light">Logout</a>
            </div>
          </div>
        `;
      } else {
        container.innerHTML = `
          <a href="../login" class="btn btn-outline-success me-2">Masuk</a>
          <a href="../login/register.php" class="btn btn-success">Daftar</a>
        `;
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      const container = document.getElementById("loginStateContainer");
      container.innerHTML = `
        <a href="../login" class="btn btn-outline-success me-2">Masuk</a>
        <a href="../login/register.php" class="btn btn-success">Daftar</a>
      `;
    });
}

// Fungsi untuk memperbarui jumlah barang di notifikasi cart (badge di navbar)
function updateCartCount() {
  const cartCountElement = document.getElementById("cart-count");
  const cart = JSON.parse(localStorage.getItem("cart")) || []; // Ambil data keranjang dari localStorage
  const totalItems = cart.reduce((total, item) => total + item.quantity, 0); // Hitung total barang
  cartCountElement.textContent = totalItems; // Perbarui teks di elemen badge
}

// Animasi teks pada hero section
new Typed('#typed-text', {
  strings: ['The Aborigin', '3Didaw', 'Binary Bites'],
  typeSpeed: 50,
  backSpeed: 30,
  loop: true
});

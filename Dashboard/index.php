<?php 
require_once 'dbconn.php';




?>
<?php include('header.php');?>
  <!-- Full Page Loading Screen -->
  <div data-aos="fade-down"
    id="loading-screen" class="container-fluid">
    <img src="../Images/group 1.png" alt="Logo" class="logo" id="logo">
    <div class="loading-bar-container">
      <div class="loading-bar" id="loading-bar"></div>
    </div>
  </div>
  
  <!-- Hero Section -->
<div class="container my-5">
  <div class="row hero-section p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center">
    <div class="col-lg-6 p-3 p-lg-5 pt-lg-3">
      <h1 class="ok display-4 fw-bold lh-1">
        Selamat Datang di I-Click Official Store
        <style>
          .ok {
            font-family: "Poppins", serif;
            font-size: 50px;
          }
        </style>
      </h1>
      <h2 class="display-8 fw-bold lh-4">
        Partner of <span id="typed-text"></span>
      </h2>

      <p class="lead">
        Temukan berbagai produk berkualitas dengan harga terbaik. Belanja
        mudah, aman, dan terpercaya.
      </p>
      <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
        <button type="button" class="btn-tes btn btn-primary btn-lg px-4 me-md-2 fw-bold">
          <style>
            @import url('https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

            .btn-tes { 
            background-color: #000000;
            border: none;
            color: #ffffff;
            border-radius: 1000px;
            font-family:"Poppins", serif;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
          }
            .btn-tes::after{
            content: '';
            position: absolute;
            height: 100%;
            width: 100%;
            border-radius: 1000px;
            background-image: linear-gradient(to bottom right, #19195f, #500487);
            z-index: -1;
          }
          .btn-tes:hover{
            z-index: 0;
            box-shadow: 10px 0 30px #04044a;
          }
          .btn-tes a{
            font-weight: 300;
          }

          </style>
          <a href="#products">Belanja Sekarang</a>
        </button>
      </div>
    </div>
    <div data-aos="zoom-in" class="col-lg-5 p-0 hero-image-container">
      <div id="heroCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
          <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../Images/3Didaw.png" alt="Gambar 1" class="carousel-image" />
          </div>
          <div class="carousel-item">
            <img src="../Images/aborigin.png" alt="Gambar 2" class="carousel-image" />
          </div>
          <div class="carousel-item">
            <img src="../Images/Binary.png" alt="Gambar 3" class="carousel-image" />
          </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal untuk Deskripsi Gambar -->
<div class="modal fade" id="imageDescriptionModal" tabindex="-1" aria-labelledby="imageDescriptionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imageDescriptionModalLabel">Deskripsi Gambar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="imageDescription">Deskripsi panjang gambar akan muncul di sini.</p>
      </div>
    </div>
  </div>
</div>

    <!-- Daftar Isi Produk -->
    <div class="bgproduk">
    <section id="products" class="container my-5">
      <h2 class="oke text-center">Daftar Produk</h2>
      <style>
        .oke {
          font-family: "Poppins", serif;
          font-size: 30px;
        }
      </style>
      <div class="container mt-4 mb-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="okee mb-0">Product 3Didaw</h5>
          <style>
            .okee {
              font-family: "Poppins", serif;
              font-style: italic;
              font-size: 20px;
            }
          </style>
          <a href="#" class="text-primary text-decoration-none"
            >Lihat Semua Barang</a
          >
        </div>

        <?php include('cart-3Didaw.php');?>
        <?php include('cart-aborigin.php');?>
        <?php include('cart-binary.php');?>

      </section>

    <?php include('footer.php'); ?>

    <?php  
    
    
    ?>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="../Script/script.js"></script>
    <script src="../Script/nav.js"></script>
    <script src="../Script/img.js"></script>
    <script src="../Script/product-detail.js"></script>
    <script src="../Script/handler.js"></script>
    <script src="../Script/Shopping-cart.js"></script>
    <script src="../Script/cart-page.js"></script>
    <!-- <script src="../Script/cart-hover.js"></script> -->

    <script>
      AOS.init();
    </script>

<!-- JavaScript untuk menangani klik gambar dan menampilkan modal dengan judul dan deskripsi yang berbeda -->
<script>
  // Menangani klik pada gambar carousel
  document.querySelectorAll('.carousel-image').forEach((img, index) => {
    img.addEventListener('click', () => {
      let titleText = '';
      let descriptionText = '';

      // Menentukan judul dan deskripsi untuk masing-masing gambar
      switch (index) {
        case 0:
          titleText = 'Apa Itu 3DiDAW?';
          descriptionText = '3DiDAW adalah platform inovatif untuk menciptakan konten 3D yang interaktif dan dinamis. ' +
                            'Inovasi di Dunia 3D\n3DiDAW mempermudah pengembang dan desainer untuk membuat model 3D dengan fitur-fitur canggih yang mendukung kreativitas. ' +
                            'Dengan 3DiDAW, Anda dapat menciptakan visual yang menakjubkan untuk berbagai keperluan, mulai dari animasi, arsitektur, hingga aplikasi VR. ' +
                            'Fitur Utama:\n- Antarmuka yang ramah pengguna\n- Rendering real-time\n- Integrasi dengan berbagai alat desain';
          break;
        case 1:
          titleText = 'Apa Itu The Aborigin?';
          descriptionText = 'The Aborigin adalah clothing brand lokal yang dirancang untuk skena style berdiri sejak 2024. ' +
                            'Local Clothing Brand:\nThe Aborigin memudahkan para fashion enthusiast dan pecinta streetwear untuk mengekspresikan gaya mereka dengan desain pakaian otentik dan berkualitas. ' +
                            'Dengan The Aborigin, Anda dapat menemukan koleksi unik yang mencerminkan kepribadian Anda, cocok untuk berbagai aktivitas, mulai dari hangout santai, acara komunitas, hingga gaya sehari-hari yang berkelas. ' +
                            'Mengapa harus Aborigin?\n- Kaos yang vintage dan cozy\n- Simple dan Elegan\n- Ramah dikantong pelajar terkhusus mahasiswa';
          break;
        case 2:
          titleText = 'Lezatnya Binary Bite';
          descriptionText = 'Binary adalah representasi dasar dari data digital yang digunakan dalam berbagai aplikasi teknologi, termasuk pemrograman dan komputasi data. ' +
                            'Dengan konsep Binary Bite, kami menghadirkan pengalaman kuliner yang terinspirasi oleh dunia digital. Nikmati berbagai hidangan lezat yang menggabungkan keunikan rasa dengan konsep inovatif yang menarik.';
          break;
        default:
          titleText = 'Deskripsi Tidak Ditemukan';
          descriptionText = 'Deskripsi untuk gambar ini tidak ditemukan.';
          break;
      }

      // Mengubah judul dan deskripsi modal
      document.getElementById('imageDescriptionModalLabel').textContent = titleText;
      document.getElementById('imageDescription').textContent = descriptionText;

      // Menampilkan modal
      new bootstrap.Modal(document.getElementById('imageDescriptionModal')).show();
    });
  });
</script>

<script>
  window.onload = function() {
  const loadingScreen = document.getElementById("loading-screen");
  const loadingBar = document.getElementById("loading-bar");
  const logo = document.getElementById("logo");
  
  // Dapatkan lebar logo
  const logoWidth = logo.offsetWidth;

  // Set lebar loading bar sesuai dengan lebar logo
  const loadingBarContainer = document.querySelector('.loading-bar-container');
  loadingBarContainer.style.width = `${logoWidth}px`; // Menyesuaikan panjang loading bar dengan lebar logo

  // Progres loading bar
  setTimeout(() => {
      loadingBar.style.width = "100%"; // Loading bar selesai dalam 3 detik
  }, 100);

  // Menghilangkan loading screen setelah loading selesai
  setTimeout(() => {
      loadingScreen.classList.add("fade-out");
  }, 3000); // Animasi fade-out dimulai setelah loading bar selesai

  // Menampilkan konten utama setelah animasi selesai
  setTimeout(() => {
      loadingScreen.style.display = "none"; // Menghapus loading screen
      document.querySelector(".main-content").style.display = "block"; // Menampilkan konten utama
  }, 4000); // Fade-out selesai dalam 1 detik
  };

  </script>
  <script>
    feather.replace();
  </script>
  <!-- <script src="../Script/cart-hover.js"></script> -->

  </body>
</html>

<?php include('header.php');?>
<?php 

  require_once 'dbconn.php';
  $sql = 'SELECT * FROM produk_2';
  $all_product = pg_query($connection, $sql);
  
  
  ?>

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
        <?php
          while($row = pg_fetch_assoc($all_product)){
       ?>

    <div class="products-scroll-container">
          <button class="scroll-button scroll-left hidden" id="scrollLeft1">
            <i class="fas fa-chevron-left"></i>
          </button>
          <button class="scroll-button scroll-right" id="scrollRight1">
            <i class="fas fa-chevron-right"></i>
          </button>
          <div class="products-container g-4" id="container1">
            <div class="card product-card">
              <img
                src="<?php echo $row['gambar'];?>"
                class="card-img-top product-image"
                alt=""
              />
              <div class="card-body p-2">
                <h5 class="card-title product-title">
                <?php echo $row['judul_produk'];?>
                </h5>
                <p class="product-price mb-0">Rp<?php echo $row['harga'];?></p>
                <div
                  class="d-flex justify-content-between align-items-center mt-4">
                  <p id="hidden-description" class="d-none">
                  <?php echo $row['deskripsi_produk'];?>
                  </p>
                  <span class="product-rating">★ 0</span>
                  <span class="product-sold">Terjual 0</span>
                </div>
                <p class="product-location mb-0"><?php echo $row['lokasi'];?></p>
              </div>
        </div>
        <?php

          }
     ?>

</html>
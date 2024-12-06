<?php 
$sql = 'SELECT * FROM produk_2';
$all_product = pg_query($connection, $sql);
?>
<div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="okee mb-0">The Aborigin</h5>
          <a href="..\crud_2\login.php" class="text-primary text-decoration-none"
            >Tambah barang</a>
        </div>
<div class="products-scroll-container">
    <button class="scroll-button scroll-left hidden" id="scrollLeft1">
        <i class="fas fa-chevron-left"></i>
    </button>
    <button class="scroll-button scroll-right" id="scrollRight1">
        <i class="fas fa-chevron-right"></i>
    </button>
    <div class="products-container g-4" id="container1">
        <?php while ($product = pg_fetch_assoc($all_product)) { ?>
            <div class="card product-card">
                <img
                    src="<?php echo $product['gambar'];?>"
                    class="card-img-top product-image"
                    alt=""
                />
                <div class="card-body p-2">
                    <h5 class="card-title product-title">
                        <?php echo $product['judul_produk'];?>
                    </h5>
                    <p class="product-price mb-0"><?php echo number_format($product['harga'], 0, ',', '.'); ?></p>
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <p id="hidden-description" class="d-none">
                            <?php echo $product['deskripsi_produk'];?>
                        </p>
                        <span class="product-rating">★ 0</span>
                        <span class="product-sold">Terjual 0</span>
                    </div>
                    <p class="product-location mb-0"><?php echo $product['lokasi']; ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
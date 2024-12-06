<?php
ob_start(); 
include('header.php');?>
<?php include('dbcon.php');?> 

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "SELECT * FROM public.produk_2 where id = '{$id}' "; // menghubungkan database

    $result = pg_query($connection, $query); //execute

    if(!$result){
        die("query failed".pg_last_error());
    }
    else{
      
        $row = pg_fetch_assoc($result);

    }
}
?>

<?php 
    if(isset($_POST['update_products'])){

        if(isset($_GET['id_new'])){
            $idnew = $_GET['id_new'];
        }

        $name = $_POST['judul_produk'];
        $description = $_POST['deskripsi_produk'];
        $price = $_POST['harga'];
        $image = $_POST['gambar'];

        $query = "UPDATE public.produk_2 SET judul_produk = '{$name}', deskripsi_produk = '{$description}', harga = '{$price}', gambar = '{$image}'  WHERE id = '{$idnew}'";

        $result = pg_query($connection, $query); //execute

        if(!$result){
            die("query failed".pg_last_error());
        }

        else{
            header("location:index.php?update_msg=You have successfully updated the data.");
            exit();
        }
    }
?>

<!-- Form untuk Update Produk -->
<form action="update_page_1.php?id_new=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="judul_produk">Name</label>
        <input type="text" name="judul_produk" class="form-control" value="<?php echo $row['judul_produk']; ?>">
    </div>
    <div class="form-group">
        <label for="deskripsi_produk">Description</label>
        <input type="text" name="deskripsi_produk" class="form-control" value="<?php echo $row['deskripsi_produk']; ?>">
    </div>
    <div class="form-group">
        <label for="harga">Price</label>
        <input type="text" name="harga" class="form-control" value="<?php echo $row['harga']; ?>">
    </div>
    <div class="form-group">
        <label for="gambar">Link Image</label>
        <input type="text" name="gambar" class="form-control" value="<?php echo $row['gambar']; ?>">
    </div>
    <input type="submit" class="btn btn-success" name="update_products" value="UPDATE">
</form>

<?php include('footer.php');?>

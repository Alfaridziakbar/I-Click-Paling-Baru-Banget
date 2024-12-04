<?php include('header.php');?>
<?php include('dbcon.php');?> 

<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "SELECT * FROM public.products where product_id = '{$id}' "; // menghubungkan database

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

        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image = $_POST['image'];

        $query = "UPDATE public.products SET name = '{$name}', description = '{$description}', price = '{$price}', image_url = '{$image}'  WHERE product_id = '{$idnew}'";

        $result = pg_query($connection, $query); //execute

        if(!$result){
            die("query failed".pg_last_error());
        }

        else{
            header("location:index.php?update_msg=You have successfully updated the data.");
        }
    }
?>

<!-- Form untuk Update Produk -->
<form action="update_page_1.php?id_new=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" name="description" class="form-control" value="<?php echo $row['description']; ?>">
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" name="price" class="form-control" value="<?php echo $row['price']; ?>">
    </div>
    <div class="form-group">
        <label for="image">Link Image</label>
        <input type="text" name="image" class="form-control" value="<?php echo $row['image_url']; ?>">
    </div>
    <input type="submit" class="btn btn-success" name="update_products" value="UPDATE">
</form>

<?php include('footer.php');?>

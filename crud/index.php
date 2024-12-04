<?php include('header.php');?>
<?php include('dbcon.php');?>

<div class="box1">
<h2 id="main-title">Products</h2>
<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD PRODUCT</button>
</div>

    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>description</th>
                <th>price</th>
                <th>stock</th>
                <th>category_id</th>
                <th>image_url</th>
                <th>update</th>
                <th>delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            
    $query = "SELECT * FROM public.products"; // menghubungkan database

    $result = pg_query($connection, $query); //execute

    if(!$result){
        die("query failed".pg_last_error());
    }
    else{
        
        while($row = pg_fetch_assoc($result)){ //untuk menampilkan column di web
            ?>
             <tr>
                <td><?php echo $row['product_id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['stock']; ?></td>
                <td><?php echo $row['category_id']; ?></td>
                <td><?php echo $row['image_url']; ?></td>
                <td><a href="update_page_1.php?id=<?php echo $row['product_id']; ?>" class="btn btn-success">Update</a></td>
                <td><a href="delete_page.php?id=<?php echo $row['product_id']; ?>" class="btn btn-danger">Delete</a></td>
            </tr>
            <?php
        } 

    }

            ?>
           
                <!-- <td>2</td>
                <td>Akbar</td>
                <td>Burnok</td>
                <td>19</td> -->
        </tbody>
    </table>

    <?php
    if(isset($_GET['message'])){
      echo "<h6>".$_GET['message']."</h6>";
    }
    ?>

<?php
    if(isset($_GET['insert_msg'])){
      echo "<h6>".$_GET['insert_msg']."</h6>";
    }
    ?>
    
<?php
    if(isset($_GET['update_msg'])){
      echo "<h6>".$_GET['update_msg']."</h6>";
    }
    ?>
<?php
    if(isset($_GET['delete_msg'])){
      echo "<h6>".$_GET['delete_msg']."</h6>";
    }
    ?>
    <!-- Modal -->
<form action="insert_data.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form action="">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" class="form-control">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" class="form-control">
        </div>
        <div class="form-group">
            <label for="image">Link Image</label>
            <input type="text" name="image" class="form-control">
        </div>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_products" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>
<?php include('footer.php');?>
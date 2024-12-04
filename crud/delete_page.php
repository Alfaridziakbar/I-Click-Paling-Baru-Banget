<?php include('dbcon.php'); ?>

<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$query = "DELETE from public.products where product_id = '$id'";

$result = pg_query($connection, $query);

if(!$result){
    die("Query Failed".pg_last_error());
}
else{
    header('location:index.php?delete_msg=You have deleted the data');
}


?>
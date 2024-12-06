<?php include('dbcon.php'); ?>

<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$query = "DELETE from public.produk_2 where id = '$id'";

$result = pg_query($connection, $query);

if(!$result){
    die("Query Failed".pg_last_error());
}
else{
    header('location:index.php?delete_msg=You have deleted the data');
}


?>
<?php
session_start();
include ('includes/conn.php');

if(isset($_POST['saveProduct'])){

    $productName = $_POST['ProductName'];
    $productQty = $_POST['ProductQty'];
    $productPrice = $_POST['ProductPrice'];

    //sql command
    $sql = 'INSERT INTO product (product_name, product_qty, product_price) VALUES (:ProductName, :ProductQty, :ProductPrice)';
    $sql_run = $conn->prepare($sql);

    $data = [
        ":ProductName" => $productName,
        ":ProductQty" => $productQty,
        ":ProductPrice" => $productPrice,
    ];

   $sql_execute = $sql_run->execute($data);

   if($sql_execute){
    $_SESSION['alert'] = "Sucessfully Product Added";
    header('location:index.php');
    exit();
   } else{
    $_SESSION['alert'] = "Failed";
    header('location:index.php');
    exit();
   }
}

?>
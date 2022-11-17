<?php
session_start();
include ('includes/conn.php');

if(isset($_POST['saveProduct'])){

    // $cust_id = $_POST['cust_id'];
    
    $productName = $_POST['ProductName'];
    // $productImage = $_POST['ProductImage'];
    $productQty = $_POST['ProductQty'];
    $productPrice = $_POST['ProductPrice'];



    //sql command
    $sql = 'INSERT INTO product (product_name, product_qty, product_price) VALUES (:ProductName, :ProductQty, :ProductPrice)';
    $sql_stmt = $conn->prepare($sql);

    $data = [
        ":ProductName" => $productName,
        // ":ProductImage" => $productImage,
        ":ProductQty" => $productQty,
        ":ProductPrice" => $productPrice,
    ];

   $sql_execute = $sql_stmt->execute($data);

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
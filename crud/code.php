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

if (isset($_POST['editProduct'])) {
    
    $product_id = $_POST['product_id'];
    $productName = $_POST['ProductName'];
    // $productImage = $_POST['ProductImage'];
    $productQty = $_POST['ProductQty'];
    $productPrice = $_POST['ProductPrice'];


    try{
        
        $sql = 'UPDATE product 
                SET product_id=:product_id, 
                product_name=:ProductName, 
                product_qty=:ProductQty, 
                product_price =:ProductPrice
                
                WHERE product_id =:product_id
                LIMIT 1';
        $stmt = $conn->prepare($sql);
        $items = [
            ":product_id" => $product_id,
            ":ProductName" => $productName,
            ":ProductQty" => $productQty,
            ":ProductPrice" => $productPrice
        ];

        $result = $stmt->execute($items);
    

        if($result){
            $_SESSION['alert'] = "Sucessfully";
            header('location:index.php');
            exit();
           } else{
            $_SESSION['alert'] = "Failed Edit Product";
            header('location:index.php');
            exit();
           }


    } catch (PDOException $e) {
        echo "Error" . $e->getMessage();
    }
}











?>
<?php
session_start();
include ('includes/conn.php');

if(isset($_POST['search'])) {
    $keyword = $_POST['keyword'];

    $sql = 'SELECT * FROM product WHERE product_id LIKE "$keyword" 
    OR LIKE product_name = "$keyword" 
    OR LIKE product_qty= "$keyword"
    OR LIKE product_qprice= "$keyword"
    OR LIKE product_id= "$keyword"';

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    
}




if(isset($_POST['deleteProduct'])){
    $product_id = $_POST['deleteProduct'];

    try{

        //create sql 
        $sql = 'DELETE FROM product WHERE product_id = :id';
        //prepare
        $stmt = $conn->prepare($sql);
        
        $item = [
            ':id' => $product_id];
        $result = $stmt->execute($item);

        if ($result) {
            $_SESSION['alert'] = "Sucessfully Product Deleted";
            header('location:index.php');
            exit();
        } else {
            $_SESSION['alert'] = "Failed Product Deleted";
            header('location:index.php');
            exit();
        }



    } catch (PDOException $e) {
        echo "Error" . $e->getMessage();
    }
}


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
            $_SESSION['alert'] = "Sucessfully Updated Product";
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
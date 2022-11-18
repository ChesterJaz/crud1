<?php
session_start();
include ('includes/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- css icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <!-- style css -->
    <title>PIZZA</title>
</head>
<body>

    <div class="container ">
        <div class="row">
            <div class="col-md-12 mt-5" >

                <?php if(isset($_SESSION['alert'])): ?>
                      <h3 class="alert alert-success"><?= $_SESSION['alert']; ?> </h3>
                <?php 
                
                    unset($_SESSION['alert']);
                    endif; 
                
                ?>      
                
                <div class="card shadow p-3 mb-5 bg-white rounded ">
                    <div class="card-header">
                        
                        <h2 class="text-center">Pizza Shop
                            <a href="add-product.php" class="btn btn-primary float-end">Add Product</a>
                        </h2>
                    </div>

                    <div class="card-body">
                        <form action="add-product.php" method="POST">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product ID</th>
                                        <th>Product Name</th>
                                        <!-- <th>Product Image</th> -->
                                        <th>Product Quantity</th>
                                        <th>Product Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    //create query
                                    $query = "SELECT * FROM product";
                                    //prepare the query
                                    $query_stmt = $conn->prepare($query);
                                    //execute the query
                                    $query_stmt->execute();
                                    //fetch all the data from the fb
                                    $result = $query_stmt->fetchAll(PDO::FETCH_ASSOC);
                                    // check the if the result did run
                                    if ($result){
                                        
                                        //loop all items
                                       foreach ($result as $row) {
                                        ?>
                                            <tr>
                                                <td><?=$row['product_id'];?></td>
                                                <td><?=$row['product_name'];?></td>
                                                <!-- <td><//?= $row['product_img'];?></td> -->
                                                <td><?=$row['product_qty'];?></td>
                                                <td><?=$row['product_price'];?></td>
                                                <td>
                                                    <a href="product-edit.php?id=<?=$row['product_id'];?>" class="btn btn-primary"><i class="bi bi-pencil-square me-2"></i>Edit</a>
                                                    
                                                </td>
                                            </tr>
                                        <?php
                                       }

                                    } else {
                                        ?>
                                            <tr>
                                                <td colspan="5">No record found</td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                                    
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
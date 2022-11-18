<?php
session_start();
include ('includes/conn.php');
?>


<?php include ('header.php');?>
<div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-header">
                        
                        <h3>View Product
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h3>
                    </div>
                    
                    <div class="card-body">

                    <?php 
                                    //create query
                                    $query = "SELECT * FROM product";
                                    //prepare the query
                                    $query_stmt = $conn->prepare($query);
                                    //execute the query
                                    $query_stmt->execute();
                                    //fetch all the data from the fb
                                    $result = $query_stmt->fetch(PDO::FETCH_ASSOC);
                                    // check the if the result did run

                            ?>
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            
                            <div class="form-floating mb-3">
                                <input type="text" name = "ProductName" value = "<?=$result['product_name'];?>" class="form-control disabled" placeholder="@" disabled>
                                <label for="">Product Name</label>
                            </div>

                            <!-- <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupFile01">Product Image</label>
                                <input type="file" class="form-control" name = "ProductImage" id="inputGroupFile01">
                            </div> -->


                            <div class="form-floating mb-3">
                                <input type="number" name = "ProductQty" value = "<?=$result['product_qty'];?>" class="form-control disabled" placeholder="@" disabled>
                                <label for="">Product Quantity</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" name = "ProductPrice" value = "<?=$result['product_price'];?>" class="form-control disabled" placeholder="@" disabled>
                                <label for="">Product Price</label>
                            </div>

                            
                            
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
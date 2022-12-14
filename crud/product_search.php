<?php

include ('includes/conn.php');

?>


<?php include ('header.php');?>

<div class="container ">
        <div class="row">
            <div class="col-md-12 mt-5" >

                <?php if(isset($_SESSION['alert'])): ?>
                      <h5 class="alert alert-success"><?= $_SESSION['alert']; ?> </h5>
                <?php 
                
                    unset($_SESSION['alert']);
                    endif; 
                
                ?>      
                
                <div class="card shadow p-3 mb-5 bg-white rounded ">
                    <div class="card-header">
                        
                        <h2 class="text-center">Pizza Shop <i class="bi bi-shop"></i></h2>
                        <div>
                            <a href="add-product.php" class="btn btn-primary float-end"><i class="bi bi-plus-square me-2"></i>Add Product</a>
                            <a href="index.php" class="btn btn-danger">Back</a>
                        </div>
                    </div>
                    <div class="container-fluid mt-2">

                        <form action="" method="GET" class="d-flex" role="search">
                            <input class="form-control me-2" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>" type="search" placeholder="Search products..">
                            <button class="btn btn-outline-success btn" type="submit">Search</button>
                        </form>

                       
                      
                     </div>
                    <div class="card-body">
                        
                            <table class="table table-striped table-bordered table-hover">
                                <thead >
                                    <tr>
                                        <th>Product ID</th>
                                        <th>Product Name</th>
                                        <!-- <th>Product Image</th> -->
                                        <th>Product Quantity</th>
                                        <th>Product Price</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                <?php 
                                
                                if(isset($_GET['search'])) {
                                    
                                    $keyword = $_GET['search'];
                                
                                    $sql = "SELECT * FROM product WHERE CONCAT 
                                    (product_name, product_qty, product_price) 
                                    LIKE '%$keyword%'";
                                   
                                    
                                
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();
                                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    if ($result){
                                    foreach ($result as $row){
                                        ?>
                                        <tr>
                                                <td><?=$row['product_id'];?></td>
                                                <td><?=$row['product_name'];?></td>
                                                <!-- <td><//?= $row['product_img'];?></td> -->
                                                <td><?=$row['product_qty'];?></td>
                                                <td><?=$row['product_price'];?></td>
                                                <td>
                                                    <a href="product-edit.php?id=<?=$row['product_id'];?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square me-2"></i>Edit</a>
                                                    <a href="product-view.php?id=<?=$row['product_id'];?>" name = "viewProduct" class="btn btn-info btn-sm"><i class="bi bi-eye me-2"></i></i>View</a>
                                                    
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button class="btn btn-danger btn-sm" value="<?=$row['product_id'];?>" name = "deleteProduct"><i class="bi bi-trash me-2"></i>Delete</button>
                                                        <!-- <a href="code.php?id=<?//=$row['product_id'];?>" name = "deleteProduct" class="btn btn-danger btn-sm d-inline"><i class="bi bi-trash me-2"></i></i></i>Delete</a> -->
                                                    </form>
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
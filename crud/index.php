<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!-- style css -->
    <title>PIZZA CRUD</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md mt-5">

                <?php if(isset($_SESSION['alert'])): ?>
                      <h3 class="alert alert-success"><?= $_SESSION['alert']; ?> </h3>
                <?php 
                
                    unset($_SESSION['alert']);
                    endif; 
                
                ?>      
                
                <div class="card">
                    <div class="card-header">
                        
                        <h2 class="text-center">Pizza Store
                            <a href="add-product.php" class="btn btn-primary float-end">Add Product</a>
                        </h2>
                    </div>

                    <div class="card-body">
                        <form action="add-product.php" method="POST">
                            <table class="table-bordered tabled-striped">
                                <thead>
                                    <tr>
                                        <th>Product ID</th>
                                        <th>Product Name</th>
                                        <th>Product Quantity</th>
                                        <th>Product Price</th>
                                    </tr>
                                </thead>
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
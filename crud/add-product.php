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
            <div class="col-md-5 mt-5">
                <div class="card">
                    <div class="card-header">
                        
                        <h3>Product Details
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h3>
                    </div>
                    
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            
                            <div class="form-floating mb-3">
                                <input type="text" name = "ProductName" class="form-control" placeholder="@">
                                <label for="">Product Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" name = "ProductQty" class="form-control" placeholder="@">
                                <label for="">Product Quantity</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" name = "ProductPrice" class="form-control" placeholder="@">
                                <label for="">Product Price</label>
                            </div>

                            <div class="float-end">
                                <button class="btn btn-primary" name="saveProduct">Save Product</button>
                            </div>
                            
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
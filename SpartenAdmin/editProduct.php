<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="CSS/style.css">
    <style>
        .icon-yellow {
            color: rgb(228, 211, 59);
        }
    </style>
    <title>Sparten | Admin Home</title>
</head>

<body>


    <?php
    require 'dbConnection.php';
    if (isset($_POST['btn_edit'])) {
        $_SESSION["productId"] = $_POST['edit_productId'];
    }
    if (isset($_POST['edit'])) {
        $productId = $_SESSION['productId'];
        $productName = $_POST['productName'];
        $productBrand = $_POST['productBrand'];
        $productCurrentPrice = $_POST['productCurrentPrice'];
        $productLastPrice = $_POST['productLastPrice'];
        $productImage = addslashes(file_get_contents($_FILES['productImage']['tmp_name']));
        $productRating = $_POST['productRating'];
        $updateQuery = "UPDATE `products` SET `productId`='$productId',`productName`='$productName',`productBrand`='$productBrand',`productCurrentPrice`='$productCurrentPrice',`productLastPrice`='$productLastPrice',`productImage`='$productImage',`productRating`='$productRating' WHERE productId=$productId";
        $queryRun = mysqli_query($connection, $updateQuery);
        if ($queryRun) {
            echo '<script type="text/javascript">alert("Product Edited successfully.");location.replace("products.php");</script>';
        } else {
            echo '<script type="text/javascript">alert("Product Editing Failed.");location.replace("products.php");</script>';
        }
    }
    ?>

    <div class="container mt-4 ">
        <div class="row justify-content-md-center">
            <div class="col-3">
            </div>
            <div class="col-12 col-md-6 col-sm-12">
                <div class="card">
                    <img src="images/logo.png" class="card-img-top" alt="..." width="614px" height="170px">
                    <div class="card-body">
                        <div class="row">
                            <h2 class="text-center mb-4">Edit Product</h2>
                            <div class="col-md">
                                <form action="editProduct.php" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="productName" class="form-label">Product Name</label>
                                        <input class="form-control" type="text" id="productName" name="productName">
                                    </div>
                                    <div class="mb-3">
                                        <label for="productBrand" class="form-label">Product Brand</label>
                                        <input class="form-control" type="text" id="productBrand" name="productBrand">
                                    </div>
                                    <div class="mb-3">
                                        <label for="productCurrentPrice" class="form-label">Product Current Price</label>
                                        <input class="form-control" type="text" id="productCurrentPrice" name="productCurrentPrice">
                                    </div>
                                    <div class="mb-3">
                                        <label for="productLastPrice" class="form-label">Product Last Price</label>
                                        <input class="form-control" type="text" id="productLastPrice" name="productLastPrice">
                                    </div>
                                    <div class="mb-3">
                                        <label for="productRating" class="form-label">Product Rating</label>
                                        <input class="form-control" type="text" id="productRating" name="productRating">
                                    </div>
                                    <div class="mb-3">
                                        <label for="productImage" class="form-label">Product Image</label>
                                        <input class="form-control" type="file" id="productImage" name="productImage">
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="edit">Edit</button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>

        </div>

    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
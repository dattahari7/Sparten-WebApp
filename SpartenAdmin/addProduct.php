<?php
require 'dbConnection.php';
if (isset($_POST['add'])) {
    $productName = $_POST['productName'];
    $productBrand = $_POST['productBrand'];
    $productCurrentPrice = $_POST['productCurrentPrice'];
    $productLastPrice = $_POST['productLastPrice'];
    $productImage = addslashes(file_get_contents($_FILES['productImage']['tmp_name']));
    $productRating = $_POST['productRating'];
    $insertQuery = "insert into products (productName, productBrand, productCurrentPrice, productLastPrice, productImage, productRating) VALUES ('$productName', '$productBrand', '$productCurrentPrice', '$productLastPrice', '$productImage','$productRating')";
    $queryRun = mysqli_query($connection, $insertQuery);
    if ($queryRun) {
        echo '<script type="text/javascript">alert("Product added successfully.");</script>';
    } else {
        echo '<script type="text/javascript">alert("Product Adding Failed.");</script>';
    }
}
?>

<!-- add product form in modal -->
<div class="modal fade" id="staticBackdropAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
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
                        <button type="submit" class="btn btn-primary" name="add">Add</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
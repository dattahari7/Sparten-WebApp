<?php
session_start();
if (!isset($_SESSION['userEmail'])) {
?>
    <script type="text/javascript">
        var alert = confirm("You need to login, To access your Cart..");
        if (alert == true) {
            location.replace('login.php');
        } else {
            location.replace('index.php');
        }
    </script>

<?php
}
?>
<?php $activePage = "cart"; ?>
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
    <title>Sparten | Cart</title>
</head>

<body>
<?php
require 'dbConnection.php';
if (isset($_POST['btn_addToCart'])) {
    $cartProductId=0;
    $productId = $_POST['productId'];
    $userId = $_POST['userId'];
    $productQuantity = $_POST['productQuantity'];
    $selectQuery = mysqli_query($connection, "SELECT * FROM cart WHERE userId ='$userId' and productId ='$productId'");
    if ($select=mysqli_num_rows($selectQuery) > 0) {
        $select = mysqli_fetch_assoc($selectQuery);
        $productQuantity +=$select['productQuantity'];
        $updateQuery = "UPDATE `cart` SET `productQuantity`='$productQuantity' WHERE userId ='$userId' and productId ='$productId'";
        $queryRun = mysqli_query($connection, $updateQuery);
        if ($queryRun) {
            echo '<script type="text/javascript">
            alert("Product alredy there but product quantity is added to cart successfully.");
            location.replace("shop.php");</script>';
        }
        else {
            echo '<script type="text/javascript">
            alert("Product Quantity adding Failed.");
            location.replace("shop.php");</script>';
        }
    }
    else {
        $insertQuery = "INSERT INTO cart(userId,productId,productQuantity) VALUES('$userId','$productId','$productQuantity')";
        $queryRun = mysqli_query($connection, $insertQuery);
        if ($queryRun) {
            echo '<script type="text/javascript">
            alert("Product added to cart successfully.");
            location.replace("shop.php");</script>';
        }
        else {
            echo '<script type="text/javascript">
            alert("Product addition Failed.");
            location.replace("shop.php");</script>';
        }
        
    }
    
}

?>
    <!-- navbar file -->
    <?php
    require 'header.php';
    ?>
    <!-- header section -->
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10 mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            Cart
                        </h1>
                        <div class="page-header-subtitle">Cart product, view Cart product, cart checkout and overview</div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <div class="text-center mt-2">
                            <p>
                            <form action="removeProductFromCart.php" method="post">
                                <button type="submit" class="btn btn-outline-danger btn-lg px-4" name="btn_deleteAll"><i class="bi bi-trash-fill"></i> Remove All</button>
                            </form>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--cart product show on cart page -->
    <div class="album py-5 bg-light">
        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col" class="text-center">Products</th>
                    <th scope="col" class="text-center">Name Of Products</th>
                    <th scope="col" class="text-center">Price</th>
                    <th scope="col" class="text-center">Quantity</th>
                    <th scope="col" class="text-center">Total</th>
                    <th scope="col" class="text-center">Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require 'dbConnection.php';
                    $userId =$_SESSION['userId'];
                    $sql_select = mysqli_query($connection, "SELECT * FROM products, cart WHERE cart.productId=products.productId and cart.userId='$userId'");
                    if (mysqli_num_rows($sql_select) > 0) {
                        echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';
                        while ($cartProduct = mysqli_fetch_assoc($sql_select)) {
                            $cartProductId = $cartProduct['cartProductId'];
                            $totalPrice = $cartProduct['productQuantity']*$cartProduct['productCurrentPrice'];
                            echo '<tr>
                            <td class="text-center"><img class="rounded mx-auto d-block" alt="..." src="data:image/jpeg;base64,' . base64_encode($cartProduct['productImage']) .'" width="80" height="50"/></td>
                            <td class="text-center">'.$cartProduct['productName'].'</td>
                            <td class="text-center">Rs&nbsp;'.$cartProduct['productCurrentPrice'].'</td>
                            <td class="text-center">'.$cartProduct['productQuantity'].'</td>
                            <td class="text-center">Rs&nbsp;'.$totalPrice.'</td>
                            <td class="text-center">
                            <form action="removeProductFromCart.php" method="post">
                            <input type="hidden" name="cartProductId" value="' . $cartProductId . '">
                            <button type="submit" class="btn btn-outline-danger btn-sm" name="btn_remove"><i class="bi bi-trash-fill"></i></button>
                            </form></td>
                            </tr>';
                        }
                    }
                    else {
                        echo '<tr><td colspan="6"><div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                        <h4>No products in cart</h4><p class="text-center">add some products.</p>
                        <p><a class="btn btn-outline-success btn-sm" href="shop.php" role="button">Add Product</a></p>
                        </div></td></tr>';
                    }
                    ?>
                </tbody>
            </table>
            <div>
                <?php
                echo'<div class="d-flex justify-content-between align-items-center">
                <a class="btn btn-outline-primary btn-lg text-start" href="shop.php" role="button">Add some more</a>
                <a class="btn btn-outline-success btn-lg text-end" href="checkout.php" role="button">Checkout</a>
                </div>';
                ?>
            </div>
        </div>
    </div>

        <!-- footer section -->
        <?php require 'footer.php' ?>


        <!-- Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
<?php
session_start();
if (!isset($_SESSION['userEmail'])) {
?>
    <script type="text/javascript">
        var alert = confirm("You need to login, To access your wishlist..");
        if (alert == true) {
            location.replace('login.php');
        } else {
            location.replace('index.php');
        }
    </script>

<?php
}
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
    <title>Sparten | Wishlist</title>
</head>

<body>
<?php
require 'dbConnection.php';
if (isset($_POST['btn_wishlist'])) {
    $productId = $_POST['productId'];
    $userId = $_POST['userId'];
    if (mysqli_num_rows(mysqli_query($connection, "SELECT * FROM wishlist WHERE userId ='$userId' and productId ='$productId'")) > 0) {
        echo '<script type="text/javascript">
        alert("Product alredy added! add different product.");
        location.replace("shop.php");
        </script>';
    }
    else {
        $addedOn = date('y-m-d h:i:s');
        $insertQuery = "INSERT INTO wishlist(userId,productId,addedOn) VALUES('$userId','$productId','$addedOn')";
        $queryRun = mysqli_query($connection, $insertQuery);
        if ($queryRun) {
            echo '<script type="text/javascript">
            alert("Product added to wishlist successfully.");
            location.replace("shop.php");</script>';
        }
        else {
            echo '<script type="text/javascript">
            alert("Product deletion Failed.");
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
                            Wishlist
                        </h1>
                        <div class="page-header-subtitle">Wishlist product, view wishlist product, and overview</div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <div class="text-center mt-2">
                            <p>
                            <form action="removeProductFromWishlist.php" method="post">
                                <button type="submit" class="btn btn-outline-danger btn-lg px-4" name="btn_deleteAll"><i class="bi bi-trash-fill"></i> Remove All</button>
                            </form>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--wishlist product show on wishlist page -->
    <div class="album py-5 bg-light">
        <div class="container">
            <?php
            require 'dbConnection.php';
            $userId =$_SESSION['userId'];
            $sql_select = mysqli_query($connection, "SELECT * FROM products, wishlist WHERE wishlist.productId=products.productId and wishlist.userId='$userId'");
            if (mysqli_num_rows($sql_select) > 0) {
                echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';
                while ($wishlistProduct = mysqli_fetch_assoc($sql_select)) {
                    $wishlistProductId = $wishlistProduct['wishlistProductId'];
                    echo "<div class='col'>
                    <div class='card shadow-sm'>
                    <img class='card-img-top' alt='...' width='100%' height='225' src='data:image/jpeg;base64," . base64_encode($wishlistProduct['productImage']) . "'/>";
                    echo "<div class='card-body'>                                                    <i class='bi bi-star-fill icon-yellow'></i><i class='bi bi-star-fill icon-yellow'></i><i
                    class='bi bi-star-fill icon-yellow'></i></i><i class='bi bi-star-half icon-yellow'></i><i
                    class='bi bi-star icon-yellow'></i>
                    <h6 class='card-title text-muted'>" . $wishlistProduct['productBrand'];
                    echo "</h6><p class='card-text'>" . $wishlistProduct['productName'];
                    echo "</p><h6 class='card-text'>Rs&nbsp;" . $wishlistProduct['productCurrentPrice'];
                    echo " &nbsp;<del><small class='text-muted icon-yellow'>Rs" . $wishlistProduct['productLastPrice'];
                    $discountPercent = (($wishlistProduct['productLastPrice'] - $wishlistProduct['productCurrentPrice']) * 100) / $wishlistProduct['productLastPrice'];
                    echo '</small></del>&nbsp;<small class="text-success">' . number_format($discountPercent, 2) . '% off</small></h6>
                    <div class="d-flex align-items-center">
                    <form action="cart.php" method="post" class="me-2">
                    <input type="number" name="productQuantity" value="1"min="1" max="100">
                    <input type="hidden" name="productId" value="' . $wishlistProductId . '">
                    <input type="hidden" name="userId" value="' . $userId . '">
                    <button type="submit" class="btn btn-outline-success btn-sm" name="btn_addToCart"><i class="bi bi-cart-fill"></i>Add To Cart</button>
                    </form>
                    <form action="removeProductFromWishlist.php" method="post">
                    <input type="hidden" name="wishlistProductId" value="' . $wishlistProductId . '">
                    <button type="submit" class="btn btn-outline-danger btn-sm" name="btn_remove"><i class="bi bi-trash-fill"></i> Remove</button>
                    </form>
                    </div>
                    </div>
                    </div>
                    </div>';
                }
            } else {
                echo '<div class="row row-cols-1 alert alert-warning alert-dismissible fade show text-center" role="alert">
                <h4>No products in wishlist</h4><p class="text-center">add some products.</p></div>';
            }
            ?>
        </div>
        <div class="text-center mt-2">
            <p><a class="btn btn-outline-secondary btn-lg mt-4 px-4" href="shop.php" role="button">Add some more</a></p>
        </div>
    </div>
    </div>

        <!-- footer section -->
        <?php require 'footer.php' ?>


        <!-- Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
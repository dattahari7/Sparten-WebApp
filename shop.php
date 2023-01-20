<?php
session_start();
if (!isset($_SESSION['userEmail'])) {
?>
    <script type="text/javascript">
        var alert = confirm("You need to login, To access shop..");
        if (alert == true) {
            location.replace('login.php');
        } else {
            location.replace('index.php');
        }
    </script>

<?php
}
?>

<?php $activePage = "shop"; ?>
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
    <title>Sparten | Shopping</title>
    <style>
        .icon-yellow {
            color: rgb(228, 211, 59);
        }
    </style>
</head>

<body>
    <!-- navbar section -->
    <?php require 'header.php' ?>
    <!-- slider section -->
    <section id="slider">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/slide1.jpg" class="d-block w-100" alt="..." width="1600" height="400">
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Product Comming Soon</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, molestiae.</p>
                            <!-- <p><a class="btn btn-lg btn-dark" href="#">Read More</a></p> -->
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/slide2.jpg" class="d-block w-100" alt="..." width="1600" height="400">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Sale Is On Shop Now</h1>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi, explicabo.</p>
                            <!-- <p><a class="btn btn-lg btn-dark" href="#">Read More</a></p> -->
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- main section -->
    <main>
        <div class="album py-5 bg-light">
            <div class="container">
                <h1 class="display-5 fw-bold lh-1 mb-3 text-center">Available Products</h1>

                <?php
                require 'dbConnection.php';

                $sql_select = mysqli_query($connection, "select * from products");
                if (mysqli_num_rows($sql_select) > 0) {
                    echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';
                    while ($product = mysqli_fetch_assoc($sql_select)) {
                        $productId = $product['productId'];
                        $userId = $_SESSION['userId'];
                        echo "<div class='col'>
                        <div class='card shadow-sm'>
                        <img class='card-img-top' alt='...' width='100%' height='225' src='data:image/jpeg;base64," . base64_encode($product['productImage']) . "'/>";
                        echo "<div class='card-body'><i class='bi bi-star-fill icon-yellow'></i><i class='bi bi-star-fill icon-yellow'></i><i
                        class='bi bi-star-fill icon-yellow'></i></i><i class='bi bi-star-half icon-yellow'></i><i
                        class='bi bi-star icon-yellow'></i>
                        <h6 class='card-title text-muted'>" . $product['productBrand'];
                        echo "</h6><p class='card-text'>" . $product['productName'];
                        echo "</p><h6 class='card-text'>Rs&nbsp;" . $product['productCurrentPrice'];
                        echo " &nbsp;<del><small class='text-muted icon-yellow'>Rs" . $product['productLastPrice'];
                        $discountPercent = (($product['productLastPrice'] - $product['productCurrentPrice']) * 100) / $product['productLastPrice'];
                        echo '</small></del>&nbsp;<small class="text-success">"' . number_format($discountPercent, 2) . '% off</small></h6>
                        <div class="d-flex align-items-center">
                        <form action="cart.php" method="post" class="me-2">
                        <input type="number" name="productQuantity" value="1"min="1" max="100">
                        <input type="hidden" name="productId" value="' . $productId . '">
                        <input type="hidden" name="userId" value="' . $userId . '">
                        
                        <button type="submit" class="btn btn-outline-success btn-sm" name="btn_addToCart"><i class="bi bi-cart-fill"></i>Add To Cart</button>
                        </form>
                        <form action="wishlist.php" method="post">
                        <input type="hidden" name="productId" value="' . $productId . '">
                        <input type="hidden" name="userId" value="' . $userId . '">
                        <button type="submit" class="btn btn-outline-danger btn-sm" name="btn_wishlist"><i class="bi bi-heart"></i></button>
                        </form>
                        </div>
                        </div>
                        </div>
                        </div>';
                    }
                } else {
                    echo '<div class="row row-cols-1 alert alert-warning alert-dismissible fade show text-center" role="alert">
                    <h4>Products Not Available</h4><p class="text-center">You should check later.</p></div>';
                }
                ?>
            </div>
        </div>
        </div>

    </main>

    <!-- footer section -->
    <?php require 'footer.php' ?>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
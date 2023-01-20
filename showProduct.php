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
    <title>Sparten | Home</title>
    <style>
        .icon-yellow {
            color: rgb(228, 211, 59);
        }
    </style>
</head>

<body>

    <!-- navigation bar -->
    <section id="navbar">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img class="rounded" src="images/logo.png" alt="" width="120" height="34">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link " href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="shop.php">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contactUs.html">Contact Us</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li id="serch-center" class="nav-item">
                            <form class="d-flex ">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button type="submit" class="btn btn-primary"><span class="bi-search"></span></button>
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle dropdown-toggle-split " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person" style="font-size:22px;"></i>Account
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="login.html">Login</a></li>
                                <li><a class="dropdown-item" href="#">Resister</a></li>
                                <li><a class="dropdown-item" href="#">Wish List</a></li>
                                <li><a class="dropdown-item" href="#">Forget Password</a></li>
                                <li><a class="dropdown-item" href="#">Address Book</a></li>
                                <li><a class="dropdown-item" href="#">Order History</a></li>
                                <li><a class="dropdown-item" href="#">Payment Details</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="cart.html"><i class="bi bi-cart" style="font-size:22px;"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>

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
                            <p><a class="btn btn-lg btn-dark" href="#">Read More</a></p>
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

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php
                    $connection = mysqli_connect("localhost", "root", "", "sparten");
                    if (!$connection) {
                        die("connection failed");
                    }
                    $sql_select = mysqli_query($connection, "select * from shop");
                    if (mysqli_num_rows($sql_select) > 0) {
                        while ($product = mysqli_fetch_assoc($sql_select)) {
                            echo "<div class='col'>
                                    <div class='card shadow-sm'>
                                        <img class='card-img-top' alt='...' width='100%' height='225' src='data:image/jpeg;base64," . base64_encode($product['productImage']) . "'/>";
                            echo "<div class='card-body'>
                                            <i class='bi bi-star-fill icon-yellow'></i><i class='bi bi-star-fill icon-yellow'></i><i
                                                class='bi bi-star-fill icon-yellow'></i></i><i class='bi bi-star-half icon-yellow'></i><i
                                                class='bi bi-star icon-yellow'></i>
                                            <h6 class='card-title text-muted'>" . $product['productBrand'];
                            echo "</h6><p class='card-text'>" . $product['productName'];
                            echo "</p><h6 class='card-text'>Rs&nbsp;" . $product['productCurrentPrice'];
                            echo " &nbsp;<del><small class='text-muted icon-yellow'>Rs" . $product['productLastPrice'];
                            $discountPercent = (($product['productLastPrice'] - $product['productCurrentPrice'])*100)/ $product['productLastPrice'];
                            echo "</small></del>&nbsp;<small class='text-success'>".number_format($discountPercent,2)."% off</small></h6>
                                            <div class='d-flex justify-content-between align-items-center'>
                                                <div>
                                                    <button type='button' class='btn btn-sm btn-outline-secondary'>Add To
                                                        Cart</button>
                                                    <a href='#' class='btn btn-sm btn-outline-secondary'>Wish List</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                        }
                    } else {
                        echo "No Product Found";
                    }
                    mysqli_close($connection);
                    ?>
                </div>
            </div>
        </div>

    </main>

    <!-- footer section -->
    <section id="footer">
        <div class="container">
            <footer class="row row-cols-5 py-5 my-5 border-top">
                <div class="col">
                    <a href="index.html" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
                        <img class="rounded" src="images/logo.png" alt="" width="130" height="54">
                    </a>
                    <address class="text-muted">
                        <i class="bi bi-house-door-fill"></i>1355 Market St, Suite 900<br>
                        San Francisco, CA 94103<br><br>
                        <i class="bi bi-telephone-fill"></i> (123) 456-7890<br>
                        <i class="bi bi-envelope-fill"></i> sparten@ac.in<br><br>
                    </address>
                    <p class="text-center text-muted">&copy; 2021 Sparten, Inc.</p>
                    <p class="text-center text-muted">All rights reserved.</p>
                </div>

                <div class="col">

                </div>

                <div class="col">
                    <h5>Quick Links</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="index.html" class="nav-link p-0 text-muted">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Shop</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Accessories</a></li>
                        <li class="nav-item mb-2"><a href="sale.html" class="nav-link p-0 text-muted">Sale</a></li>
                        <li class="nav-item mb-2"><a href="blog.html" class="nav-link p-0 text-muted">Blog</a></li>
                    </ul>
                </div>

                <div class="col">
                    <h5>Information</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About Us</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Delevery information</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Privacy Policy</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Terms & Condition</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                    </ul>
                </div>

                <div class="col">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                            <h5><i class="bi bi-truck" style="font-size:28px;"></i> Free Shiping</h5>
                            <p>Free Shiping on all orders</p>
                        </li>
                        <li class="nav-item mb-2">
                            <h5><i class="bi bi-clock-history" style="font-size:28px;"></i> Support 24/7</h5>
                            <p>Free Shiping on all orders</p>
                        </li>
                        <li class="nav-item mb-2">
                            <h5><i class="bi bi-arrow-counterclockwise" style="font-size:28px;"></i> Return</h5>
                            <p>Free Shiping on all orders</p>
                        </li>
                    </ul>
                </div>

            </footer>
        </div>
    </section>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
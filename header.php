
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
                        <a class="nav-link <?php if ($activePage == "index") {
                                                echo "active";
                                            } ?>" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($activePage == "shop") {
                                                echo "active";
                                            } ?>" href="shop.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($activePage == "aboutUs") {
                                                echo "active";
                                            } ?>" href="aboutUs.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($activePage == "contactUs") {
                                                echo "active";
                                            } ?>" href="contactUs.php">Contact Us</a>
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
                    <?php
                    if (isset($_SESSION['userEmail']) && isset($_SESSION['userName'])) {
                    ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle dropdown-toggle-split " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person" style="font-size:22px;"></i><?php echo $_SESSION["userName"]; ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="wishlist.php">Wish List</a></li>
                                <li><a class="dropdown-item" href="forgetPassword.php">Forget Password </a></li>
                                <li><a class="dropdown-item" href="orderHistory.php">Order History</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                        </svg> Logout</a></li>
                            </ul>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle dropdown-toggle-split " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person" style="font-size:22px;"></i>Account
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="login.php">Login</a></li>
                                <li><a class="dropdown-item" href="registration.php">Resister</a></li>
                            </ul>
                        </li>
                    <?php
                    } ?>
                    <li><a href="cart.php" class="nav-link <?php if ($activePage == "cart") {echo "active";}?>"><i class="bi bi-cart" style="font-size:22px"></i></a></li>
                </ul>
                
            </div>
        </div>
    </nav>
</section>

<!-- navigation bar -->
<section id="navbar">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img class="rounded" src="images/logo.png" alt="" width="120" height="34">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php if ($activePage == "index") { echo "active" ; }?>"
                            href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($activePage == "dashboard") { echo "active" ; }?>"
                            href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($activePage == "products") { echo "active" ; }?>"
                            href="products.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($activePage == "orders") { echo "active" ; }?>"
                            href="orders.php">Oders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($activePage == "users") { echo "active" ; }?>"
                            href="users.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($activePage == "messages") { echo "active" ; }?>"
                            href="messages.php">Messages</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <?php
                        if(isset($_SESSION['adminEmail']) && isset($_SESSION['adminName']) ) {
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-toggle-split " href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person"
                                style="font-size:22px;"></i>
                            <?php echo $_SESSION["adminName"]; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="adminProfile.php">Admin Profile</a></li>
                            <li><a class="dropdown-item" href="adminForgetPassword.php">Forget Password </a></li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="adminLogout.php">Logout</a></li>
                        </ul>
                    </li>
                    <?php
                    }
                    else {
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-toggle-split " href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person"
                                style="font-size:22px;"></i>Account
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="adminLogin.php">Login</a></li>
                            <li><a class="dropdown-item" href="adminRegistration.php">Resister</a></li>
                        </ul>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
                <ul></ul>
                <ul></ul>
            </div>
        </div>
    </nav>
</section>
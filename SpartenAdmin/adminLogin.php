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
    <title>Sparten | Admin Login</title>
</head>

<body style="background-color: #8fc4b7;">
<?php
require 'dbConnection.php';
if (isset($_POST['submit'])) {
    $adminEmail = $_POST['adminEmail'];
    $adminPassword = $_POST['adminPassword'];
    $checkQuery = "SELECT * FROM adminlogin WHERE adminEmail ='$adminEmail'";
    $emailQuery = mysqli_query($connection, $checkQuery);
    $emailCount = mysqli_num_rows($emailQuery);
    if ($emailCount) {
        $fetchPassword = mysqli_fetch_assoc($emailQuery);
        $fetchedPassword = $fetchPassword['adminPassword'];
        $decodePassword = password_verify($adminPassword, $fetchedPassword);
        if ($decodePassword) {
            $_SESSION["adminEmail"] = $fetchPassword['adminEmail'];
            $_SESSION["adminName"] = $fetchPassword['adminName'];
            ?>
            <script type="text/javascript">
            location.replace("messages.php");
            location.replace("users.php");
            location.replace("orders.php");
            location.replace("products.php");
            location.replace("dashboard.php");
            location.replace("index.php");
            </script>
            <?php
        }
        else {
            echo '<script type="text/javascript">
            alert("Password Incorrect!");
            </script>';
        }
    }
    else {
        echo '<script type="text/javascript">
        alert("Invalid Email!");
        </script>';
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
                            <div class="col-md-4">
                                <h2>Admin Login</h2>
                                <p class="text-dark">Get access to your Orders,Wishlist and Cart</p>
                            </div>
                            <div class="col-md-8">
                                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                                    <div class="mb-3">
                                        <label for="adminEmail" class="form-label">Admin Email</label>
                                        <input type="email" class="form-control" id="adminEmail" name="adminEmail" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="adminPassword" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="adminPassword" name="adminPassword"
                                            required>
                                        <div id="forgetPassword" class="form-text">
                                            <a class="text-decoration-none" href="adminForgetPassword.php">Forget Password ?</a>
                                        </div>
                                    </div>
                                    <a href="javascript:history.go(-1)" class="btn btn-secondary">Go Back</a>
                                    <button type="submit" class="btn btn-primary" name="submit">Login</button>

                                    <div class="mt-4 pt-4"><a class="text-decoration-none" href="adminRegistration.php">New
                                            to
                                            Sparten? Create an
                                            account</a></div>
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
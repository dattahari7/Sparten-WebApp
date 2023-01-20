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
<?php
require 'dbConnection.php';
$userId = $_SESSION['userId'];
$sql_select = mysqli_query($connection, "SELECT * FROM cart");
if (mysqli_num_rows($sql_select) > 0) {
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Sparten | Checkout</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/checkout/">



    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- CSS -->
    <link rel="stylesheet" href="CSS/style.css">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        .icon-yellow {
            color: rgb(228, 211, 59);
        }
    </style>

</head>

<body class="bg-light">

    <div class="container">
        <main>
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="images/logo.png" alt="" width="135" height="57">
                <h2>Checkout</h2>
                <p class="lead"></p>
            </div>

            <div class="row g-5">
                <div class="col-1"></div>
                
                <div class="col-md-6 col-lg-6">
                    <h4 class="mb-3">Checkout and Billing address</h4>
                    <form class="needs-validation" action="order.php" method="post">
                        <div class="row g-3">
                            <!-- <div class="col-sm-6">
                                <label for="firstName" class="form-label">Product Quantity</label>
                                <input type="number" class="form-control" id="firstName" placeholder="" value="" required>
                                
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Product Price</label>
                                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                               
                            </div> -->
                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="1234, Main Street" required>
                                
                            </div>
                            <div class="col-12">
                                <label for="phoneNumber" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="" value="" required>
                                
                            </div>
                            
                            <div class="col-md-5">
                                <label for="pincode" class="form-label">Pin code</label>
                                <input type="text" class="form-control" id="pincode" name="pincode" placeholder="" required>
                                
                            </div>

                            <div class="col-md-4">
                                <label for="state" class="form-label">State</label>
                                <input type="text" class="form-control" id="state" name="state" placeholder="" required>
                                
                            </div>
                            

                            <div class="col-md-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="" required>
                                
                            </div>

                            
                        </div>
                        <hr class="my-4">

                        <h4 class="mb-3">Payment</h4>

                        <div class="my-3">
                            <div class="form-check">
                                <label class="form-check-label" for="COD">Cash On Delivery</label>
                                <input id="credit" name="paymentMethod" type="radio" class="form-check-input" value="COD" checked required>
                                
                            </div>
                            
                        </div>

                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" type="submit" name="submit">Continue to checkout</button>
                    </form>
                </div>
                <div class="col-md-5 col-lg-5">
                    <!-- main section -->
                    <div class="container">
                        <div class="card">
                            <div class="card-header text-center">
                                YOUR ORDERS
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col" class="text-center">Products</th>
                                        <th scope="col" class="text-center">Name</th>
                                        <th scope="col" class="text-center">Total</th>
                                        <th scope="col" class="text-center">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require 'dbConnection.php';
                                        $userId = $_SESSION['userId'];
                                        $sql_select = mysqli_query($connection, "SELECT * FROM products, cart WHERE cart.productId=products.productId and cart.userId='$userId'");
                                        if (mysqli_num_rows($sql_select) > 0) {
                                            echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';
                                            $gtotalPrice=0;
                                            while ($cartProduct = mysqli_fetch_assoc($sql_select)) {
                                                $cartProductId = $cartProduct['cartProductId'];
                                                $totalPrice = $cartProduct['productQuantity'] * $cartProduct['productCurrentPrice'];
                                                $gtotalPrice +=$totalPrice;
                                                echo '<tr>
                                                <td class="text-center"><img class="rounded mx-auto d-block" alt="..." src="data:image/jpeg;base64,' . base64_encode($cartProduct['productImage']) . '" width="80" height="50"/></td>
                                                <td class="text-center">' . $cartProduct['productName'] . '</td>
                                                <td class="text-center">Rs&nbsp;' . $totalPrice . '</td>
                                                <td class="text-center">
                                                <form action="removeProductFromCart.php" method="post">
                                                <input type="hidden" name="cartProductId" value="' . $cartProductId . '">
                                                <button type="submit" class="btn btn-outline-danger btn-sm" name="btn_remove"><i class="bi bi-trash-fill"></i></button>
                                                </form></td>
                                                </tr>';
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="text-start">ORDER TOTAL</p>
                                    <h5 class="text-end">Rs&nbsp;<?php echo $gtotalPrice;?></h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                   

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2021-2022 Sparten</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>


    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="form-validation.js"></script>
</body>

</html>
<?php
}
else{
    echo '<script type="text/javascript">
    alert("No product in cart so can not go for checkout.");
    location.replace("cart.php");</script>';
}
?>


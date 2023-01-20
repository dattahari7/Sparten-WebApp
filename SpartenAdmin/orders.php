<?php
session_start();
if (!isset($_SESSION['adminEmail'])) {
?>
    <script type="text/javascript">
        var alert = confirm("You need to login, To access orders..");
        if (alert == true) {
            location.replace('adminLogin.php');
        } else {
            location.replace('index.php');
        }
    </script>

<?php
}
?>
<?php
$activePage = "orders";
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
  <title>Sparten | Admin Orders</title>
</head>

<body>
  <!-- navbar file -->
  <?php require 'navbar.php' ?>
  <!--orders header section -->
  <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10 mb-4">
    <div class="container-xl px-4">
      <div class="page-header-content pt-4">
        <div class="row align-items-center justify-content-between">
          <div class="col-auto mt-4">
            <h1 class="page-header-title">
              Available orders
            </h1>
            <div class="page-header-subtitle">Viewing pending and completed orders, completing pending orders, and overview of pendeing and completed orders</div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- orders section  -->
  <section>
    <!--cart product show on cart page -->
    <div class="album py-5 bg-light">
        <div class="container-fluid">
          <div class="mb-4">
            <div class="text-start">
            <a class="btn btn-outline-primary btn-lg" href="dashboard.php" role="button">Go To DashBoard&nbsp;<i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
          <table class="table table-bordered">
              <thead>
                  <tr>
                  <th scope="col" class="text-center">Order Id</th>
                  <th scope="col" class="text-center">Customer Name</th>
                  <th scope="col" class="text-center">Customer Email</th>
                  <th scope="col" class="text-center">Customer Phone</th>
                  <th scope="col" class="text-center">Order Date</th>
                  <th scope="col" class="text-center">Address</th>
                  <th scope="col" class="text-center">Payment Method</th>
                  <th scope="col" class="text-center">Payment Status</th>
                  <th scope="col" class="text-center">Order Status</th>
                  <th scope="col" class="text-center">Update Orders</th>
                  <th scope="col" class="text-center">View Orders</th>
                  <th scope="col" class="text-center">Cancle Orders</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                  require 'dbConnection.php';
                  $sql_select = mysqli_query($connection, "SELECT * FROM `order`");
                  $_SESSION['numberOfOrders'] = 0;
                  if (mysqli_num_rows($sql_select) > 0) {
                    echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';
                    while ($orderData = mysqli_fetch_assoc($sql_select)) {
                      $_SESSION['numberOfOrders'] += 1;
                      $userId = $orderData['userId'];
                      $orderId = $orderData['orderId'];
                      $addedOn = $orderData['addedOn'];
                      $address = $orderData['address'];
                      $city = $orderData['city'];
                      $pincode = $orderData['pincode'];
                      $state = $orderData['state'];
                      $fullAddress = $address."\n".$city."-".$pincode."\n".$state;
                      $phoneNumber = $orderData['phoneNumber'];
                      $paymentType = $orderData['paymentType'];
                      $paymentStatus = $orderData['paymentStatus'];
                      $orderStatus = $orderData['orderStatus'];
                      $selectUserQuery =mysqli_query($connection, "SELECT * FROM `userlogin` WHERE userId ='$userId'");
                      if (mysqli_num_rows($selectUserQuery) > 0) {
                        while ($userData = mysqli_fetch_assoc($selectUserQuery)) {
                          $userName = $userData['userName'];
                          $userEmail = $userData['userEmail'];
                      ?>       
                      <tr>
                      <td class="text-center"><?php echo $orderId; ?></td>
                      <td class="text-center"><?php echo $userName; ?></td>
                      <td class="text-center"><?php echo $userEmail; ?></td>
                      <td class="text-center"><?php echo $phoneNumber; ?></td>
                      <td class="text-center"><?php echo $addedOn; ?></td>
                      <td class="text-center"><?php echo $fullAddress; ?></td>
                      <td class="text-center"><?php echo $paymentType; ?></td>
                      <td class="text-center"><?php echo $paymentStatus; ?></td>
                      <td class="text-center"><?php echo $orderStatus; ?></td>
                      <td class="text-center">
                      <a href="updateOrder.php?orderId=<?php echo $orderId; ?>" class="btn btn-outline-primary btn-sm" name="btn_update"><i class="bi bi-arrow-repeat"></i></a>
                      </td>
                      <td class="text-center">
                      <form action="orderDetails.php" method="post">
                      <input type="hidden" name="userId" value="<?php echo $userId; ?>">
                      <input type="hidden" name="orderId" value="<?php echo $orderId; ?>"> 
                      <button type="submit" class="btn btn-outline-success btn-sm" name="btn_view">view</button>
                      </form>
                      </td>
                      <td class="text-center">
                      <form action="cancelOrder.php" method="post">
                      <input type="hidden" name="userId" value="<?php echo $userId; ?>">
                      <input type="hidden" name="orderId" value="<?php echo $orderId; ?>"> 
                      <button type="submit" class="btn btn-outline-danger btn-sm" name="btn_cancel"><i class="bi bi-trash-fill"></i></button>
                      </form>
                      </td>
                      </tr>
                      <?php
                      }
                    }
                      }
                    }
                    else {
                      $_SESSION['numberOfOrders'] = 0;
                      echo '<tr><td colspan="12"><div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                      <h4>No order in orders.
                      <p><a class="btn btn-outline-primary btn-sm" href="dashboard.php" role="button">Go To Dashboard</a></p>
                      </div></td></tr>';
                    }
                  ?>
              </tbody>
          </table>
            
        </div>
    </div>

  </section>

  <!-- footer section -->
  <?php require 'footer.php' ?>



  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
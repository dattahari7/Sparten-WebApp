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
  <title>Sparten | Admin Orders Details</title>
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
              Total Order Products
            </h1>
            <div class="page-header-subtitle">Viewing order products and overview.</div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- orders section  -->
  <section>
    <!--cart product show on cart page -->
    <div class="album py-5 bg-light">
        <div class="container">
          <div class="mb-4">
            <?php
            echo '<div class="text-end">
            <a class="btn btn-outline-primary btn-lg" href="orders.php" role="button"><i class="bi bi-arrow-left"></i>&nbsp;Back To Orders</a>
            </div>';
            ?>
          </div>
          <table class="table table-bordered">
              <thead>
                  <tr>
                  <th scope="col" class="text-center">Product</th>
                  <th scope="col" class="text-center">Product Name</th>
                  <th scope="col" class="text-center">Product Brand</th>
                  <th scope="col" class="text-center">Product Quantity</th>
                  <th scope="col" class="text-center">Product Price</th>
                  <th scope="col" class="text-center">Total Price</th>
                  
                  </tr>
              </thead>
              <tbody>
                  <?php
                  require 'dbConnection.php';
                  if(isset($_POST['btn_view'])){
                    $orderId = $_POST['orderId'];
                    $userId = $_POST['userId'];
                    $selectOrderDetailsQuery = mysqli_query($connection, "SELECT distinct(orderdetails.orderDetailsId),orderdetails.*,products.*FROM orderdetails,products,`order` WHERE orderdetails.orderId='$orderId' and `order`.userId='$userId' and orderdetails.productId=products.productId");
                    if (mysqli_num_rows($selectOrderDetailsQuery) > 0) {
                        echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';
                        while ($orderDetailsData = mysqli_fetch_assoc($selectOrderDetailsQuery)) {
                          // $product = $orderDetailsData['productImage'];
                          $productName = $orderDetailsData['productName'];
                          $productBrand = $orderDetailsData['productBrand'];
                          $productQuantity = $orderDetailsData['productQuantity'];
                          $productPrice = $orderDetailsData['productCurrentPrice'];
                          $totalPrice = $productQuantity*$productPrice;       
                          echo '<tr>
                          <td class="text-center"><img class="rounded mx-auto d-block" alt="..." width="80" height"50" src="data:image/jpeg;base64,' . base64_encode($orderDetailsData['productImage']) . '"/></td>';
                          ?>
                          <td class="text-center"><?php echo $productName; ?></td>
                          <td class="text-center"><?php echo $productBrand; ?></td>
                          <td class="text-center"><?php echo $productQuantity; ?></td>
                          <td class="text-center"><?php echo $productPrice; ?></td>
                          <td class="text-center"><?php echo $totalPrice; ?></td>

                          </tr>
                          <?php
                        }
                    }
                    else {
                      echo '<tr><td colspan="7"><div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                      <h4>No order in order details</h4><p class="text-center">need customer to order</p>
                      </div></td></tr>';
                    }
                        
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
<?php
session_start();
if (!isset($_SESSION['adminEmail'])) {
?>
  <script type="text/javascript">
      var alert = confirm("You need to login, To access products..");
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
$activePage = "products";
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
  <title>Sparten | Admin Home</title>
</head>

<body>
  <!-- navbar file -->
  <?php
  require 'navbar.php';
  require 'addProduct.php';
  // require 'editProduct.php';
  ?>
  <!-- header section -->
  <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10 mb-4">
    <div class="container-xl px-4">
      <div class="page-header-content pt-4">
        <div class="row align-items-center justify-content-between">
          <div class="col-auto mt-4">
            <h1 class="page-header-title">
              Available Products
            </h1>
            <div class="page-header-subtitle">Adding product, removeing product, and overview</div>
          </div>
          <div class="col-12 col-xl-auto mt-4">
            <div class="text-center mt-2">
              <p><a class="btn btn-outline-secondary btn-lg px-4" href="addProduct.html" role="button" data-bs-toggle="modal" data-bs-target="#staticBackdropAdd">Add Products</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- product show on products page -->
  <main>
    <div class="album py-5 bg-light">
      <div class="container">
        <?php
        require 'dbConnection.php';
        $sql_select = mysqli_query($connection, "SELECT * FROM products");
        if (mysqli_num_rows($sql_select) > 0) {
          $_SESSION['numberOfProducts'] = 0;
          echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';
          while ($product = mysqli_fetch_assoc($sql_select)) {
            $_SESSION['numberOfProducts'] +=1;
            $productId = $product['productId'];
            echo '<div class="col">
            <div class="card shadow-sm">
            <img class="card-img-top" alt="..." width="100" height="225" src="data:image/jpeg;base64,' . base64_encode($product['productImage']) . '"/>';
            echo '<div class="card-body"><i class="bi bi-star-fill icon-yellow"></i><i class="bi bi-star-fill icon-yellow"></i><i
            class="bi bi-star-fill icon-yellow"></i></i><i class="bi bi-star-half icon-yellow"></i><i
            class="bi bi-star icon-yellow"></i>
            <h6 class="card-title text-muted">' . $product['productBrand'];
            echo '</h6><p class="card-text">' . $product['productName'];
            echo '</p><h6 class="card-text">Rs&nbsp;' . $product['productCurrentPrice'];
            echo ' &nbsp;<del><small class="text-muted icon-yellow">Rs' . $product['productLastPrice'];
            $discountPercent = (($product['productLastPrice'] - $product['productCurrentPrice']) * 100) / $product['productLastPrice'];
            echo '</small></del>&nbsp;<small class="text-success">' . number_format($discountPercent, 2) . '% off</small></h6>
            <div class="d-flex align-items-center ">
            <form action="editProduct.php" method="post" class="me-2">
            <input type="hidden" name="edit_productId" value="'.$productId.'">
            <button type="submit" class="btn btn-outline-success btn-sm" name="btn_edit"><i class="bi bi-pencil-fill"></i> Edit</button>
            </form>
            <form action="removeProduct.php" method="post">
            <input type="hidden" name="remove_productId" value="' . $productId . '">
            <button type="submit" class="btn btn-outline-danger btn-sm" name="btn_remove"><i class="bi bi-trash-fill"></i> Remove</button>
            </form>
            </div>
            
            </div>
            </div>
            </div>';
          }
        } else {
          $_SESSION['numberOfProducts'] = 0;
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
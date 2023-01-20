<?php
session_start();
$activePage = "index"; ?>
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
  <?php require 'navbar.php' ?>
  <!-- header section -->
  <header class="masthead">
      <div class="container px-4 px-lg-5 h-100">
          <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
              <div class="col-lg-8 align-self-end">
                  <h1 class="text-white font-weight-bold">Your Favorite Place for customizing your website</h1>
                  <hr class="divider" />
              </div>
              <div class="col-lg-8 align-self-baseline">
                  <p class="text-white  mb-5">Sparten admin panel can help you to better organize website, products, orders, etc. using the Sparten admin panel! Just use Sparten admin panel and start customizing!</p>
                  <a class="btn btn-danger" href="dashboard.php">Go To Dashboard</a>
              </div>
          </div>
      </div>
  </header>

  <!-- footer section -->
  <?php require 'footer.php' ?>



  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
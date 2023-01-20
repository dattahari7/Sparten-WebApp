<?php
session_start();
if (!isset($_SESSION['adminEmail'])) {
?>
    <script type="text/javascript">
        var alert = confirm("You need to login, To access users..");
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
$activePage = "users";
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
  <?php require 'navbar.php' ?>
  <!--user header section -->
  <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10 mb-4">
    <div class="container-xl px-4">
      <div class="page-header-content pt-4">
        <div class="row align-items-center justify-content-between">
          <div class="col-auto mt-4">
            <h1 class="page-header-title">
              Total users
            </h1>
            <div class="page-header-subtitle">Viewing users, deleting users, and overview</div>
          </div>
          <div class="col-12 col-xl-auto mt-4">
            <div class="text-center mt-2">
              <p>
              <form action="deleteUser.php" method="post">
                <button type="submit" class="btn btn-outline-danger btn-lg px-4" name="btn_deleteAllUser"><i class="bi bi-trash-fill"></i> Delete All</button>
              </form>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- users section  -->
  <section>
    <div class="album py-5 bg-light">
      <div class="container">
        <?php
        require 'dbConnection.php';
        $sql_select = mysqli_query($connection, "SELECT * FROM userlogin");
        if (mysqli_num_rows($sql_select) > 0) {
          echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';
          $_SESSION['numberOfUsers'] = 0;
          while ($users = mysqli_fetch_assoc($sql_select)) {
            $_SESSION['numberOfUsers'] += 1;
            $userId = $users['userId'];
            echo "<div class='col'>
            <div class='card shadow-sm'>
            <img class='card-img-top' alt='...' width='100%' height='146' src='images/userImage.webp'/>";
            echo "<div class='card-body'>
            <h6 class='card-title'>User Name: " . $users['userName'];
            echo "</h6><h6 class='card-text'>User Email: " . $users['userEmail'];
            echo "</h6><h6 class='card-text'>Date Of Birth: " . $users['dateOfBirth'];
            echo "<div class='d-flex justify-content-between align-items-center'><div>
            <form action='deleteUser.php' method='post'>
            <input type='hidden' name='delete_userId' value='" . $userId . "'>
            <button type='submit' class='btn btn-outline-danger btn-sm mt-4' name='btn_deleteUser'><i class='bi bi-trash-fill'></i> Delete</button>
            </form></div></div></div></div></div>";
          }
        } else {
          $_SESSION['numberOfUsers'] = 0;
          echo '<div class="row row-cols-1 alert alert-warning alert-dismissible fade show text-center" role="alert">
          <h4>Users Not Available</h4><p class="text-center">You should check later.</p></div>';
        }
        ?>
      </div>
    </div>
    </div>

  </section>
  <!--admin header section -->
  <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10 mb-4">
    <div class="container-xl px-4">
      <div class="page-header-content pt-4">
        <div class="row align-items-center justify-content-between">
          <div class="col-auto mt-4">
            <h1 class="page-header-title">
              Total Admin
            </h1>
            <div class="page-header-subtitle">Viewing admin users overview</div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </header>
  <!--admin user section  -->
  <section>
    <div class="album py-5 bg-light">
      <div class="container">
        <?php
        require 'dbConnection.php';
        $sql_select = mysqli_query($connection, "SELECT * FROM `adminlogin`");
        if (mysqli_num_rows($sql_select) > 0) {
          echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';
          $_SESSION['numberOfAdmins'] = 0;
          while ($admins = mysqli_fetch_assoc($sql_select)) {
            $_SESSION['numberOfAdmins'] += 1;
            $adminId = $admins['adminId'];
            echo "<div class='col'>
            <div class='card shadow-sm'>
            <img class='card-img-top' alt='...' width='100%' height='146' src='images/adminImage.jpg'/>";
            echo "<div class='card-body'>
            <h6 class='card-title'>Admin Name: " . $admins['adminName'];
            echo "</h6><h6 class='card-text'>Admin Email: " . $admins['adminEmail'];
            echo "</h6><h6 class='card-text'>Date Of Birth: " . $admins['adminDateOfBirth'];
            echo "</div></div></div>";
          }
        } else {
          $_SESSION['numberOfAdmins'] = 0;
          echo '<div class="row row-cols-1 alert alert-warning alert-dismissible fade show text-center" role="alert">
          <h4>Admin Not Available</h4><p class="text-center">You should check later.</p></div>';
        }
        ?>
      </div>
    </div>
    </div>

  </section>

  <!-- footer section -->
  <?php require 'footer.php' ?>



  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
<?php
session_start();
if (!isset($_SESSION['adminEmail'])) {
?>
    <script type="text/javascript">
        var alert = confirm("You need to login, To access messages..");
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
$activePage = "messages";
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
  require 'dbConnection.php';
  ?>
  <!-- header section -->
  <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10 mb-4">
    <div class="container-xl px-4">
      <div class="page-header-content pt-4">
        <div class="row align-items-center justify-content-between">
          <div class="col-auto mt-4">
            <h1 class="page-header-title">
              Available Messages
            </h1>
            <div class="page-header-subtitle">Viewing messages, deleting messages, and overview</div>
          </div>
          <div class="col-12 col-xl-auto mt-4">
            <div class="text-center mt-2">
              <p>
              <form action="deleteMessage.php" method="post">
                <button type="submit" class="btn btn-outline-danger btn-lg px-4" name="btn_deleteAll"><i class="bi bi-trash-fill"></i> Delete All</button>
              </form>
              </p>
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
        $sql_select = mysqli_query($connection, "SELECT * FROM messages");
        if ($numberOfMessages = mysqli_num_rows($sql_select) > 0) {
          echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';
          $_SESSION['numberOfMessages'] = 0;
          while ($messages = mysqli_fetch_assoc($sql_select)) {
            $_SESSION['numberOfMessages'] += 1;
            $messageId = $messages['messageId'];
            echo "<div class='col'>
            <div class='card shadow-sm'>
            <img class='card-img-top' alt='...' width='100%' height='146' src='images/messageheader.jpg'/>";
            echo "<div class='card-body'>
            <h6 class='card-title'>Sender Name: " . $messages['senderName'];
            echo "</h6><h6 class='card-text'>Sender Email: " . $messages['senderEmail'];
            echo "</h6><h6 class='card-text'>Message: " . $messages['senderMessage'];
            echo "<div class='d-flex justify-content-between align-items-center'><div>
            <form action='deleteMessage.php' method='post'>
            <input type='hidden' name='delete_messageId' value='" . $messageId . "'>
            <button type='submit' class='btn btn-outline-danger btn-sm mt-4' name='btn_delete'><i class='bi bi-trash-fill'></i> Delete</button>
            </form></div></div></div></div></div>";
          }
        } else {
          $_SESSION['numberOfMessages'] = 0;
          echo '<div class="row row-cols-1 alert alert-warning alert-dismissible fade show text-center" role="alert">
          <h4>Messages Not Available</h4><p class="text-center">You should check later.</p></div>';
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
<?php
session_start();
$activePage = "contactUs";
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <!-- CSS -->
  <link rel="stylesheet" href="CSS/style.css">
  <title>Sparten | Home</title>
</head>

<body>
  <!-- navbar file -->
  <?php
  require 'header.php';
  require 'dbConnection.php';
  ?>

  <?php
  require 'dbConnection.php';
  if (isset($_POST['send'])) {
    $senderName = $_POST['senderName'];
    $senderEmail = $_POST['senderEmail'];
    $senderMessage = $_POST['senderMessage'];
    $insertQuery = "INSERT INTO messages(senderName, senderEmail, senderMessage) VALUES ('$senderName','$senderEmail','$senderMessage')";
    $queryRun = mysqli_query($connection, $insertQuery);
    if ($queryRun) {
      echo '<script type="text/javascript">alert("Message send successfully.");</script>';
    } else {
      echo '<script type="text/javascript">alert("Message not send.");</script>';
    }
  }
  ?>

  <section id="contactUs" class="mb-4 pb-4">
    <div class="container">
      <div class="row">
        <div class="py-5 text-center">
          <img class="d-block mx-auto mb-4" src="images/logo.png" alt="" width="135" height="57">
          <h2>Contact Us</h2>
          <p class="lead">Please use this contact form to get in touch with the Sparten Stories team with regard to the content published on stories.Sparten.com only. Please note that complaints about products sold on Sparten or customer support emails will not receive a response. For such issues, please tweet to @Spartensupport
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-3"></div>
        <div class="col-lg-6">
          <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="mb-3">
              <label for="senderName" class="form-label">Your Name</label>
              <input class="form-control" type="text" id="senderName" name="senderName" required>
            </div>
            <div class="mb-3">
              <label for="senderEmail" class="form-label">Email address</label>
              <input type="email" class="form-control" id="senderEmail" name="senderEmail" required>
              <div id="userEmail" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="senderMessage" class="form-label">Enquiry Message</label>
              <textarea class="form-control" id="senderMassage" rows="3" name="senderMessage" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="send">Submit</button>
            <button type="reset" class="btn btn-secondary" name="cancel">Cancel</button>
          </form>
        </div>
        <div class="col-3"></div>
      </div>
    </div>
  </section>

  <!-- footer section -->
  <?php require 'footer.php' ?>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
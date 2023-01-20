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
    <title>Sparten | Registration</title>
</head>

<body style="background-color: #8fc4b7;">
<?php
require 'dbConnection.php';
if (isset($_POST['submit'])) {
    $userName = mysqli_real_escape_string($connection, $_POST['userName']);
    $dateOfBirth = mysqli_real_escape_string($connection, $_POST['dob']);
    $userEmail = mysqli_real_escape_string($connection, $_POST['userEmail']);
    $tempPass = mysqli_real_escape_string($connection, $_POST['userPassword']);
    $repeatTempPass = mysqli_real_escape_string($connection, $_POST['repeatPassword']);

    $checkQuery = "SELECT * FROM userlogin WHERE userEmail ='$userEmail'";
    $emailQuery = mysqli_query($connection, $checkQuery);
    $emailCount = mysqli_num_rows($emailQuery);
    if ($emailCount > 0) {
        echo '<script type="text/javascript">
        alert("Email Alredy Exist! change your email address.");
        </script>';
    }
    else {
        if ($tempPass === $repeatTempPass) {
            $userPassword = password_hash($tempPass, PASSWORD_BCRYPT);
            $repeatPassword = password_hash($repeatTempPass, PASSWORD_BCRYPT);
            $insertQuery = "INSERT INTO userlogin(userName, dateOfBirth, userEmail, userPassword, repeatPassword) VALUES ('$userName','$dateOfBirth','$userEmail','$userPassword','$repeatPassword')";
            $iQuery = mysqli_query($connection, $insertQuery);
            if ($iQuery) {
                echo '<script type="text/javascript">
                alert("Registration Successfull.");
                </script>';
                echo '<script type="text/javascript">
                location.replace("index.php");
                </script>';

            }
            else {
                echo '<script type="text/javascript">
                alert("Registration Failed.");
                location.replace("registration.php");
                </script>';
            }
        }
        else {
            echo '<script type="text/javascript">
            alert("Password does not matched!");
            </script>';
        }   
    }
}
?>
    <div class="container mt-4">
        <div class="row justify-content-md-center">
            <div class="col-3"></div>
            <div class="col-12 col-md-6 col-sm-12">
                <div class="card">
                    <img src="images/logo.png" class="card-img-top" alt="..." width="614px" height="170px">
                    <div class="card-body">
                        <div class="row g-0">
                            <div class="col-2"></div>
                            <div class="col-md-9">
                                <h2>SignUp</h2>
                                <p class="text-dark">Looks like you're new here! Sing Up to get started</p>
                            </div>
                        </div>
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" class="row g-3">
                            <div class="col-md-6">
                                <label for="userName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="userName" name="userName" required>
                            </div>

                            <div class="col-md-6">
                                <label for="userEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="userEmail" name="userEmail" required>
                                <div id="userEmail" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="col-md-4">
                                <label for="dob" class="form-label">Date Of Birth</label>
                                <input type="text" class="form-control" id="dob" name="dob" placeholder="dd/mm/yyyy" required>
                            </div>
                            <div class="col-md-4">
                                <label for="userPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="userPassword" name="userPassword" required>
                            </div>

                            <div class="col-md-4">
                                <label for="repeatPassword" class="form-label">Repeat Password</label>
                                <input type="password" class="form-control" id="repeatPassword" name="repeatPassword" required>
                            </div>

                            <div class="col-12">
                                <a href="javascript:history.go(-1)" class="btn btn-secondary">Go Back</a>
                                <button type="submit" class="btn btn-primary" name="submit">Sing Up</button>
                            </div>
                            <div class="mt-4 pt-4 text-center"><a class="text-decoration-none" href="login.php">Existing
                                    User? Log in</a></div>
                        </form>
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
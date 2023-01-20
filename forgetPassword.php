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
        <style>
        /* loginPageLogo holding the image and the button */
        .loginPageLogo {
            position: relative;
            text-align: center;
            color: white;
        }

        /* Top right button */
        .top-right {
            position: absolute;
            top: 8px;
            right: 16px;
        }
        </style>
        <title>Sparten | Forget Password</title>
    </head>

<body style="background-color: #8fc4b7;">
<?php
require 'dbConnection.php';
if (isset($_POST['submit'])) {
    $userEmail = mysqli_real_escape_string($connection, $_POST['userEmail']);
    $dateOfBirth = mysqli_real_escape_string($connection, $_POST['dob']);
    $tempPass = mysqli_real_escape_string($connection, $_POST['userPassword']);
    $repeatTempPass = mysqli_real_escape_string($connection, $_POST['repeatPassword']);

    $checkQuery = "SELECT * FROM userlogin WHERE userEmail ='$userEmail' and dateOfBirth = '$dateOfBirth'";
    $emailQuery = mysqli_query($connection, $checkQuery);
    $emailCount = mysqli_num_rows($emailQuery);
    if ($emailCount > 0) {
        if ($tempPass === $repeatTempPass) {
            $userPassword = password_hash($tempPass, PASSWORD_BCRYPT);
            $repeatPassword = password_hash($repeatTempPass, PASSWORD_BCRYPT);
            $updateQuery = "UPDATE userlogin SET userPassword='$userPassword', repeatPassword='$repeatPassword' WHERE userEmail='$userEmail' and dateOfBirth = '$dateOfBirth'";
            $uQuery = mysqli_query($connection, $updateQuery);
            if ($uQuery) {
                echo '<script type="text/javascript">
                alert("Password Updated Successfully!");
                </script>';

                echo '<script type="text/javascript">
                location.replace("index.php");
                </script>';
            }
        }
        else {
            echo '<script type="text/javascript">
            alert("Password does not matched!");
            </script>';
        } 
    }
    else {
        echo '<script type="text/javascript">
        alert("Email and date of birth not matching !");
        </script>';

        echo '<script type="text/javascript">
        location.replace("forgetPassword.php");
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
                                <h2>Forget Password</h2>
                                <p class="text-dark">Get access to your Account</p>
                            </div>
                            <div class="col-md-8">
                                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                                    <div class="mb-3">
                                        <label for="userEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="userEmail" name="userEmail" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="dob" class="form-label">Date Of Birth</label>
                                        <input type="text" class="form-control" id="dob" name="dob"
                                            placeholder="dd/mm/yyyy" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="userPassword" class="form-label">New Password</label>
                                        <input type="password" class="form-control" id="userPassword" name="userPassword"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="repeatPassword" class="form-label">Repeat Password</label>
                                        <input type="password" class="form-control" id="repeatPassword"
                                            name="repeatPassword" required>
                                    </div>
                                    <!-- <button type="reset" class="btn btn-secondary"></button> -->
                                    <a href="javascript:history.go(-1)" class="btn btn-secondary">Go Back</a>
                                    <button type="submit" class="btn btn-primary" name="submit">Forget</button>
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
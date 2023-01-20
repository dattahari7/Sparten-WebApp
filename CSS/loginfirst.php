<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sparten | Login</title>
    <style>
    .icon-yellow {
        color: rgb(228, 211, 59);
    }

    /* loginPageLogo holding the image and the button */
    .loginPageLogo {
        position: relative;
        text-align: center;
        color: white;
    }

    /* Top right button */
    .top-right-close {
        position: absolute;
        top: 8px;
        right: 16px;
    }
    </style>
</head>

<body>
    <?php require 'signUp.php' ?>
    <!-- loging modal testing -->
    <!-- Modal -->

    <!-- <div class="mt-4 pt-4"><a class="text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop1" data-bs-dismiss="modal">New to Sparten? Create an account</a></div> -->
    <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="loginPageLogo">
                    <img src="images/logo.png" class="card-img" alt="...">
                    <div class="top-right-close"><button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button></div>
                </div>
                <div class="modal-body">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <h2>Login</h2>
                            <p class="text-dark">Get access to your Orders,Wishlist and Cart</p>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            required>
                                        <div id="forgetPassword" class="form-text">
                                            <a href="forgetPassword.php" class="text-decoration-none">Forget Password
                                                ?</a>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Login</button>
                                    <!-- <div class="mt-4 pt-4"><a href="registration.php" class="text-decoration-none">New to Sparten? Create an account</a></div> -->
                                    <div class="mt-4 pt-4"><a class="text-decoration-none" href="#"
                                            data-bs-target="#staticBackdrop2" data-bs-toggle="modal"
                                            data-bs-dismiss="modal">New to Sparten? Create an account</a></div>
                                    <!-- <a class="btn btn-dark" href="#staticBackdrop2" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">Login</a> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
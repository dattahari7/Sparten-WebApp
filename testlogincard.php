<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <title>Forget Password</title>
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
</head>

<body>
    <!-- loging modal testing -->
    <!-- Modal -->
    <div class="mt-4 pt-4"><a class="text-decoration-none" href="#" data-bs-target="#staticBackdrop1" data-bs-toggle="modal" data-bs-dismiss="modal">New to Sparten? Create an account</a></div>
    <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="loginPageLogo">
                    <img src="images/logo.png" class="card-img" alt="...">
                    <div class="top-right"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
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
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Forget</button>
                                    <!-- <div class="mt-4 pt-4"><a href="registration.php" class="text-decoration-none">New to Sparten? Create an account</a></div> -->
                                    <!-- <div class="mt-4 pt-4"><a class="text-decoration-none" href="#" data-bs-target="#staticBackdrop2" data-bs-toggle="modal" data-bs-dismiss="modal">New to Sparten? Create an account</a></div> -->
                                    <!-- <a class="btn btn-dark" href="#staticBackdrop2" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">Login</a> -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>




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
                                        <button type="reset" class="btn btn-secondary">Cancel</button>
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





        <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="loginPageLogo">
                    <img src="images/logo.png" class="card-img" alt="...">
                    <div class="top-right"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                </div>
                <div class="modal-body">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <h2 class="text-dark">Forget Password</h2>
                            <p class="text-dark">Get access to your Account</p>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <form>
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
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Forget</button>
                                    <!-- <div class="mt-4 pt-4"><a href="registration.php" class="text-decoration-none">New to Sparten? Create an account</a></div> -->
                                    <!-- <div class="mt-4 pt-4"><a class="text-decoration-none" href="#" data-bs-target="#staticBackdrop2" data-bs-toggle="modal" data-bs-dismiss="modal">New to Sparten? Create an account</a></div> -->
                                    <!-- <a class="btn btn-dark" href="#staticBackdrop2" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">Login</a> -->
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    

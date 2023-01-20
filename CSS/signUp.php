<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sparten | SignUp</title>
    <style>
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
    <!-- loging modal testing -->
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="loginPageLogo">
                    <img src="images/logo.png" class="card-img" alt="...">
                    <div class="top-right-close"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                </div>
                <div class="modal-body">
                    <div class="row g-0">
                        <div class="col-3"></div>
                        <div class="col-md-6">
                            <h2>SignUp</h2>
                            <p class="text-dark">Looks like you're new here! Sing Up to get started</p>
                        </div>
                    </div>
                    <form class="row g-3">
                        <div class="col-md-4">
                            <label for="userFirstName" class="form-label">First name</label>
                            <input type="text" class="form-control" id="userFirstName" name="userFirstName" required>
                        </div>
                        <div class="col-md-4">
                            <label for="userLastName" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="userLastName" name="userLastName" required>
                        </div>
                        <div class="col-md-4">
                            <label for="userEmail" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="userEmail" name="userEmail" required>
                        </div>
                        <div class="col-md-6">
                            <label for="userPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="userPassword" name="userPassword" required>
                        </div>

                        <div class="col-md-6">
                            <label for="reEnterUserPassword" class="form-label">Re-Enter Password</label>
                            <input type="password" class="form-control" id="reEnterUserPassword" name="reEnterUserPassword" required>
                        </div>

                        <div class="col-12">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Sing Up</button>
                        </div>
                        <div class="mt-4 pt-4 text-center"><a class="text-decoration-none" href="#" data-bs-target="#staticBackdrop1" data-bs-toggle="modal" data-bs-dismiss="modal">Existing User? Log in</a></div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
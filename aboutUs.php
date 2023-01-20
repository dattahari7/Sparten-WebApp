<?php 
session_start();
$activePage = "aboutUs";
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
    <?php require 'header.php' ?>

    <!-- about section -->
    <section id="about">
        <div class="b-example-divider"></div>

        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5 border-top">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="images/slide1.jpg" class="d-block mx-lg-auto img-fluid" alt="..." width="700" height="500" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">About Us</h1>
                    <p class="lead">When you hear the word sports you probably think basketball, baseball, or football.
                        When
                        you
                        read fitness you may
                        imagine intense daily workouts at a gym. As a person with a bleeding disorder you may not be
                        able to
                        participate in
                        these activities.</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <a class="btn btn-outline-secondary btn-lg px-4" href="about.html" role="button">Read More</a>
                    </div>
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
<?php
    session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoFarm-Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            min-height: 100vh;
            margin-bottom: 0;
        }

        footer {
            margin-top: auto;

        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-light navbar-light shadow">

        <div class="container">

            <a href="" class="navbar-brand text-success fs-4">EcoFarm</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav mx-auto"> <!-- Use mx-auto to center the items -->
                    <li class="nav-item"><a href="index.php" class="nav-link text-success">Home</a></li>
                    <li class="nav-item"><a href="about.php" class="nav-link text-success">About</a></li>
                    <li class="nav-item"><a href="service.php" class="nav-link text-success">Services</a></li>
                </ul>

                <ul class="navbar-nav ml-auto"> <!-- Use ml-auto to push items to the right -->
                    <li class="nav-item"><a href="login.php" class="nav-link text-success">Login</a></li>
                    <li class="nav-item"><a href="register.php" class="nav-link text-success">Register</a></li>
                </ul>
            </div>

        </div>

    </nav>

    <div class="container bg-light mt-5 p-3 rounded">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-12 col-lg-7">
                <h1>Harvesing Tomorrow</h1>
                <p>Embrace Sustainable Agriculture with Our Eco-Friendly Farming Practices</p>
                <p>At EcoFarm, we believe in farming practices that not only nurture the land but also provide wholesome, natural produce for a healthier world. Our commitment to ecological farming goes beyond just growing crops; it's about cultivating a sustainable future for generations to come</p>
            </div>
            <div class="col-12 col-sm-6 col-md-12 col-lg-5 rounded">
                <img src="./images/Image 1.jpg" alt="" class="img-fluid rounded">
            </div>-
        </div>
    </div>

    <div class="container bg-light mt-3 p-3 rounded">
        <h2 class="mb-4 text-center">What Sets Us Apart?</h2>
        <div class="row text-center">
            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <img src="./images/Image 2.jpg" class="card-img-top" alt="...">
                    <div class="card-body p-3">
                        <h5 class="card-title">Regenerative Agriculture</h5>
                        <p class="card-text">
                            EcoFarm practices regenerative agriculture, enhancing soil health and biodiversity for future. </p>
                        <a href="#" class="btn btn-success">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <img src="./images/Image 3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Chemical-Free Farming</h5>
                        <p class="card-text">
                            EcoFarm promotes biodiversity, enriching ecosystems for enduring sustainability and resilience. </p>
                        <a href="#" class="btn btn-success">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <div class="card d-none d-lg-block">
                    <img src="./images/Image 4.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Biodiversity Champions</h5>
                        <p class="card-text">
                            EcoFarm embraces chemical-free farming, fostering purity, health, and ecological balance. </p>
                        <a href="#" class="btn btn-success">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container bg-light mt-3 p-3 rounded">
        <h2 class="mb-2">Join the movement</h2>
        <p>At EcoFarm, we invite you to join us in cultivating a sustainable future. Whether you're a conscious consumer, a local business, or someone passionate about environmental stewardship, your support makes a difference.</p>
        <div class="row align-items-center shadow-sm p-3">
            <div class="col-12 col-sm-12 col-md-9 col-lg-6 mx-auto">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="./images/Image 5.jpg" class="d-block w-100 rounded" alt="..." style="height: 300px;">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Sustainable Farming</h5>
                                <p>Eco-friendly, thriving; nature nurtures for sustainability.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="./images/Image 6.jpg" class="d-block w-100 rounded" alt="..." style="height: 300px;">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Pure, Chemical-Free Harvest</h5>
                                <p>"Pure produce, EcoFarm's pledge for health.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="./images/Image 7.jpg" class="d-block w-100 rounded" alt="..." style="height: 300px;">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Biodiversity Thrives Here</h5>
                                <p>EcoFarm's ecosystem blooms; nature champions.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <footer class="container-fluid bg-success text-light mt-3 shadow-sm p-3">
        <div class="container">
            <div class="row">

                <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-4 text-center mx-auto">
                    <p><strong>EcoFarm Agriculture</strong></p>
                    <p class="mb-0">Designed and Developed by <strong>Husni Haniffa</strong></p>
                    <p>Code crafted with love and soil.</p>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-6 col-xl-4 text-center mx-auto">
                    <p><strong>Working Hours</strong></p>
                    <p class="mb-0">Mon - Fri : 6.00 a.m - 6.00 p.m</p>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-4 text-center mx-auto">
                    <p><strong>Contact Us</strong></p>
                    <p class="mb-0">Email: info@ecofarm.com</p>
                    <p>Phone: (+94) 77 1234 567</p>
                </div>
            </div>
            <p class="text-center mx-auto mt-2">&copy; 2024 EcoFarm, All rights reserved</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EcoFarm-About</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />

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

  <div class="container mt-5 p-3">
    <header>
      <h1>About Us</h1>
      <p>
        Welcome to EcoFarm, where sustainable agriculture meets a commitment
        to environmental stewardship. At EcoFarm, we believe in the power of
        ecological farming to cultivate not only exceptional, nutrient-rich
        produce but also a harmonious relationship between humanity and the
        Earth.
      </p>
    </header>
  </div>



  <div class="container mt-2 shadow-sm">

    <div class="row g-2">
      <!--Image Left-->
      <div class="col-12 col-md-6">
        <div class="row g-2">
          <!--First Image-->
          <div class="col-12 col-md-6 d-none d-md-block">
            <picture>
              <img src="./images/Image 8.jpg" alt="" class="img-fluid" style="height: 425px;">
            </picture>
          </div>
          <!--Second Image Top & Bottom-->
          <div class="col-12 col-md-6">
            <picture>
              <img src="./images/Image 9.jpg" alt="" class="img-fluid mb-2">
            </picture>
            <picture>
              <img src="./images/Image 10.jpg" alt="" class="img-fluid mb-2">
            </picture>
          </div>

        </div>
      </div>

      <div class="col-12 col-md-6">
        <div class="row g-2">
          <!--First Image-->
          <div class="col-12 col-md-6  d-none d-md-block">
            <picture>
              <img src="./images/Image 11.jpg" alt="" class="img-fluid" style="height: 425px;">
            </picture>
          </div>
          <!--Second Image Top & Bottom-->
          <div class="col-12 col-md-6">
            <picture>
              <img src="./images/Image 12.jpg" alt="" class="img-fluid mb-2">
            </picture>
            <picture>
              <img src="./images/Image 13.jpg" alt="" class="img-fluid">
            </picture>
          </div>

        </div>
      </div>


    </div>


  </div>

  <div class="container mt-5 shadow-sm">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-9 col-lg-8 ">
        <header>
          <h1>Our Story</h1>
          <p>Over the years, Harvesting Tomorrow has grown into a community of like-minded individuals who share a common goal to build a sustainable future through responsible agriculture.</p>
          <p>Our farms stand as living proof that a bountiful harvest can be achieved without compromising the well-being of our planet.</p>
          <p>We invite you to be a part of our story, to support a movement that seeks to redefine the relationship between humanity and the Earth. </p>
        </header>


      </div>
      <div class="col-12 col-sm-12 col-md-3 col-lg-4 mx-auto">
        <picture>
          <img src="./images/Image 14.jpg" alt="" class="img-fluid">
        </picture>
      </div>
    </div>
  </div>

  <!--Footer-->
  <footer class="container-fluid bg-success text-light mt-5 shadow-sm p-3">
    <div class="container">
      <div class="row">

        <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-4 text-center mx-auto">
          <p><strong>EcoFarm Agriculture</strong></p>
          <p class="mb-0">
            Designed and Developed by <strong>Husni Haniffa</strong>
          </p>
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

      <p class="text-center mx-auto mt-2">
        &copy; 2024 EcoFarm, All rights reserved
      </p>

    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
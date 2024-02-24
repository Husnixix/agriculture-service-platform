<?php
session_start();

include("/xampp/htdocs/EcoFarm/config/connect-database.php");

$query = "SELECT * FROM Service";
$result = mysqli_query($connection, $query);

$services = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = $result->fetch_assoc()) {
        $services[] = $row;
    }
}
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoFarm-Service</title>
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

    <div class="container mt-5 bg-light rounded p-3">
        <h2 class="mb-4 text-center">Our Services</h2>
        <p class="text-center">Unlock the potential of sustainable farming with EcoFarm. Subscribe to our services for expert guidance, eco-friendly solutions, and a greener tomorrow. Join us in cultivating a better world, one harvest at a time.</p>

    </div>


    <div class="container bg-light mt-2 p-3 rounded">
        <div class="row text-center g-2">
            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <img src="./images/Image 2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Regenerative Agriculture</h5>
                        <p class="card-text">
                            EcoFarm practices regenerative agriculture, enhancing soil health and biodiversity for future. </p>
                        <a href="#" class="btn btn-success" id="subscribe" onclick="subscribe()">Learn More</a>
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
                        <a href="#" class="btn btn-success" id="subscribe" onclick="subscribe()">Learn More</a>
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
                        <a href="#" class="btn btn-success" id="subscribe" onclick="subscribe()">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        <!--Below are database retreival-->
        <div class="row text-center g-2 mt-3">
            <?php foreach ($services as $service) : ?>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="../admin/assets/images/<?php echo $service['image']; ?>" alt="" class="card-img-top" />
                            <h5 class="card-title mt-3"><?php echo $service['title']; ?></h5>
                            <p class="card-text"><?php echo $service['description']; ?></p>
                            <a href="#" class="btn btn-success" id="subscribe" onclick="subscribe()">Learn More</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
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

    <script>
        function subscribe() {
            var subscribe = document.getElementById("subscribe");
            alert("Please Login to your account subscibe");

        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
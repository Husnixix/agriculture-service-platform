<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoFarm-Register</title>
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
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
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

    <div class="container mt-5 bg-light shadow-sm p-5">
        <h2 class="text-center mb-3">REGISTER</h2>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-7 col-md-6 col-lg-5 col-xl-4">
                <?php
                error_reporting(E_ALL);
                // connect database
                include("/xampp/htdocs/EcoFarm/config/connect-database.php");
                // import functions
                include("/xampp/htdocs/EcoFarm/website/includes/function.php");

                if (isset($_POST["submit"])) {
                    $name = $_POST["name"];
                    $number = $_POST["number"];
                    $username = $_POST["username"];
                    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

                    // hold errors
                    $errors = array();

                    // validate phone number length
                    if (strlen($number) != 10) {
                        array_push($errors, "Invalid Phone Number");
                    }

                    // validate duplicate phone number
                    if (checkDuplicate($connection, 'customer', 'phone', $number)) {
                        array_push($errors, "Phone Number already exists");
                    }

                    // validate duplicate username
                    if (checkDuplicate($connection, 'customer', 'username', $username)) {
                        array_push($errors, "Username already exists");
                    }

                    // validate password length
                    if (strlen($_POST["password"]) < 8) {
                        array_push($errors, "Invalid Password");
                    }

                    // handle errors
                    if (!empty($errors)) {

                        //display error message
                        echo '<div class="alert alert-danger">';
                        foreach ($errors as $error) {
                            echo '<strong>Error! </strong>' . $error . '<br>';
                        }
                        echo '</div>';
                        // Refresh page
                        echo '<script>
                                    setTimeout(function() {
                                        window.location.href = "register.php";
                                    }, 2000); // 2000 milliseconds = 2 seconds
                              </script>';
                    } else {

                        // insert to database
                        mysqli_query($connection, "INSERT INTO customer (name, phone, username, password)
                                   VALUES ('$name', '$number', '$username', '$password')");

                        // display success message
                        echo '<div class="alert alert-success">';
                        echo '<strong>Registered Successfully !</strong> Login Now';
                        echo '</div>';

                        // Refresh page
                        echo '<script>
                                setTimeout(function() {
                                    window.location.href = "login.php";
                                }, 1000); // 1000 milliseconds = 1 seconds
                            </script>';
                    }
                }


                ?>

                <form action="register.php" method="post">

                    <div class="mb-3 mt-1">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="number" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="number" placeholder="Enter Your Phone Number" name="number" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter a Username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password must be atleast 8 characters long" name="password" required>
                    </div>
                    <div class="d-grid gap-2">
                        <label for="" class="form-label">Already have an account? <a href="login.php" class="text-success" style="text-decoration: none;">Login</a></label>
                        <button class="btn btn-success" type="submit" name="submit">Sign In</button>
                    </div>
                </form>
                <?php
                // close database connection
                mysqli_close($connection);
                ?>
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
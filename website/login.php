<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoFarm-Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
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


    <div class="container mt-5 bg-light shadow-sm p-5 mb-5">
        <h2 class="text-center mb-3">LOGIN</h2>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-7 col-md-6 col-lg-5 col-xl-4">
                <?php
                error_reporting(E_ALL);
                ini_set('display_errors', 1);

                // Connect to the database
                include("/xampp/htdocs/EcoFarm/config/connect-database.php");
                // Import functions
                include("/xampp/htdocs/EcoFarm/website/includes/function.php");

                if (isset($_POST["submit"])) {
                    $username = mysqli_real_escape_string($connection, $_POST["username"]);
                    $password = $_POST["password"];

                    $query = "SELECT * FROM customer WHERE username = '$username'";
                    $result = mysqli_query($connection, $query);

                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $hashedPassword = $row["password"];

                        // Verify the password
                        if (password_verify($password, $hashedPassword)) {

                            foreach ($row as $userData) {
                                $userID = $row["id"];
                                $userName = $row["name"];
                                $number = $row["phone"];
                                $nickname = $row["username"];
                                $userPassword = $row["password"];
                            }

                            // Store the user's name in a session variable
                            $_SESSION["authenticated"] = true;
                            $_SESSION["authenticatedUser"] = [
                                'user_id' => $userID,
                                'user_name' => $userName,
                                'contact' => $number,
                                'nick_name' => $nickname,
                                'user_password' => $userPassword,
                            ];

                            echo '<div class="alert alert-success">';
                            echo '<strong>Success!</strong> Logged In';
                            echo '</div>';
                            // Refresh page
                            echo '<script>
                                    setTimeout(function() {
                                        window.location.href = "../customer/index.php";
                                    }, 2000); // 2000 milliseconds = 2 seconds
                                </script>';
                        } else {
                            // Incorrect password
                            echo '<div class="alert alert-danger">';
                            echo '<strong>Error!</strong> Incorrect Password';
                            echo '</div>';
                            // Refresh page
                            echo '<script>
                                    setTimeout(function() {
                                        window.location.href = "login.php";
                                    }, 1000); // 1000 milliseconds = 1 seconds
                                </script>';
                        }
                    } else {
                        // Incorrect username
                        echo '<div class="alert alert-danger">';
                        echo '<strong>Error!</strong> Incorrect Username';
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

                <!-- Your HTML form -->
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter Your Username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter Your Password" name="password">
                    </div>

                    <div class="d-grid gap-2">
                        <label for="" class="form-label">Don't have an account? <a href="register.php" class="text-success" style="text-decoration: none;">Register</a></label>
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


    <footer class="container-fluid bg-success text-light p-3 shadow-sm fixed-bottom">
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
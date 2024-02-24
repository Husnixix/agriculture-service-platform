<?php
// Check if the logout parameter is set in the URL
if (isset($_GET['logout']) && $_GET['logout'] == true) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect the user to the login page or any other page after logout
    header("Location: ../website/login.php");
    exit();
}
?>
<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand text-success fs-5" href="#">EcoFarm</a>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="navbarNav" aria-labelledby="navbarNavLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="navbarNavLabel">EcoFarm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="service.php">Services</a></li>
                </ul>
            </div>
        </div>
        <div class="navbar-nav">
            <button class="btn btn-success type=" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <i class="bi bi-person-fill"></i>
            </button>
        </div>
    </div>
</nav>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Customer Dashbaord</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            <!-- Logged User Name -->
            <?php
            // Check if the user is authenticated and their details are stored in the session
            if (isset($_SESSION["authenticatedUser"])) {
                // Display the user's name
                echo '<h6 class="text-center">' . $_SESSION["authenticatedUser"]["user_name"] . '</h6>';
            }
            ?>


        </div>
        <div class="dropdown mt-3">
            <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" style="width: 100%;">
                <i class="bi bi-gear me-2"></i>Settings
            </button>
            <ul class="dropdown-menu mb-1 mt-1">
                <?php

                // Check if the user is authenticated and their details are stored in the session
                if (isset($_SESSION["authenticatedUser"])) {
                    $userID = $_SESSION["authenticatedUser"]["user_id"];
                }

                ?>
                <li><a class="dropdown-item" href="./profile.php?id=<?= $userID ?>"><i class="bi bi-person-lines-fill me-2"></i>Edit Profile</a></li>

                <li><a class="dropdown-item" href="../website/login.php?logout=true"><i class="bi bi-box-arrow-left me-2"></i>Log Out</a></li>
            </ul>
        </div>
    </div>
</div>
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoFarm-Customer-Services</title>
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
        /* Custom styles to fix the profile button alignment */
        @media (min-width: 992px) {
            .navbar .navbar-nav {
                margin-left: auto;
            }
        }

        /* Custom styles for dropdown menu */
        .dropdown-menu-custom {
            max-height: 200px; /* Adjust the maximum height as needed */
            overflow-y: auto;
        }
    </style>

</head>
<body>
    <?php
        include("/xampp/htdocs/EcoFarm/customer/includes/header.php");
        include("/xampp/htdocs/EcoFarm/customer/pages/service.php");
        include("/xampp/htdocs/EcoFarm/customer/includes/footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php
// Check if the logout parameter is set in the URL
if (isset($_GET['logout']) && $_GET['logout'] == true) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect the user to the login page or any other page after logout
    header("Location: ../admin/admin-login.php");
    exit();
}
?>
<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="container">
        <button class="btn btn-success" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <i class="bi bi-list"></i>
        </button>
        <div class="navbar-brand text-success">
            Eco Farm
        </div>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle bg-success" type="button" data-bs-toggle="dropdown">
                <i class="bi bi-person-fill"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-custom">
                <li><a class="dropdown-item" href="admin-login.php?logout=true"><i class="bi bi-box-arrow-left me-2"></i>Log Out</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Admin Dashboard</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            <?php
            // Display Admin name
               if(isset($_SESSION["authenticatedUser"])) {       
                    echo '<h6 class="text-center">' . $_SESSION["authenticatedUser"]["admin_name"] . '</h6>';
                }
            ?>  
        </div>
        <div class="dropdown mt-3">
            <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" style="width: 100%;">
                User
            </button>
            <ul class="dropdown-menu dropdown-menu-custom">
                <li><a class="dropdown-item" href="create-user.php"><i class="bi bi-person-plus-fill me-2"></i>Create</a></li>
                <li><a class="dropdown-item" href="modify-user.php"><i class="bi bi-pencil-square me-2"></i>Modify</a></li>
            </ul>
        </div>
        <div class="dropdown mt-3">
            <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" style="width: 100%;">
                Customer
            </button>
            <ul class="dropdown-menu dropdown-menu-custom">
                <li><a class="dropdown-item" href="modify-customer.php"><i class="bi bi-pencil-square me-2"></i>Modify</a></li>
            </ul>
        </div>
        <div class="dropdown mt-3">
            <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" style="width: 100%;">
                Services
            </button>
            <ul class="dropdown-menu dropdown-menu-custom">
                <li><a class="dropdown-item" href="create-service.php"><i class="bi bi-plus me-2"></i>Create</a></li>
                <li><a class="dropdown-item" href="modify-service.php"><i class="bi bi-pencil-square me-2"></i>Modify</a></li>
            </ul>
        </div>
    </div>
</div>
<?php
// Include database connection
include("/xampp/htdocs/EcoFarm/config/connect-database.php");

// Check if the user is logged in
if(isset($_SESSION["authenticatedUser"])) {
    $userId = $_SESSION["authenticatedUser"]["user_id"];

    // Query to fetch subscribed services for the user
    $query = "SELECT s.* FROM service s JOIN subscriptions sub ON s.id = sub.service_id WHERE sub.user_id = $userId";
    $result = mysqli_query($connection, $query);

    // Array to store subscribed services
    $subscribedServices = [];

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $subscribedServices[] = $row;
        }
    }

    mysqli_free_result($result);
}

// Close database connection
mysqli_close($connection);
?>

<!-- Display subscribed services on the user's homepage -->
<div class="container bg-light mt-5 p-3 rounded">
    <div class="row text-center g-2 mt-3">
        <?php foreach ($subscribedServices as $service): ?>
            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <img src="../admin/assets/images/<?php echo $service['image']; ?>" alt="<?php echo $service['title']; ?>" class="card-img-top"/>
                        <h5 class="card-title mt-3"><?php echo $service['title']; ?></h5>
                        <p class="card-text"><?php echo $service['description']; ?></p>
                       
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

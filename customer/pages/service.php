<?php
// Include database connection
include("/xampp/htdocs/EcoFarm/config/connect-database.php");

// Handle form submission
if (isset($_POST['subscribe'])) {
    // Check if the user is logged in
    if (isset($_SESSION["authenticatedUser"])) {
        $userId = $_SESSION["authenticatedUser"]["user_id"];

        // Check if service_id is set before accessing it
        if (isset($_POST['service_id'])) {
            $serviceId = $_POST['service_id'];

            // Check if the user is already subscribed
            $query = "SELECT * FROM subscriptions WHERE user_id = ? AND service_id = ?";
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, "ii", $userId, $serviceId);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                // User is already subscribed, so unsubscribe
                $unsubscribeQuery = "DELETE FROM subscriptions WHERE user_id = ? AND service_id = ?";
                $stmt = mysqli_prepare($connection, $unsubscribeQuery);
                mysqli_stmt_bind_param($stmt, "ii", $userId, $serviceId);
                if (mysqli_stmt_execute($stmt)) {
                    echo '<div class="alert alert-success alert-dismissible">';
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
                    echo '<strong>Success!</strong> Unsubscribed';
                    echo '</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo 'Error unsubscribing: ' . mysqli_error($connection);
                    echo '</div>';
                }
            } else {
                // User is not subscribed, so subscribe
                $subscribeQuery = "INSERT INTO subscriptions (user_id, service_id) VALUES (?, ?)";
                $stmt = mysqli_prepare($connection, $subscribeQuery);
                mysqli_stmt_bind_param($stmt, "ii", $userId, $serviceId);
                if (mysqli_stmt_execute($stmt)) {
                    echo '<div class="alert alert-info alert-dismissible">';
                    echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
                    echo '<strong>Success!</strong> Subscribed';
                    echo '</div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo 'Error subscribing: ' . mysqli_error($connection);
                    echo '</div>';
                }
            }
        }
    } else {
        // Handle the case when the user is not logged in (optional)
        // You can return an error message or redirect the user to the login page
        echo '<div class="alert alert-warning" role="alert">';
        echo 'User not logged in.';
        echo '</div>';
    }
}

// Fetch services
$query = "SELECT * FROM Service";
$result = mysqli_query($connection, $query);

$services = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $services[] = $row;
    }
}

?>

<div class="container mt-5 bg-light rounded p-3">
    <h2 class="mb-4 text-center">Our Services</h2>
    <p class="text-center">Unlock the potential of sustainable farming with EcoFarm. Subscribe to our services for expert guidance, eco-friendly solutions, and a greener tomorrow. Join us in cultivating a better world, one harvest at a time.</p>
</div>

<div class="container bg-light mt-2 p-3 rounded">
    <div class="row text-center g-2 mt-3">
        <?php foreach ($services as $service) : ?>
            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <img src="../admin/assets/images/<?php echo $service['image']; ?>" alt="" class="card-img-top" />
                        <h5 class="card-title mt-3"><?php echo $service['title']; ?></h5>
                        <p class="card-text"><?php echo $service['description']; ?></p>
                        <form action="" method="post">
                            <input type="hidden" name="service_id" value="<?php echo $service['id']; ?>">
                            <button class="btn btn-success subscribe-btn" name="subscribe" type="submit">
                                <?php
                                // Check if the user is subscribed to this service
                                if (isset($_SESSION["authenticatedUser"])) {
                                    $userId = $_SESSION["authenticatedUser"]["user_id"];
                                    $query = "SELECT * FROM subscriptions WHERE user_id = ? AND service_id = ?";
                                    $stmt = mysqli_prepare($connection, $query);
                                    mysqli_stmt_bind_param($stmt, "ii", $userId, $service['id']);
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);
                                    if (mysqli_num_rows($result) > 0) {
                                        echo "Unsubscribe";
                                    } else {
                                        echo "Subscribe";
                                    }
                                } else {
                                    echo "Subscribe";
                                }
                                ?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php
            // close connection
            mysqli_close($connection);
        endforeach; ?>
    </div>
</div>
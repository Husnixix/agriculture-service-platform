<div class="container mt-5">
    <h2 class="text-center mb-3">Modify Customer</h2>
    <?php
    // Include database connection
    include("/xampp/htdocs/EcoFarm/config/connect-database.php");

    // Handle deletion of customer
    if(isset($_POST["id"])){
        $customerID = $_POST["id"];

        // Delete user records first
        $userRecords = "DELETE FROM subscriptions WHERE user_id = '$customerID'";
        $record = mysqli_query($connection, $userRecords);

        if($record){
                 // Delete customer from database
                $query = "DELETE FROM customer WHERE id = '$customerID'";
                $result = mysqli_query($connection, $query);

                // Check if deletion was successful
                if($result){
                    echo'<div class="alert alert-success">                           
                            <strong>Success! </strong>Customer Deleted
                        </div>';
                    // Refresh
                    echo '<script>
                            setTimeout(function() {
                                window.location.href = "./modify-customer.php";
                            }, 1000); // 1000 milliseconds = 1 seconds
                        </script>';
                }else{
                            echo'<div class="alert alert-danger">                           
                            <strong>Error! </strong>  Could not delete the user records
                        </div>';
                    // Refresh
                    echo '<script>
                            setTimeout(function() {
                                window.location.href = "./modify-customer.php";
                            }, 1000); // 1000 milliseconds = 1 seconds
                        </script>';
                }
        }else{
            echo'<div class="alert alert-danger">                           
                            <strong>Error! </strong>  Could not delete the user records
                        </div>';
                    // Refresh
                    echo '<script>
                            setTimeout(function() {
                                window.location.href = "./modify-customer.php";
                            }, 1000); // 1000 milliseconds = 1 seconds
                        </script>';
        }

       
    }
    ?>
    <div class="row align-items-center">
        <div class="col-12">
            <table class="table table-hover table-bordered text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Username</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Fetch data from database
                    $query = "SELECT * FROM customer";
                    $result = mysqli_query($connection, $query);

                    // Check if there are any customers
                    if(mysqli_num_rows($result) > 0){
                        foreach($result as $data){
                    ?>
                    <tr>
                        <td><?=$data["id"];?></td>
                        <td><?=$data["name"];?></td>
                        <td><?=$data["phone"];?></td>
                        <td><?=$data["username"];?></td>
                        <td>
                            <!-- Form for deleting customer -->
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?= $data["id"]; ?>">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this customer and all associated records? This action cannot be undone.')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                        }
                    }else{
                        // Display message if no customers found
                        echo'<tr>
                                <td colspan="5">
                                    <div class="alert alert-info">
                                        <strong>Message!</strong> No Data found.
                                    </div>
                                </td>
                            </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>      
</div>

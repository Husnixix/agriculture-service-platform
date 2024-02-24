<div class="container mt-5">
    <h2 class="text-center mb-3">Modify User</h2>
    <?php
    include("/xampp/htdocs/EcoFarm/config/connect-database.php");

    if (isset($_POST["id"])) {
        $customerID = $_POST["id"];

        $query = "DELETE FROM admin WHERE id = '$customerID'";
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
            echo'<div class="alert alert-success">                           
                    <strong>Error! </strong> Something Wrong
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
                        <th>Email</th>
                        <th>Usertype</th>
                        <th>Username</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("/xampp/htdocs/EcoFarm/config/connect-database.php");

                    // fetch data from database
                    $query = "SELECT * FROM admin";
                    $result = mysqli_query($connection, $query);

                    // if result has rows fetch data through loop
                    if (mysqli_num_rows($result) > 0) {
                        foreach ($result as $data) {
                    ?>
                            <tr>
                                <td><?= $data["id"]; ?></td>
                                <td><?= $data["name"]; ?></td>
                                <td><?= $data["email"]; ?></td>
                                <td><?= $data["usertype"]; ?></td>
                                <td><?= $data["username"]; ?></td>


                                <td><a href="../admin/update-user.php?id=<?= $data["id"]; ?>" class="btn btn-success">Edit</a></td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="id" value="<?= $data["id"]; ?>">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this customer?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                    <?php

                        }
                    } else {
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
</div>
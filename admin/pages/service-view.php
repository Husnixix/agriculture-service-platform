     <div class="container mt-5">
         <h2 class="text-center mb-3">Service Modify</h2>
         <?php
            // Enable error reporting
            error_reporting(E_ALL);

            // Include database connection
            include("/xampp/htdocs/EcoFarm/config/connect-database.php");

            if (isset($_POST["id"])) {
                $serviceID = $_POST["id"];

                // Fetch the image filename from the database
                $query = "SELECT image FROM service WHERE id = '$serviceID'";
                $result = mysqli_query($connection, $query);
                $data = mysqli_fetch_assoc($result);
                $imageFilename = $data['image'];

                // Delete the image file from the server
                $imagePath = "/xampp/htdocs/EcoFarm/admin/assets/images/" . $imageFilename;
                if (file_exists($imagePath)) {
                    unlink($imagePath); // Deletes the file from the server
                }

                // Proceed with deleting the service record from the database
                $deleteQuery = "DELETE FROM service WHERE id = '$serviceID'";
                $deleteResult = mysqli_query($connection, $deleteQuery);

                // Check if deletion was successful
                if ($deleteResult) {
                    echo '<div class="alert alert-success">                           
                                <strong>Success! </strong>Service Deleted
                            </div>';
                    // Refresh
                    echo '<script>
                            setTimeout(function() {
                                window.location.href = "./modify-service.php";
                            }, 1000); // 1000 milliseconds = 1 seconds
                        </script>';
                } else {
                    echo '<div class="alert alert-success">                           
                            <strong>Error! </strong> Something went wrong
                        </div>';
                    // Refresh
                    echo '<script>
                            setTimeout(function() {
                                window.location.href = "./modify-service.php";
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
                             <th>Image</th>
                             <th>Title</th>
                             <th>Description</th>
                             <th>Delete</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php
                            // fetch data from database
                            $query = "SELECT * FROM service";
                            $result = mysqli_query($connection, $query);
                            // Define the location where images are stored
                            $location = "http://localhost/EcoFarm/admin/assets/images/";

                            // if result has rows fetch data through loop
                            if (mysqli_num_rows($result) > 0) {
                                foreach ($result as $data) {
                                    $imagePath = $location . $data['image'];
                            ?>
                                 <tr>
                                     <td><?= $data["id"]; ?></td>
                                     <td><img src="<?= $imagePath; ?>" style="height: 100px; width: 150px;"></td>
                                     <td><?= $data["title"]; ?></td>
                                     <td><?= $data["description"]; ?></td>
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
                                // Display error message
                                echo '<tr>
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
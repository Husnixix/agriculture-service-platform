<div class="container mt-5 bg-light shadow-sm p-3">
    <h2 class="text-center">Service Creation</h2>
    <div class="row justify-content-center">
        <div class="col-12 col-sm-7 col-md-6 col-lg-5 col-xl-4">
            <?php
            // Enable error reporting
            error_reporting(E_ALL);

            // Include database connection
            include("/xampp/htdocs/EcoFarm/config/connect-database.php");

            // Include functions
            include("/xampp/htdocs/EcoFarm/website/includes/function.php");

            // Check if the form is submitted
            if (isset($_POST["submit"])) {
                $title = trim($_POST["title"]);
                $description = trim($_POST["description"]);

                $errors = array();

                // Validate title length
                if (mb_strlen(trim($title)) > 22) {
                    array_push($errors, "Title should be less than 22 characters.");
                }
                if (checkDuplicate($connection, 'service', 'title', $title)) {
                    array_push($errors, "Title already exists.");
                }

                // Validate description length
                if (mb_strlen(trim($description)) > 75) {
                    array_push($errors, "Description should be less than 75 characters.");
                }

                // If there are no errors, move image and insert data into database
                if (empty($errors)) {
                    // Image upload
                    if (isset($_FILES["image"])) {
                        $allowedTypes = ["png", "jpg", "jpeg"];
                        $fileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));

                        if (in_array($fileType, $allowedTypes) && $_FILES["image"]["size"] <= 5242880) {
                            $location = "/xampp/htdocs/EcoFarm/admin/assets/images/";
                            $fileName = time() . "." . $fileType;

                            if (move_uploaded_file($_FILES["image"]["tmp_name"], $location . $fileName)) {
                                // Insert data into database
                                $query = "INSERT INTO service (image, title, description) VALUES ('$fileName', '$title', '$description')";
                                if (mysqli_query($connection, $query)) {
                                    // Display success message
                                    echo '<div class="alert alert-success">';
                                    echo    'strong>Success !</strong> Service created';
                                    echo '</div>';
                                    // Refresh page
                                    echo '<script>
                                            setTimeout(function() {
                                                window.location.href = "./modify-service.php";
                                            }, 1000); // 1000 milliseconds = 1 seconds
                                         </script>';
                                } else {
                                    // Display error message if database insertion fails
                                    array_push($errors, "Error inserting service details into database: " . mysqli_error($connection));
                                }
                            } else {
                                // Display error message if moving uploaded image file fails
                                array_push($errors, "Failed to move uploaded image file.");
                            }
                        } else {
                            // Display error message if image format or size is invalid
                            array_push($errors, "Invalid image format or size. Please upload a PNG, JPG, or JPEG file less than 5 MB");
                        }
                    }
                }

                // Display errors
                if (!empty($errors)) {
                    echo '<div class="alert alert-danger">';
                    foreach ($errors as $error) {
                        echo '<strong>Error !</strong>' . $error . '<br>';
                    }
                    echo '</div>';
                    // Refresh page
                    echo '<script>
                            setTimeout(function() {
                                window.location.href = "./create-service.php";
                            }, 2000); // 2000 milliseconds = 2 seconds
                        </script>';
                }
            }
            ?>


            <form action="" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="" class="form-label">Choose Image</label>
                    <input type="file" class="form-control" name="image" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Service Title</label>
                    <input type="text" class="form-control" name="title" required placeholder="Title should be less than 22 characters">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                    <textarea class="form-control" id="" rows="3" name="description" placeholder="Description should be less than 75 characters" required></textarea>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-success btn-block" name="submit">Create</button>
                </div>

            </form>
        </div>
    </div>
</div>
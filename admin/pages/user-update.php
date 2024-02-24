<div class="container mt-3 bg-light shadow-sm p-3">
    <h2 class="text-center">User Creation</h2>
    <div class="row justify-content-center">
        <div class="col-12 col-sm-7 col-md-6 col-lg-5 col-xl-4">
            <?php
            // Error Reporting
            error_reporting(E_ALL);

            // Database Connection
            include("/xampp/htdocs/EcoFarm/config/connect-database.php");

            // Functions
            include("/xampp/htdocs/EcoFarm/website/includes/function.php");

            // Initialize Variables
            $user = array();
            $errors = array();

            // Fetch User Details
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $query = "SELECT * FROM admin WHERE id = '$id'";
                $result = mysqli_query($connection, $query);

                if (mysqli_num_rows($result) > 0) {
                    $user = mysqli_fetch_assoc($result);
                }
            }

            // Form Submission
            if (isset($_POST["submit"])) {
                // Retrieve Form Data
                $name = $_POST["name"];
                $email = $_POST["email"];
                $usertype = $_POST["usertype"];
                $username = $_POST["username"];
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

                // Validate Data
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "Invalid email";
                }

                if (checkDuplicate($connection, 'admin', 'email', $email)) {
                    $errors[] = "Email already exists";
                }

                if (checkDuplicate($connection, 'admin', 'username', $username)) {
                    $errors[] = "Username already exists";
                }

                if (strlen($_POST["password"]) < 8) {
                    $errors[] = "Password must be at least 8 characters long";
                }

                // Handle Errors
                if (!empty($errors)) {
                    echo '<div class="alert alert-danger">';
                    foreach ($errors as $error) {
                        echo '<strong>Error! </strong>' . $error . '<br>';
                    }
                    echo '</div>';
                    // Refresh page
                    echo '<script>
                                setTimeout(function() {
                                    window.location.href = "./update-user.php";
                                }, 1000); // 1000 milliseconds = 1 seconds
                            </script>';
                } else {
                    // Update User
                    mysqli_query($connection, "UPDATE admin SET name='$name', usertype ='$usertype', email='$email', password='$password' WHERE id ='$id'");

                    // display success message
                    echo '<div class="alert alert-success alert-dismissible">';
                    echo '<strong>Success !</strong> User Updated';
                    echo '</div>';
                    // Refresh page
                    echo '<script>
                                setTimeout(function() {
                                    window.location.href = "./modify-user.php";
                                }, 1000); // 1000 milliseconds = 1 seconds
                            </script>';
                }
            }
            ?>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Your Name" value="<?= $user["name"] ?? '' ?>" name="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter Your Email" value="<?= $user["email"] ?? '' ?>" name="email">
                </div>
                <div class="mb-3">
                    <label for="usertype" class="form-label">User Type</label>
                    <select class="form-select" id="usertype" aria-label="Select User Type" name="usertype">
                        <option value="Admin" <?= ($user["usertype"] ?? '') === 'Admin' ? 'selected' : '' ?>>Admin</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter a Username" value="<?= $user["username"] ?? '' ?>" name="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter Password" value="<?= $user["password"] ?? '' ?>" name="password">
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-success" type="submit" name="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
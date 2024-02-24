<div class="container mt-5 bg-light shadow-sm p-5 mb-5">
    <h2 class="text-center mb-3">LOGIN</h2>
    <div class="row justify-content-center">
        <div class="col-12 col-sm-7 col-md-6 col-lg-5 col-xl-4">
            <?php
            // Include database connection
            include("/xampp/htdocs/EcoFarm/config/connect-database.php");

            if (isset($_POST["submit"])) {
                $email = mysqli_real_escape_string($connection, $_POST["email"]);
                $password = $_POST["password"];

                $query = "SELECT * FROM admin WHERE email = '$email'";
                $result = mysqli_query($connection, $query);

                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $hashedPassword = $row["password"];

                    // Verify the password using password_verify
                    if (password_verify($password, $hashedPassword)) {
                        // Store user data in session
                        $_SESSION["authenticated"] = true;
                        $_SESSION["authenticatedUser"] = [
                            'admin_id' => $row["id"],
                            'admin_name' => $row["name"],
                            'admin_email' => $row["email"],
                        ];
                        echo '<div class="alert alert-success">';
                        echo '<strong>Success !</strong> Logged In';
                        echo '</div>';

                        echo '<script>
                                setTimeout(function() {
                                    window.location.href = "./index.php";
                                }, 1000); // 1000 milliseconds = 1 seconds
                            </script>';
                    } else {
                        // Incorrect password
                        echo '<div class="alert alert-danger">';
                        echo '<strong>Error !</strong> Incorrect Password';
                        echo '</div>';
                        // Refresh page
                        echo '<script>
                                setTimeout(function() {
                                    window.location.href = "./admin-login.php";
                                }, 1000); // 1000 milliseconds = 1 seconds
                            </script>';
                    }
                } else {
                    // Incorrect username
                    echo '<div class="alert alert-danger">';
                    echo '<strong>Error !</strong> Incorrect Email';
                    echo '</div>';

                    // Refresh page
                    echo '<script>
                            setTimeout(function() {
                                window.location.href = "./admin-login.php";
                            }, 1000); // 1000 milliseconds = 1 seconds
                         </script>';
                }
            }

            // Close database connection
            mysqli_close($connection);
            ?>

            <!-- Login form -->
            <form action="admin-login.php" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Password" name="password" required>
                </div>

                <div class="d-grid gap-2">
                    <button class="btn btn-success" type="submit" name="submit">Sign In</button>
                </div>
            </form>
        </div>
    </div>
</div>
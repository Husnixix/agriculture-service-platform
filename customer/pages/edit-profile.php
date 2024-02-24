<div class="container mt-5 bg-light shadow-sm p-5">
    <h2 class="text-center mb-3">Edit Profile</h2>
    <div class="row justify-content-center">
        <div class="col-12 col-sm-7 col-md-6 col-lg-5 col-xl-4">
            <?php
                error_reporting(E_ALL);
                
                // Connect to the database
                include("/xampp/htdocs/EcoFarm/config/connect-database.php");
                // Import Functions
                include("/xampp/htdocs/EcoFarm/website/includes/function.php");

                // Retrieve user data if user_id is set
                if(isset($_GET["user_id"])){
                    $userID = $_GET["user_id"];

                    $query = "SELECT * FROM customer WHERE id = '$userID'";
                    $result = mysqli_query($connection, $query);

                    if(mysqli_num_rows($result) > 0){
                        $userData = mysqli_fetch_assoc($result);
                        echo $_SESSION["authenticatedUser"]["password"] ?? 'Password not set';

                        // Ensure $userData is initialized
                        if($userData) {
                            $_SESSION["authenticatedUser"] = [
                                'user_id'=>$userID,
                                'user_name'=>$userName,
                                'contact'=>$number,
                                'nick_name'=>$nickname,
                                'user_password'=>$userPassword,
                            ];
                        }
                    }
                }

                // Handle form submission
                if(isset($_POST["submit"])){
                    $name = $_POST["name"];
                    $number = $_POST["number"];
                    $username = $_POST["username"];
                    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

                    // Hold errors
                    $errors = array();

                    // Validate phone number length
                    if(strlen($number) != 10){
                        array_push($errors, "Invalid Phone Number");
                    }

                    // Validate duplicate phone number
                    if(checkDuplicate($connection, 'customer', 'phone', $number)){
                        array_push($errors, "Phone Number already exists");
                    }

                    // Validate duplicate username
                    if(checkDuplicate($connection, 'customer', 'username', $username)){
                        array_push($errors, "Username already exists");
                    }

                    // Validate password length
                    if(strlen($_POST["password"]) < 8){
                        array_push($errors, "Invalid Password");
                    }

                    // Handle errors
                    if(!empty($errors)){
                        // Display error message
                        echo '<div class="alert alert-danger">';
                        foreach($errors as $error){
                            echo '<strong>Error! </strong>'.$error.'<br>';
                        }
                        echo '</div>';

                        // Redirect after 2 seconds
                        echo '<script>
                                setTimeout(function() {
                                    window.location.href = "./profile.php";
                                }, 2000); // 2000 milliseconds = 2 seconds
                              </script>';               
                    }
                    else{
                        // Update user profile in the database
                        mysqli_query($connection, "UPDATE customer SET name='$name', phone ='$number', username='$username', password='$password' WHERE id ='$userID'");

                        // Display Success Message
                        echo '<div class="alert alert-success">';
                        echo '<strong>Success!</strong> User Updated';
                        echo '</div>';

                        // Redirect after 2 seconds
                        echo '<script>
                                setTimeout(function() {
                                    window.location.href = "./index.php";
                                }, 2000); // 2000 milliseconds = 2 seconds
                              </script>'; 
                    }
                }
            ?>

            <form action="" method="post">
                <div class="mb-3 mt-1">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" value="<?= $_SESSION["authenticatedUser"]["user_name"] ?? '' ?>" name="name" readonly >
                </div>
                <div class="mb-3">
                    <label for="number" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="number" value="<?= $_SESSION["authenticatedUser"]["contact"] ?? '' ?>" name="number">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Username</label>
                    <input type="username" class="form-control" id="username" value="<?= $_SESSION["authenticatedUser"]["nick_name"] ?? '' ?>" name="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" value="<?= $_SESSION["authenticatedUser"]["user_password"] ?? '' ?>" name="password">
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-success" type="submit" name="submit">Update Profile</button>
                </div>
            </form>
            <?php 
                // Close database connection
                mysqli_close($connection);
            ?>
        </div>
    </div>
</div>

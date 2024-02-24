<div class="container mt-3 bg-light shadow-sm p-3">
  <h2 class="text-center">User Creation</h2>
  <div class="row justify-content-center">
    <div class="col-12 col-sm-7 col-md-6 col-lg-5 col-xl-4">
      <?php
      error_reporting(E_ALL);
      // connect database
      include("/xampp/htdocs/EcoFarm/config/connect-database.php");
      // import functions
      include("/xampp/htdocs/EcoFarm/website/includes/function.php");

      if (isset($_POST["submit"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $usertype = $_POST["usertype"];
        $username = $_POST["username"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        // hold errors
        $errors = array();

        // validate phone number length
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          array_push($errors, "Invalid email");
        }

        // validate duplicate phone number
        if (checkDuplicate($connection, 'admin', 'email', $email)) {
          array_push($errors, "email already exists");
        }

        // validate duplicate username
        if (checkDuplicate($connection, 'admin', 'username', $username)) {
          array_push($errors, "Username already exists");
        }

        // validate password length
        if (strlen($_POST["password"]) < 8) {
          array_push($errors, "Invalid Password");
        }

        // handle errors
        if (!empty($errors)) {

          //display error message
          echo '<div class="alert alert-danger">';
          foreach ($errors as $error) {
            echo '<strong>Error! </strong>' . $error . '<br>';
          }
          echo '</div>';
          // Refresh page
          echo '<script>
                    setTimeout(function() {
                        window.location.href = "./create-user.php";
                    }, 2000); // 2000 milliseconds = 2 seconds
                </script>';
        } else {

          // insert to database
          mysqli_query($connection, "INSERT INTO admin (name, email, usertype, username, password)
                                   VALUES ('$name', '$email', '$usertype', '$username', '$password')");

          // display success message
          echo '<div class="alert alert-success alert-dismissible">';
          echo '<strong>Success !</strong> User created';
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
          <label for="" class="form-label">Name</label>
          <input type="text" class="form-control" id="" placeholder="Enter Name" name="name" required>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Email</label>
          <input type="email" class="form-control" id="" placeholder="Enter Email" name="email" required>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Select</label>
          <select class="form-select" aria-label="Default select example" name="usertype" required>
            <option selected>Choose Usertype</option>
            <option value="Admin">Admin</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Username</label>
          <input type="text" class="form-control" id="" placeholder="Enter a Username" name="username" required>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Password</label> 
          <input type="password" class="form-control" id="" placeholder="Password must be atleast 8 characters long" name="password" required>
        </div>
        <div class="d-grid gap-2">
          <button class="btn btn-success" type="submit" name="submit">Create User</button>
        </div>
      </form>
    </div>
  </div>
</div>
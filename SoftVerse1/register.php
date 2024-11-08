<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php 
              require "koneksi.php"; // Pastikan file koneksi Anda benar

              if(isset($_POST['submit'])){
                  $username = mysqli_real_escape_string($conn, $_POST['username']);
                  $email = mysqli_real_escape_string($conn, $_POST['email']);
                  $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password

                  // Verifying the unique email
                  $verify_query = mysqli_query($conn, "SELECT Email FROM user WHERE Email='$email'");

                  if (!$verify_query) {
                      die("Error in query: " . mysqli_error($conn));
                  }

                  if(mysqli_num_rows($verify_query) > 0){
                      echo "<div class='message'>
                              <p>This email is used, Try another One Please!</p>
                          </div> <br>";
                      echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
                  } else {
                      $insert_query = mysqli_query($conn, "INSERT INTO user(Username, Email, Password) VALUES('$username', '$email', '$password')");
                      if (!$insert_query) {
                          die("Error Occurred: " . mysqli_error($conn));
                      }

                      echo "<div class='message'>
                              <p>Registration successfully!</p>
                          </div> <br>";
                      echo "<a href='index.php'><button class='btn'>Login Now</button></a>";
                  }

              } else {
            ?>
            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already a member? <a href="index.php">Sign In</a>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</body>
</html>
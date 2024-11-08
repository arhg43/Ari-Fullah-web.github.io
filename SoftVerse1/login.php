<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php 
            require "koneksi.php"; // Pastikan file koneksi Anda benar

            if (isset($_POST['submit'])) {
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);

                // Cek jika login menggunakan akun admin
                if ($email == 'admin@gmail.com' && $password == '12345678') {
                    $_SESSION['valid'] = $email;
                    $_SESSION['username'] = 'admin';
                    $_SESSION['id_user'] = 1; // Sesuaikan ID untuk admin atau buat ID khusus untuk admin jika perlu

                    // Redirect ke halaman crud.php jika login sebagai admin
                    header("Location: crud.php");
                    exit();
                }

                // Mengambil data user berdasarkan email
                $result = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'") or die("Select Error: " . mysqli_error($conn));
                $row = mysqli_fetch_assoc($result);

                // Memeriksa apakah email ada di database dan mencocokkan password yang di-hash
                if ($row && password_verify($password, $row['password'])) { // Pastikan nama kolom sesuai
                    $_SESSION['valid'] = $row['email']; // Menggunakan email
                    $_SESSION['username'] = $row['username']; // Menggunakan username
                    $_SESSION['id_user'] = $row['id_user']; // Menggunakan id_user
                    
                    // Redirect ke halaman home setelah berhasil login
                    header("Location: index.php");
                    exit();
                } else {
                    echo "<div class='message'>
                          <p>Email atau Password salah</p>
                          </div><br>";
                }
            } 
            ?>

            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login">
                </div>
                <div class="links">
                    Don't have an account? <a href="register.php">Sign Up Now</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

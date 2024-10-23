<?php
session_start();
require "koneksi.php";

if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $query = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) === 1) {
    $user = mysqli_fetch_assoc($result);

    if (password_verify($password, $user['password'])) {
      $_SESSION['login'] = true; 
      if ($user['role'] === 'Admin') {
        $_SESSION['role'] = 'admin';
        echo "
        <script>
          alert('Login berhasil! Selamat datang Admin.');
          document.location.href = 'feedback.php';
        </script>
        ";
      } else {
        $_SESSION['role'] = 'user'; 
        echo "
        <script>
          alert('Login berhasil! Selamat datang User.');
          document.location.href = 'index.php';
        </script>
        ";
      }
    } else {
      echo "
      <script>
        alert('Password salah!');
      </script>
      ";
    }
  } else {
    echo "
    <script>
      alert('Username tidak ditemukan!');
    </script>
    ";
  }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | Pendataan form feedback</title>

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="styles.css" />


</head>

<body>
  <section class="login-card">
    <hgroup>
      <h1 class="login-title">Login Admin</h1>
      <p class="login-description">Silakan login untuk mengelola website</p>
    </hgroup>

    <form action="" method="post" class="login-form-container">
      <div class="login-form-group">
        <label for="username" class="login-form-title">Username</label>
        <input
          type="text"
          placeholder="Username"
          name="username"
          id="username"
          class="login-form-input" />
      </div>

      <div class="login-form-group">
        <label for="password" class="login-form-title">Password</label>
        <input
          type="password"
          placeholder="Password"
          name="password"
          id="password"
          class="login-form-input" />
      </div>

      <button type="submit" name="submit" class="login-button">LOGIN</button>
    </form>
  </section>

  <script src="/scripts/script.js"></script>
</body>

</html>
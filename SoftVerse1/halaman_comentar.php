<?php
session_start();
require 'koneksi.php';

// Ambil ID aplikasi dari URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$id_user = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : null; // Pastikan user sudah login dan session id_user tersedia

// Tambah komentar
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comment'])) {
    if ($id_user) {
        $rating = (int)$_POST['rating'];
        $comment = $conn->real_escape_string($_POST['comment']);
        $sql = "INSERT INTO comments (id_user, id, rating, comment) VALUES ('$id_user', '$id', '$rating', '$comment')";
        $conn->query($sql);
    } else {
        echo "<script>alert('Anda harus login untuk memberikan komentar.');</script>";
    }
}

// Ambil komentar dan rating dari database
$sql_comments = "SELECT c.*, u.username FROM comments c JOIN user u ON c.id_user = u.id_user WHERE c.id = $id ORDER BY c.id_comments DESC";
$result_comments = $conn->query($sql_comments);

// Ambil data aplikasi
$sql_app = "SELECT * FROM crud WHERE id = $id";
$result_app = $conn->query($sql_app);
$app_data = $result_app->fetch_assoc();

if (!$app_data) {
    die("Aplikasi dengan ID $id tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Komentar untuk <?php echo htmlspecialchars($app_data['nama_software']); ?></title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="styles/index.css" />
    <link rel="stylesheet" href="styles/comen.css" />
</head>
<body>
    <div class="container">
      <!-- Nav bar -->
      <nav>
        <div class="left_nav">
          <img src="images/logo3.png" alt="SoftVerse Logo" class="logo" />
          <ul class="nav_menu" id="navMenu">
            <li><a href="index.php">HOME</a></li>
          </ul>
        </div>
        <div class="right_nav">
          <div class="cart_icon"></div>
          <div class="dark_mode_toggle" id="darkModeToggle">
            <i class="bx bx-sun"></i>
          </div>
          <div class="hamburger" id="hamburger" aria-label="Toggle menu">
            <i class="bx bx-menu"></i>
          </div>
        </div>
      </nav>

<h1>Komentar untuk <?php echo htmlspecialchars($app_data['nama_software']); ?></h1>

<h2>Rating</h2>
<form method="POST">
    <label>
        <input type="radio" name="rating" value="1" required> 1
    </label>
    <label>
        <input type="radio" name="rating" value="2"> 2
    </label>
    <label>
        <input type="radio" name="rating" value="3"> 3
    </label>
    <label>
        <input type="radio" name="rating" value="4"> 4
    </label>
    <label>
        <input type="radio" name="rating" value="5"> 5
    </label>
    <br>
    <textarea name="comment" placeholder="Tulis komentar di sini..." required></textarea>
    <br>
    <button type="submit">Kirim Komentar</button>
</form>

<h2>Komentar Pengguna Lain</h2>
<?php if ($result_comments->num_rows > 0): ?>
    <ul>
        <?php while ($row = $result_comments->fetch_assoc()): ?>
            <li class="comment-container">
                <div class="avatar">👤</div>
                <div class="user-info">
                    <span class="user-name"><?php echo htmlspecialchars($row['username']); ?></span> <!-- Menampilkan nama pengguna -->
                    <span class="comment-date"><?php echo date("d M Y", strtotime($row['comment_date'])); ?></span>
                    <div class="comment-content">
                        <strong>Rating: <?php echo $row['rating']; ?></strong><br>
                        <?php echo htmlspecialchars($row['comment']); ?>
                    </div>
                </div>
            </li>
        <?php endwhile; ?>
    </ul>
<?php else: ?>
    <p>Tidak ada komentar.</p>
<?php endif; ?>
</body>
</html>
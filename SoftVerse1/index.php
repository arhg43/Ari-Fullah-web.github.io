<?php
session_start(); // Memulai sesi

require "koneksi.php"; // Pastikan file koneksi Anda benar

// Ambil input pencarian dari user
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

// Query untuk mengambil data dari tabel CRUD dengan pencarian
$sql = mysqli_query($conn, "SELECT * FROM crud WHERE nama_software LIKE '%$searchQuery%'");

$softwares = [];
while ($row = mysqli_fetch_assoc($sql)) {
    $softwares[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SoftVerse</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="styles/index.css" />
    <link rel="stylesheet" href="styles/home.css" />
</head>
<body>
    <div class="container">
        <!-- Nav bar -->
        <nav>
            <div class="left_nav">
                <img src="images/logo3.png" alt="SoftVerse Logo" class="logo" />
                <ul class="nav_menu" id="navMenu">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="about.html">ABOUT US</a></li>
                    <?php if (isset($_SESSION['username'])): ?>
                        <!-- Jika user sudah login, tampilkan username dan tombol logout -->
                        <p class="welcome-message">Selamat datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
                        <a href="logout.php" class="logout-btn">Logout</a>
                    <?php else: ?>
                        <!-- Jika user belum login, tampilkan tombol login -->
                        <li><a href="login.php">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="right_nav">
                <div class="dark_mode_toggle" id="darkModeToggle">
                    <i class="bx bx-sun"></i>
                </div>
                <div class="hamburger" id="hamburger" aria-label="Toggle menu">
                    <i class="bx bx-menu"></i>
                </div>
            </div>
        </nav>

        <!-- Main Section -->
        <div class="main_section">
            <div class="main_left">
                <h1>SoftVerse</h1>
                <p class="deskripsi">"Selamat datang di Softverse, platform terlengkap untuk solusi perangkat lunak gratis. Temukan berbagai aplikasi yang dirancang untuk memenuhi kebutuhan pribadi maupun bisnis Anda, tanpa biaya dan tanpa batasan."</p>
                <button class="button" onclick="window.location.href='#software_section'">Lihat Software</button>
            </div>
            <div class="main_right">
                <img src="images/apps.png" class="featured_img" />
            </div>
        </div>

        <div class="list-software" style="text-align: center; margin-top: 300px; font-size: 20px; font-weight: bold;">
            <p>List Software</p>
        </div>

        <!-- Pencarian Software -->
        <div class="search_section">
            <form action="" method="GET" class="search-form">
                <input type="text" name="search" placeholder="Cari software..." value="<?php echo htmlspecialchars($searchQuery); ?>" />
                <button type="submit">Cari</button>
            </form>
        </div>

        <!-- Software Section -->
        <div class="main_section" id="software_section">
            <div class="software_container">
                <?php if (!empty($softwares)): ?>
                    <?php foreach ($softwares as $software): ?>
                        <div class="software_card" onclick="showDetails(<?php echo $software['id']; ?>)">
                            <div class="software_image">
                                <?php if ($software['foto']): ?>
                                    <img src="uploads/<?php echo htmlspecialchars($software['foto']); ?>" alt="<?php echo htmlspecialchars($software['nama_software']); ?>" />
                                <?php else: ?>
                                    <p>Tidak ada gambar</p>
                                <?php endif; ?>
                            </div>
                            <p class="software_name"><?php echo htmlspecialchars($software['nama_software']); ?></p>
                        </div>

                        <!-- Detail Modal -->
                        <div class="software_detail" id="detail-<?php echo $software['id']; ?>">
                            <span class="close" onclick="closeDetails(<?php echo $software['id']; ?>)">&times;</span>
                            <h2><?php echo htmlspecialchars($software['nama_software']); ?></h2>
                            <p><strong>Tanggal Upload:</strong> <?php echo htmlspecialchars($software['tanggal_uploads']); ?></p>
                            <p><strong>Deskripsi:</strong> <?php echo htmlspecialchars($software['deskripsi']); ?></p>
                            <p><strong>Versi:</strong> <?php echo htmlspecialchars($software['versi']); ?></p>
                            <p><strong>File:</strong> 
                                <?php if ($software['file']): ?>
                                    <a href="uploads/<?php echo htmlspecialchars($software['file']); ?>" download>Unduh</a>
                                <?php else: ?>
                                    Tidak ada file
                                <?php endif; ?>
                            </p>
                            <!-- Tombol Lihat Komentar -->
                            <p>
                                <a href="halaman_comentar.php?id=<?php echo $software['id']; ?>" class="button">Lihat Komentar</a>
                            </p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Tidak ada data tersedia.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <p>&copy; 2024 SoftVerse. All rights reserved.</p>
        </footer>
    </div>
    <script src="script.js"></script>
</body>
</html>

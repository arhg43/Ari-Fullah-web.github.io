<?php 
session_start();

// Memeriksa apakah pengguna sudah login sebagai admin
if (!isset($_SESSION['valid']) || $_SESSION['valid'] !== 'admin@gmail.com') {
    // Jika tidak login sebagai admin, alihkan ke halaman login
    header("Location: login.php");
    exit();
}

require "koneksi.php";

// Ambil input pencarian dari user
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

// Modifikasi query SQL untuk pencarian
$sql = mysqli_query($conn, "SELECT * FROM crud WHERE nama_software LIKE '%$searchQuery%' ORDER BY tanggal_uploads DESC");

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
    <title>CRUD ADMIN</title>
    <link rel="stylesheet" href="styles/crud.css">
</head>
<body>

<main class="crud-section">
    <h1 class="crud-title">CRUD ADMIN</h1>
    <div class="container">
        <a href="index.php" class="back">Kembali</a>
        <form action="" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Cari software..." value="<?php echo htmlspecialchars($searchQuery); ?>" />
            <button type="submit" class="search-button">Cari</button>
        </form>
        <a href="tambah.php" class="tambah">Tambah Software</a>
    </div>

    <table class="table-Software">
        <thead>
            <tr class="table-Software-row">
                <th class="table-software-header">No</th>
                <th class="table-software-header">Foto</th>
                <th class="table-software-header">Nama Software</th>
                <th class="table-software-header">Tanggal Uploads</th>
                <th class="table-software-header">Deskripsi</th>
                <th class="table-software-header">Versi</th>
                <th class="table-software-header">File</th>
                <th class="table-software-header">Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($softwares)): ?>
                <?php $i = 1; foreach ($softwares as $software): ?>
                    <tr class="table-software-row">
                        <td class="table-software-data"><?php echo $i; ?></td>
                        <td class="table-software-data">
                            <img src="uploads/<?php echo htmlspecialchars($software['foto']); ?>" alt="<?php echo htmlspecialchars($software['nama_software']); ?>" style="width: 50px; height: auto;">
                        </td>
                        <td class="table-software-data"><?php echo htmlspecialchars($software['nama_software']); ?></td>
                        <td class="table-software-data"><?php echo htmlspecialchars($software['tanggal_uploads']); ?></td>
                        <td class="table-software-data"><?php echo htmlspecialchars($software['deskripsi']); ?></td>
                        <td class="table-software-data"><?php echo htmlspecialchars($software['versi']); ?></td>
                        <td class="table-software-data">
                            <?php if ($software['file']): ?>
                                <a href="uploads/<?php echo htmlspecialchars($software['file']); ?>" download>Unduh File</a>
                            <?php else: ?>
                                Tidak ada file
                            <?php endif; ?>
                        </td>
                        <td class="table-software-data">
                            <div class="button-UD">
                                <a href="edit.php?nama_software=<?php echo urlencode($software['nama_software']); ?>" class="edit-data" title="Edit software">
                                    <i class="fa-solid fa-pen" style="color: #ffffff;"></i>
                                    <span>Edit</span>
                                </a>
                                <a href="hapus.php?nama_software=<?php echo urlencode($software['nama_software']); ?>" class="hapus-data" title="Hapus software" onclick="return confirm('Yakin ingin menghapus data ini?');">
                                    <i class="fa-solid fa-trash-can" style="color: #ffffff;"></i>
                                    <span>Hapus</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php $i++; endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="table-software-data">Tidak ada data tersedia.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</main>

<script src="script.js"></script>
</body>
</html>

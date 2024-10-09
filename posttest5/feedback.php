<?php
require "koneksi.php";

// Mengambil data dari database
$sql = mysqli_query($conn, "SELECT * FROM daftar_pengisi_feedback");

$feedbacks = [];
while ($row = mysqli_fetch_assoc($sql)) {
    $feedbacks[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulir Feedback</title>
    <link rel="stylesheet" href="base.css" />
    <link rel="stylesheet" href="home.css" />
    <link rel="stylesheet" href="admin.css">
</head>
<body>

<main class="feedback-section">
    <h1 class="feedback-title">Formulir Feedback</h1>
    <div class="container">
        <a href="tambah.php" class="button">
            <button class="tambah">Tambah Feedback</button>
        </a>
        <a href="index.php" class="button">
            <button class="back">Kembali</button>
        </a>
    </div>

    <table class="table-feedback">
        <thead>
            <tr class="table-feedback-row">
                <th class="table-feedback-header">No</th>
                <th class="table-feedback-header">No HP</th>
                <th class="table-feedback-header">Nama</th>
                <th class="table-feedback-header">Gmail</th>
                <th class="table-feedback-header">Tanggal</th>
                <th class="table-feedback-header">Saran</th>
                <th class="table-feedback-header">Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($feedbacks)): ?>
                <?php $i = 1; foreach ($feedbacks as $feedback): ?>
                    <tr class="table-feedback-row">
                        <td class="table-feedback-data"><?php echo $i; ?></td>
                        <td class="table-feedback-data"><?php echo htmlspecialchars($feedback['no_hp']); ?></td>
                        <td class="table-feedback-data"><?php echo htmlspecialchars($feedback['nama']); ?></td>
                        <td class="table-feedback-data"><?php echo htmlspecialchars($feedback['gmail']); ?></td>
                        <td class="table-feedback-data"><?php echo htmlspecialchars($feedback['tanggal']); ?></td>
                        <td class="table-feedback-data"><?php echo htmlspecialchars($feedback['saran']); ?></td>
                        <td class="table-feedback-data">
                            <div class="button-UD">
                                <a href="edit.php?no_hp=<?php echo urlencode($feedback['no_hp']); ?>" class="edit-data" title="Edit Feedback">
                                    <i class="fa-solid fa-pen" style="color: #ffffff;"></i>
                                    <span>Edit</span>
                                </a>
                                <a href="hapus.php?no_hp=<?php echo urlencode($feedback['no_hp']); ?>" class="hapus-data" title="Hapus Feedback" onclick="return confirm('Yakin ingin menghapus data ini?');">
                                    <i class="fa-solid fa-trash-can" style="color: #ffffff;"></i>
                                    <span>Hapus</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php $i++; endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="table-feedback-data">Tidak ada data tersedia.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</main>

<script src="/scripts/script.js"></script>
</body>
</html>

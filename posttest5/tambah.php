<?php
require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $no_hp = $_POST['no_hp'];
    $nama = $_POST['nama'];
    $gmail = $_POST['gmail'];
    $tanggal = $_POST['tanggal'];
    $saran = $_POST['saran'];

    $sql = "INSERT INTO daftar_pengisi_feedback (no_hp, nama, gmail, tanggal, saran) VALUES ('$no_hp', '$nama', '$gmail', '$tanggal', '$saran')";

    if (mysqli_query($conn, $sql)) {
        echo "Feedback berhasil ditambahkan.";
        header("Location: feedback.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Feedback | Pendataan Mahasiswa Universitas Mulawarman</title>

    <link rel="stylesheet" href="base.css" />
    <link rel="stylesheet" href="home.css" >
</head>

<body>

<main class="add-feedback-section">
    <h1 class="add-feedback-title">Tambah Feedback</h1>

    <form action="" method="POST" class="feedback-form">
        <label for="no_hp">No HP:</label>
        <input type="text" name="no_hp" required />

        <label for="nama">Nama:</label>
        <input type="text" name="nama" required />

        <label for="gmail">Gmail:</label>
        <input type="email" name="gmail" required />

        <label for="tanggal">Tanggal:</label>
        <input type="date" name="tanggal" required />

        <label for="saran">Saran:</label>
        <textarea name="saran" required></textarea>

        <button type="submit">Kirim Feedback</button>
    </form>

    <a href="feedback.php">
        <button>Kembali</button>
    </a>
</main>

<script src="/scripts/script.js"></script>
</body>

</html>
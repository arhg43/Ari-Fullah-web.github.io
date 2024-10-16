<?php
require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $no_hp = isset($_POST['no_hp']) ? $_POST['no_hp'] : null;
    $nama = isset($_POST['nama']) ? $_POST['nama'] : null;
    $gmail = isset($_POST['gmail']) ? $_POST['gmail'] : null;
    $tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : null;
    $saran = isset($_POST['saran']) ? $_POST['saran'] : null;
    $file = isset($_FILES['file']) ? $_FILES['file'] : null;

    if ($no_hp && $nama && $gmail && $tanggal && $saran && $file) {
        $uploadDir = "uploads/";

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $maxFileSize = 50 * 1024 * 1024; 

        if ($file['size'] > $maxFileSize) {
            echo "Error: Ukuran file melebihi batas maksimum 50 MB.";
            exit;
        }

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = date('Y-m-d H.i.s') . '.' . $ext;
        $filepath = $uploadDir . $filename;

        if (move_uploaded_file($file['tmp_name'], $filepath)) {
            $sql = "INSERT INTO daftar_pengisi_feedback (no_hp, nama, gmail, tanggal, saran, nama_file) VALUES ('$no_hp', '$nama', '$gmail', '$tanggal', '$saran', '$filename')";

            if (mysqli_query($conn, $sql)) {
                echo "Feedback berhasil ditambahkan.";
                header("Location: feedback.php");
                exit;
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Error saat mengunggah file.";
        }
    } else {
        echo "Silakan lengkapi semua field.";
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
    <form action="" method="POST" enctype="multipart/form-data" class="feedback-form">
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

        <label for="file">Upload File:</label>
        <input type="file" name="file" required />

        <small style="color: red;">File harus di bawah 50 MB.</small> 

        <button type="submit">Kirim Feedback</button>
    </form>

    <a href="feedback.php">
        <button>Kembali</button>
    </a>
</main>
<script src="/scripts/script.js"></script>
</body>
</html>

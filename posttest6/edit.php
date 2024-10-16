<?php
require "koneksi.php";

if (isset($_GET['no_hp'])) {
    $no_hp = htmlspecialchars($_GET['no_hp']); 

    $sql = mysqli_query($conn, "SELECT * FROM daftar_pengisi_feedback WHERE no_hp = '$no_hp'");
    $feedback = mysqli_fetch_assoc($sql);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama = htmlspecialchars($_POST['nama']);
        $gmail = htmlspecialchars($_POST['gmail']);
        $tanggal = htmlspecialchars($_POST['tanggal']);
        $saran = htmlspecialchars($_POST['saran']);
        
        $file = $_FILES['file'];
        $uploadDir = "uploads/";

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $maxFileSize = 50 * 1024 * 1024; 

        $filename = null;

        if ($file['error'] !== UPLOAD_ERR_NO_FILE) { 
            if ($file['size'] > $maxFileSize) {
                echo "Error: Ukuran file melebihi batas maksimum 50 MB.";
                exit;
            }

            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $filename = date('Y-m-d H.i.s') . '.' . $ext;
            $filepath = $uploadDir . $filename;

            if (!move_uploaded_file($file['tmp_name'], $filepath)) {
                echo "Error saat mengunggah file.";
                exit;
            }
        } else {
            $filename = $feedback['nama_file'];
        }

        $update_sql = "UPDATE daftar_pengisi_feedback SET nama='$nama', gmail='$gmail', tanggal='$tanggal', saran='$saran', nama_file='$filename' WHERE no_hp='$no_hp'";
        if (mysqli_query($conn, $update_sql)) {
            header("Location: feedback.php");
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
} else {
    echo "No HP tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Feedback</title>
    <link rel="stylesheet" href="base.css" />
    <link rel="stylesheet" href="home.css" />
</head>
<body>
    <main class="edit-section">
        <h1>Edit Feedback</h1>
        <form method="POST" enctype="multipart/form-data">
            <label>No HP:</label>
            <input type="text" name="no_hp" value="<?php echo htmlspecialchars($feedback['no_hp']); ?>" required readonly />
            <label>Nama:</label>
            <input type="text" name="nama" value="<?php echo htmlspecialchars($feedback['nama']); ?>" required />
            <label>Gmail:</label>
            <input type="email" name="gmail" value="<?php echo htmlspecialchars($feedback['gmail']); ?>" required />
            <label>Tanggal:</label>
            <input type="date" name="tanggal" value="<?php echo htmlspecialchars($feedback['tanggal']); ?>" required />
            <label>Saran:</label>
            <label>Ganti File:</label>
            <input type="file" name="file" />
            <textarea name="saran" required><?php echo htmlspecialchars($feedback['saran']); ?></textarea>
            <label>Ganti File:</label>
            <input type="file" name="file" />
            <small style="color: red;">File harus di bawah 50 MB.</small> 
            <button type="submit">Simpan</button>
        </form>
        <a href="feedback.php">Kembali</a>
    </main>
</body>
</html>

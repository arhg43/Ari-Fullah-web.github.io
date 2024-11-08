<?php
require "koneksi.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $nama_software = $_POST['nama_software'] ?? ''; 
    $tanggal_uploads = $_POST['tanggal_uploads'] ?? '';
    $deskripsi = $_POST['deskripsi'] ?? '';
    $versi = $_POST['versi'] ?? '';
    $foto = $_FILES['foto']['name'] ?? '';
    $file = $_FILES['file']['name'] ?? '';

   
    if ($foto && $file) {
        move_uploaded_file($_FILES['foto']['tmp_name'], "uploads/" . $foto);
        move_uploaded_file($_FILES['file']['tmp_name'], "uploads/" . $file);

       
        $sql = "INSERT INTO crud (nama_software, tanggal_uploads, deskripsi, versi, foto, file) 
                VALUES ('$nama_software', '$tanggal_uploads', '$deskripsi', '$versi', '$foto', '$file')";
        
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Software berhasil ditambahkan!'); window.location.href='tambah.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('Gagal mengupload file. Pastikan file sudah dipilih.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Software</title>
    <link rel="stylesheet" href="styles/tambah.css">
</head>
<body>

<main class="crud-section">
    <h1 class="crud-title">Tambah Software</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nama_software">Nama Software:</label>
        <input type="text" name="nama_software" required>
        
        <label for="tanggal_uploads">Tanggal Uploads:</label>
        <input type="date" name="tanggal_uploads" required>
        
        <label for="deskripsi">Deskripsi:</label>
        <textarea name="deskripsi" required></textarea>
        
        <label for="versi">Versi:</label>
        <input type="text" name="versi" required>
        
        <label for="foto">Foto:</label>
        <input type="file" name="foto" accept="image/*" required>
        
        <label for="file">File:</label>
        <input type="file" name="file" required>
        
        <button type="submit">Tambah Software</button>
    </form>
    <a href="crud.php" class="button">Kembali</a>
</main>

</body>
</html>

<?php
require "koneksi.php"; 

if (isset($_GET['nama_software'])) {
    $nama_software = $_GET['nama_software'];

    $sql = "SELECT * FROM crud WHERE nama_software='$nama_software'";
    $result = mysqli_query($conn, $sql);
    $software = mysqli_fetch_assoc($result);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama_software = $_POST['nama_software'] ?? '';
    $tanggal_uploads = $_POST['tanggal_uploads'] ?? '';
    $deskripsi = $_POST['deskripsi'] ?? '';
    $versi = $_POST['versi'] ?? '';
    $foto = $_FILES['foto']['name'] ?? '';
    $file = $_FILES['file']['name'] ?? '';

    if ($foto) {
        move_uploaded_file($_FILES['foto']['tmp_name'], "uploads/" . $foto);
        $foto_update = ", foto='$foto'";
    } else {
        $foto_update = '';
    }

    if ($file) {
        move_uploaded_file($_FILES['file']['tmp_name'], "uploads/" . $file);
        $file_update = ", file='$file'";
    } else {
        $file_update = '';
    }

    $sql = "UPDATE crud SET 
                tanggal_uploads='$tanggal_uploads', 
                deskripsi='$deskripsi', 
                versi='$versi' 
                $foto_update 
                $file_update 
                WHERE nama_software='$nama_software'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Software berhasil diperbarui!'); window.location.href='crud.php';</script>";
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
    <title>Edit Software</title>
    <link rel="stylesheet" href="styles/edit.css">
</head>
<body>

<main class="crud-section">
    <h1 class="crud-title">Edit Software</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nama_software">Nama Software:</label>
        <input type="text" name="nama_software" value="<?php echo htmlspecialchars($software['nama_software']); ?>" required readonly>

        <label for="tanggal_uploads">Tanggal Uploads:</label>
        <input type="date" name="tanggal_uploads" value="<?php echo htmlspecialchars($software['tanggal_uploads']); ?>" required>

        <label for="deskripsi">Deskripsi:</label>
        <textarea name="deskripsi" required><?php echo htmlspecialchars($software['deskripsi']); ?></textarea>

        <label for="versi">Versi:</label>
        <input type="text" name="versi" value="<?php echo htmlspecialchars($software['versi']); ?>" required>

        <label for="foto">Foto:</label>
        <input type="file" name="foto" accept="image/*">

        <label for="file">File:</label>
        <input type="file" name="file">

        <button type="submit">Perbarui Software</button>
    </form>
    <a href="crud.php" class="button">Kembali</a>
</main>

</body>
</html>

<?php
require "koneksi.php"; 

if (isset($_GET['nama_software'])) {
    $nama_software = $_GET['nama_software'];

    $sql = "DELETE FROM crud WHERE nama_software='$nama_software'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Software berhasil dihapus!'); window.location.href='crud.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('Data tidak ditemukan.'); window.location.href='crud.php';</script>";
}
?>

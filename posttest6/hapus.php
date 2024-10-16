<?php
require "koneksi.php";

$no_hp = $_GET['no_hp'];

$no_hp = mysqli_real_escape_string($conn, $no_hp);

$delete_sql = "DELETE FROM daftar_pengisi_feedback WHERE no_hp = '$no_hp'";
if (mysqli_query($conn, $delete_sql)) {
    header("Location: feedback.php");
    exit();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>

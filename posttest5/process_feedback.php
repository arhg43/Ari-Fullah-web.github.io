<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $date = htmlspecialchars($_POST['date']);
    $suggestion = htmlspecialchars($_POST['suggestion']);

    $file = fopen("feedback.txt", "a");
    fwrite($file, "Nama: $name\nEmail: $email\nTanggal: $date\nSaran: $suggestion\n\n");
    fclose($file);

    echo "<h1>Nama: $name</h1>";
    echo "<h1>Email: $email</h1>";
    echo "<h1>Tanggal: $date</h1>";
    echo "<h1>Saran: $suggestion</h1>";
    echo "<h1>Terima kasih atas feedback Anda!</h1>";
} else {
    echo "Terjadi kesalahan dalam pengiriman feedback.";
}
?>

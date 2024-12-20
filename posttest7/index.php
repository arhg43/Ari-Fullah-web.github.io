<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Elektronik</title>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
</head>
<body class="light-mode">

    <header>
        <div class="logo">
            <img src="logo.jpg" alt="Logo Toko" class="logo-img">
        </div>

        <div class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <nav id="nav-bar">
            <ul>
                <li><a href="index.html">Beranda</a></li>
                <li><a href="about.html">Tentang Saya</a></li>
                <li class="feedback-menu"><a href="feedback.php">Formulir Feedback</a></li>
                <li><button id="darkModeToggle">Dark Mode</button></li>
                <a href="login.php" class="button"> Login </a>
                <a href="regis.php" class="button"> Registrasi </a>
            </ul>
        </nav>       
    </header>

    <main>
        <section id="home">
            <h2>Selamat Datang di Toko Elektronik</h2>
            <p>Temukan barang elektronik berkualitas dengan harga terbaik.</p>
            <button id="showPopup">Lihat Promo!</button>
        </section>

        <section id="products">
            <h2>Produk Kami</h2>
            <div class="product">
                <img src="laptop_aspire.jpg" alt="Laptop Aspire" class="product-img">
                <h3>Laptop Aspire 5 14</h3>
                <p class="price">Rp 7.500.000</p>
            </div>
            <div class="product">
                <img src="tv_samsung_50.jpeg" alt="TV Samsung 50 Inch" class="product-img">
                <h3>TV android Samsung 50 Inch</h3>
                <p class="price">Rp 5.000.000</p>
            </div>
            <div class="product">
                <img src="hp_poco.jpeg" alt="HP Poco" class="product-img">
                <h3>HP Poco m3 pro 5g</h3>
                <p class="price">Rp 3.200.000</p>
            </div>
        </section>

        <div id="popup" class="popup">
            <div class="popup-content">
                <span id="closePopup">&times;</span>
                <h3>Promo Spesial</h3>
                <p>Diskon hingga 10% untuk barang pembelian pertama!!</p>
            </div>
        </div>
        
    </main>

    <footer>
        <p>&copy; 2024 Toko Elektronik. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>

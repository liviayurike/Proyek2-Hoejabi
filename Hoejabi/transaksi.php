<!DOCTYPE html>
<html>
<head>
    <title>TRANSAKSI PEMBELIAN</title>
</head>

<body>
    <header>
        <h3>Transaksi Pembelian</h3>
        <h1>Hoejabi Shop</h1>
    </header>

    <h4>Menu</h4>
    <nav>
    <?php if(isset($_GET['status'])): ?>
    <p>
        <?php
            if($_GET['status'] == 'sukses'){
                echo "Transaksi berhasil!";
            } else {
                echo "Transaksi gagal!";
            }
        ?>
    </p>
<?php endif; ?>
        <ul>
            <li><a href="form-transaksi.php">Daftar Baru</a></li>
            <li><a href="list-transaksi.php">Pembeli</a></li>
        </ul>
    </nav>

    </body>
</html>
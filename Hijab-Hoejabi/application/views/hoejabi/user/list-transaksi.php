<?php include("db_connect.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Transaksi | Hoejabi Shop</title>
</head>

<body>
    <header>
        <h3>Pembeli yang sudah melakukan Transaksi</h3>
    </header>

    <nav>
        <a href="form-transaksi.php">[+] Tambah Baru</a>
    </nav>

    <br>

    <table border="1">
    <thead>
        <tr>
            <th>Nama</th>
            <th>No Telp/Wa</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Product</th>
            <th>Harga</th>
            <th>Total Harga</th>
            <th>Via Pembayaran</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT * FROM transaksi";
        $query = mysqli_query($db, $sql);

        while($transaksi = mysqli_fetch_array($query)){
            echo "<tr>";

            echo "<td>".$transaksi['Nama']."</td>";
            echo "<td>".$transaksi['No Telp/Wa']."</td>";
            echo "<td>".$transaksi['Alamat']."</td>";
            echo "<td>".$transaksi['Email']."</td>";
            echo "<td>".$transaksi['Product']."</td>";
            echo "<td>".$transaksi['Harga']."</td>";
            echo "<td>".$transaksi['Total Harga']."</td>";
            echo "<td>".$transaksi['Via Pembayaran']."</td>";

            echo "<td>";
            echo "<a href='form-edit.php?id=".$pembeli['Nama']."'>Edit</a> | ";
            echo "<a href='hapus.php?id=".$pembeli['Nama']."'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </tbody>
    </table>

    <p>Total: <?php echo mysqli_num_rows($query) ?></p>

    </body>
</html>
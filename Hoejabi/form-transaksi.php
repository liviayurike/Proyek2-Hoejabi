<!DOCTYPE html>
<html>
<head>
    <title>Formulir Transaksi | Hoejabi Shop</title>
</head>

<body>
    <header>
        <h3>Formulir Transaksi Hoejabi Shop</h3>
    </header>

    <form action="proses-transaksi.php" method="POST">

        <fieldset>

        <p>
            <label for="Nama">Nama: </label>
            <input type="text" name="Nama" placeholder="nama lengkap" />
        </p>
        <p>
            <label for="No Telp/Wa">No Telp/Wa: </label>
            <input type="text" name="N0 Telp/Wa" placeholder="nomor telepon" />
        </p>
        <p>
            <label for="Alamat">Alamat: </label>
            <textarea name="Alamat"></textarea>
        </p>
        <p>
            <label for="Email">Email: </label>
            <input type="text" name="Email" placeholder="email" />
        </p>
        <p>
            <label for="Product">Product yang dibeli: </label>
            <textarea name="Product"></textarea>
        </p>
        <p>
            <label for="Harga">Harga: </label>
            <textarea name="Harga"></textarea>
        </p>
        <p>
            <label for="Total Harga">Total Harga: </label>
            <textarea name="Total Harga"></textarea>
        </p>
        <p>
            <label for="Via Pembayaran">Pembayaran: </label>
            <select name="Via Pembayaran">
                <option>Cash/COD</option>
                <option>AlfaMart</option>
                <option>Debit/Trf Bank BRI</option>
                <option>Debit/Trf Bank BNI</option>
                <option>Indomart</option>
            </select>
        </p>
        <p>
            <input type="submit" value="Lakukan Transaksi" name="Lakukan Transaksi" />
        </p>

        </fieldset>

    </form>

    </body>
</html>
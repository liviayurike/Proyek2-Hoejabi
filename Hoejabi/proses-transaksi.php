<?php

include("db_connect.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['Lakukan Transaksi'])){

    // ambil data dari formulir
    $nama = $_POST['Nama'];
    $notelp = $_POST['No Telp/Wa'];
    $alamat = $_POST['Alamat'];
    $email = $_POST['Email'];
    $product = $_POST['Product'];
    $harga = $_POST['Harga'];
    $totharga = $_POST['Total Harga'];
    $pembayaran = $_POST['Via Pembayaran'];

    // buat query
    $sql = "INSERT INTO transaksi (Nama, No Telp/Wa, Alamat, Email, Product, Harga, Total Harga, Via Pembayaran) VALUE ('$nama', '$notelp', '$alamat', '$email', '$product', '$harga', '$totharga', '$pembayaran')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>
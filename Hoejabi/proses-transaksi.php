<?php

include("db_connect.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['transaksi'])){

    // ambil data dari formulir
    $nama = $_POST['nama'];
    $notelp = $_POST['notelp'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $product = $_POST['produk'];
    $harga = $_POST['harga'];
    $totharga = $_POST['totalharga'];
    $pembayaran = $_POST['viapembayaran'];

    // buat query
    $sql = "INSERT INTO transaksi (nama, notelp, alamat, email, produk, harga, totalharga, viapembayaran) VALUE ('$nama', '$notelp', '$alamat', '$email', '$produk', '$harga', '$totalharga', '$viapembayaran')";
    $query = mysqli_query($database, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: list-transaksi.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>
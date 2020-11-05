<?php
session_start();
include "assets/relasi/koneksi.php";

//ambil $_POST dari form sebelumnya
$id_p=$_POST['id_produk'];
$qty=$_POST['qty'];


$vd=mysqli_query($conect, "select*from tb_produk where id_produk='$id_p'")or die(mysqli_error($conect));
$produk=mysqli_fetch_array($vd);

$sub=$produk['harga_produk']*$qty;
//session sebagai kode unik
$id_keranjang=session_id();

$save=mysqli_query($conect, "update tb_keranjang set qty='$qty', subtotal='$sub', sub_berat=sub_berat+$produk[berat_produk] where id_keranjang='$id_keranjang' and id_produk='$id_p'")or die(mysqli_error($conect));
    if($save){
        echo "
<script>alert('Shopping Cart anda telah diperbaharui');document.location='keranjang.php'</script>";
    }
    else {
    echo "
<script>alert('Error Bos !');document.location='keranjang.php'</script>";
    }

?>
<?php
session_start();
include "assets/relasi/koneksi.php";

//hapus troli
$id_keranjang=$_GET['id_keranjang'];
$id_produk=$_GET['id_produk'];
if(isset($id_keranjang)){
$hapus=mysqli_query($conect, "DELETE from tb_keranjang where id_keranjang='$id_keranjang' and id_produk='$id_produk'");
if($hapus){
    echo"
<script>alert('Satu Item Telah di Hapus');document.location='keranjang.php'</script>";
}
else{
    echo"
<script>alert('Error Bos !!');document.location='keranjang.php'</script>";
}
}
?>
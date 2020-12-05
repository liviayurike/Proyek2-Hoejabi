<?php
session_start();
include("db_connect.php");
$database = new database();
//hapus troli
$id_keranjang=$_GET['id_keranjang'];
$id_produk=$_GET['id_produk'];
if(isset($id_keranjang)){
$hapus=mysqli_query($koneksi, "DELETE from keranjang where id_keranjang='$id_keranjang' and id_produk='$id_produk'");
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
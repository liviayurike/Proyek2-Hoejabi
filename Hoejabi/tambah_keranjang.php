<?php
session_start();
include("db_connect.php");
$database = new database();
$id_p=$_GET['id'];
$qty=$_GET['qty'];

$vd=mysqli_query($database, "select*from produk where id_produk='$id_p'")or die(mysqli_error($database));
$produk=mysqli_fetch_array($vd);

//session sebagai kode unik

$id_keranjang=session_id();

//cek di troli apakah produk sudah ada atau masih kosong
$cek=mysqli_query($database, "select*from tb_keranjang where id_keranjang='$id_keranjang' and id_produk='$id_p'")or die(mysqli_error($database));
$ada=mysqli_num_rows($cek);
$query=mysqli_fetch_array($cek);

//diskon produk

$disk=($produk['harga_produk']*$produk['diskon_produk'])/100;
$disk_t=$produk['harga_produk']-$disk;
$tom=$disk_t*$qty;
$berate=$qty*$produk['berat_produk'];

//jika produk masih kosong maka akan menginput ke troli jika sudah maka akan mengupdate jumlah beli
if($ada==0){
    mysqli_query($database, "insert into tb_keranjang (id_keranjang,id_produk,qty,subtotal,sub_berat)values('$id_keranjang','$id_p','$qty','$tom','$berate')")or die(mysqli_error($database));
    echo"<script>;document.location='keranjang.php'</script>";
}
else
{    $sql=mysqli_fetch_array(mysqli_query($database, "select* from tb_produk where id_produk='$id_p'"));
    if($sql['stok_produk']> $query['qty']) {
    mysqli_query($database, "update tb_keranjang set qty=qty+1, subtotal=subtotal+$disk_t, sub_berat=sub_berat+$produk[berat_produk] where id_troli='$id_keranjang' and id_produk='$id_p'")or die(mysqli_error($database));
    echo "
<script>alert('Jumlah Beli anda bertambah 1 item lagi');document.location='keranjang.php'</script>";
    }
    else {
    echo "
<script>alert('Maaf.. stok kami hanya $query[qty] saat ini !');document.location='keranjang.php'</script>";
    }

}
?>
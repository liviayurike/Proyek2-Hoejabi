<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Keranjang Belanja</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Lumia - v2.1.0
  * Template URL: https://bootstrapmade.com/lumia-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <div class="logo mr-auto">
                <h1><a href="index.php">Hoejabi<h6><b> Hijab Shop</b></h6></a></h1>

                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="index.php">Home</a></li>
                    <li class="drop-down"><a href="">Product</a>
                        <ul>
                            <li><a href="hijab.php">Hijab</a></li>
                            <li class="drop-down"><a href="#">Accesories Hijab</a>
                                <ul>
                                    <li><a href="anting.php">Anting</a></li>
                                    <li><a href="kalung.php">Kalung</a></li>
                                    <li><a href="ikatinner.php">Ikat dan Inner</a></li>
                                </ul>
                            </li>
                            <li><a href="pakaian.php">Pakaian</a></li>
                        </ul>
                    </li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="testimonials.php">Testimonials</a></li>
                    <li><a href="contact.php">Contact Us</a></li>

                </ul>
            </nav><!-- .nav-menu -->

            <div class="header-social-links">
                <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
                <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
            </div>
    <main id="main">
    </header>
<section>
<div class="container">
            <div class="breadcrumbs">
         <div class="col-sm-12"> <!--panel-->
         <h2 class="title"><i class="bi bi-cart"></i> Keranjang Belanja</h2>
            <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                <i class="fa fa-shopping-cart fa-fw"></i> Daftar Pembelian</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama Produk</td>
                        <th>Gambar</th>
                        <th>Potongan</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Sub Total</th>
                        <th>Opsi</th>

                        </tr>
                    </thead>
                <tbody>
                    <?php
                    $conect = "hoejabi";
                    $id_keranjang=session_id();
                     $ambildata=mysqli_query($conect, "select*from keranjang, hijab, acchijab, pakaian where id_keranjang='$id_keranjang' and keranjang.id_hijab=hijab.id_hijab and keranjang.id_acchijab=acchijab.id_acchijab and keranjang.id_pakaian=pakaian.id_pakaian order by id_keranjang asc") or die(mysqli_error($conect));
                     $jumlah=mysqli_num_rows($ambildata);
                    if($jumlah > 0){

                    while($a=mysqli_fetch_array($ambildata)){

                    $disk=($a['harga']*$a['diskon'])/100;
                    $disk_t=$a['harga']-$disk;
                    $rim=$disk_t*$a['qty'];
                    ?>
                    <tr>
                        <td><?php echo $posisi=$posisi+1;?></td>
                            <td><?php echo $a['nama'];?></td>
                            <td><a href="<?php echo $hostname;?>/assets/img/portfolio/<?php echo $a['gambar'];?>" data-rel="prettyPhoto" title="<?php echo $a['nama'];?>">
                            <img src="assets/img/portfolio<?php echo $a['gambar'];?>" alt="<?php echo $a['nama'];?>" style="width:80px; height:70px;"></a></td>
                            <td><?php echo number_format($a['diskon']);?> %</td>
                            <td>
                            <?php
                            if($a['diskon'] != 0){
                                ?>
                            <font style="text-decoration:line-through; font-size:10px; color:#000;"><?php echo number_format($a['harga']);?></font><br><b><font color="red"><?php echo number_format($disk_t);?></font></b></td>
                            <?php
                            }else{
                                ?>
                                Rp. <?php echo number_format($a['harga']);?>
                                <?php
                            }
                            ?>
                            <td>
                            <form action="update_keranjang.php" method="post">
                            <input type="hidden" size="5" name="id_hijab" value="<?php echo $a['id_hijab'];?>">
                                <select name="qty" class="input-select">
                                    <?php $jum=$a['stok_produk'];
                                    for ($i=1; $i<=$jum; $i++){
                                    if($i==$a['qty']){
                                    echo"
                                    <option value='$i' selected>$i</option>";
                                    }
                                    else{echo"
                                    <option value='$i'>$i</option>";
                                    }
                                    }?>
                                </select>
                                <button name="update" class="btn btn-warning btn-sm"> Update</i></button>
                                </form>
                            </td>

                            <td>Rp. <?php echo number_format($rim);?></td>
                            <td>

                        <a href="hapus_keranjang.php?id_keranjang=<?php echo $a['id_keranjang'];?>&id_hijab=<?php echo $a['id_hijab'];?>" title="Hapus data"><button name="delete" class="btn btn-danger btn-sm"><i class="fa fa-close fa-fw"></i></button></a>

                        </tr>
                    <?php

                    }
                    ?>
                    <tr>
                        <td colspan="6"><b>Sub Total </b></td>
                        <td><b><?php echo $item;?> Item</b></td>
                        <td><b><?php echo $bulat;?> Kg</b> </td>
                        <td><b>Rp. <?php echo number_format($totalsub);?></b></td>
                    </tr>
                    <tr>
                        <td colspan="8"><b>Total Harga </b></td>
                        <td><b>Rp. <?php echo number_format($totalsub);?></b></td>
                    </tr>
                    <tr>
                        <td colspan="11">
                            <a href="cekout.php"><button name="simpan" class="btn btn-success">Check Out</button></a>
                        </td>
                    </tr>
                    <?php
     }
     else{
         ?>
         <tr>
                        <td colspan="10">
                            Shopping Cart Anda MAsih Kosong, Silahkan Pilih Produk !
                        </td>
                    </tr>
                    <?php
         }
         ?>
                </tbody>
            </table>

           </div>
		</div>
		</div>
         </div>

         <!--panel-->
         </div>
		</div>
	</section>
    </main>
    </body>
</html>
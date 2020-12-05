<?php
session_start();
include("db_connect.php");
$database = new database();
$conn = mysqli_connect('localhost', 'root', '', 'hoejabi');

if (!$conn) {
    die ("Koneksi gagal. " . mysqli_connect_error()); // close koneksi
  }

  if (!isset($_GET['cari'])) {
    $query = mysqli_query($conn, "SELECT * FROM transaksi");
  } else {
    $query = mysqli_query($conn, "SELECT * FROM transaksi WHERE nama LIKE '%" . $_GET['cari'] . "%'");
  }

    if (isset($_SESSION['pesan'])) {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              ' . $_SESSION['pesan'] . '
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>';

      unset($_SESSION['pesan']);
    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Hoejabi - Hijab Shop</title>
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
    </header>
    <main id="main">
    <section id="portfolio" class="portfolio">
         <div class="container">
            <div class="breadcrumbs">
        <h3>Pembeli yang sudah melakukan Transaksi</h3>
    <nav>
        <a href="form-transaksi.php">[+] Tambah Baru</a>
    </nav>

    <br>

    <table class="table table-bordered">
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
        $query = mysqli_query($conn, $sql);

        while($transaksi = mysqli_fetch_array($query)){
            echo "<tr>";

            echo "<td>".$transaksi['nama']."</td>";
            echo "<td>".$transaksi['notelp']."</td>";
            echo "<td>".$transaksi['alamat']."</td>";
            echo "<td>".$transaksi['email']."</td>";
            echo "<td>".$transaksi['produk']."</td>";
            echo "<td>".$transaksi['harga']."</td>";
            echo "<td>".$transaksi['totalharga']."</td>";
            echo "<td>".$transaksi['viapembayaran']."</td>";

            echo "<td>";
            echo "<a href='form-edit.php?id=".$pembeli['nama']."'>Edit</a> | ";
            echo "<a href='hapus.php?id=".$pembeli['nama']."'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </tbody>
    </table>

    <p>Total: <?php echo mysqli_num_rows($query) ?></p>
    </section>
    </main>

    </body>
</html>
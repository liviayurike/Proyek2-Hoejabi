<!DOCTYPE html>
<html>
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
    <h3>Formulir Transaksi Hoejabi Shop</h3>
    <form action="proses-transaksi.php" method="POST">

        <fieldset>

        <p>
        <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="nama" name="nama" placeholder="nama lengkap" required autofocus>
            </div>
        </div>
        </p>
        <p>
        <div class="form-group row">
                    <label for="notelp" class="col-sm-2 col-form-label">No Telp/Wa</label>
            <div class="col-sm-10">
            <input type="number" class="form-control" id="notelp" name="notelp" placeholder="nomor telepon" required autofocus>
            </div>
        </div>
        </p>
        <p>
        <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
            <input type="textarea" class="form-control" id="alamat" name="alamat" placeholder="alamat lengkap" required autofocus>
            </div>
        </div>
        </p>
        <p>
        <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" placeholder="email" required autofocus>
            </div>
        </div>
        </p>
        <p>
        <div class="form-group row">
                    <label for="produk" class="col-sm-2 col-form-label">Produk yang dibeli</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="produk" name="produk" placeholder="product" required autofocus>
            </div>
        </div>
        </p>
        <p>
        <div class="form-group row">
                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
            <input type="number" class="form-control" id="harga" name="harga" placeholder="harga" required autofocus>
            </div>
        </div>
        </p>
        <p>
        <div class="form-group row">
                    <label for="totalharga" class="col-sm-2 col-form-label">Total Harga</label>
            <div class="col-sm-10">
            <input type="number" class="form-control" id="totalharga" name="totalharga" placeholder="total harga" required autofocus>
            </div>
        </div>
        </p>
        <p>
        <div class="form-group row">
                    <label for="viapembayaran" class="col-sm-2 col-form-label">Pembayaran</label>
            <div class="col-sm-10">
            <select class="form-control" id="viapembayaran" name="viapembayaran">
                <option>Cash/COD</option>
                <option>AlfaMart</option>
                <option>Debit/Trf Bank BRI</option>
                <option>Debit/Trf Bank BNI</option>
                <option>Indomart</option>
            </select>
            </div>
            
        </p>
        <p><br><br>
        <div class="form-group row">
        <button type="submit" value="transaksi" name="transaksi" class="btn btn-danger">Lakukan Transaksi</button>
            </div>
            
        </p>

        </fieldset>

    </form>
    </div>
    </div>
    </section>
    </main>

    </body>
</html>
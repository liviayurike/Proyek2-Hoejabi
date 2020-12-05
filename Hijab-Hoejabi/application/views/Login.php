<body class="text-center">
    <?php echo $this->session->flashdata('pesan') ?>

    <form class="form-signin" method="post" action="<?php echo base_url('Login/login') ?>" class="user">
        <br>
        <img class="mb-4" src="assets/img/favicon.png" alt="" width="80" height="80">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="username" class="sr-only">Username</label>
        <input type="text" id="username" class="form-control" placeholder="Username" name="username" required autofocus>
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me" name="remember"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
        <a href="<?= base_url() ?>Login/registration" class=" btn btn-lg btn-success btn-block">Register</a>


        <p class="mt-5 mb-3 text-muted">Hoejabi - HijabShop &copy; 2020</p>
    </form>

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

        </div>
    </header><!-- End Header -->
    <?=
        form_close();
    ?>
</body>
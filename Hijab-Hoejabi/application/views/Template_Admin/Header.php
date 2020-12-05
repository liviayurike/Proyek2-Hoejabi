<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Hoejabi Hijab Shop - User</title>
<link href="pages/assets/favicon.png" rel="icon">
<link href="<?php echo base_url('pages/assets/admin/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="<?php echo base_url('pages/assets/admin/css/sb-admin-2.css'); ?>" rel="stylesheet">

<!-- Custom styles for this page -->
<link href="<?php echo base_url('pages/assets/admin/vendor/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>admin/dashboard">
                <div class="sidebar-brand-icon">

                    <br>
                    <img src="<?php echo base_url('pages/assets/judul.PNG'); ?>" width="200">
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url(); ?>admin/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Penting
            </div>

            <!-- Nav Item - Pages Collapse Menu -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-users"></i>
                    <span>User</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url(); ?>Admin/User"><i class="fas fa-fw fa-users" aria-hidden="true"></i> Data User</a>
                        <a class="collapse-item" href="<?php echo base_url(); ?>Admin/User/TambahUser"><i class="fas fa-fw fa-plus" aria-hidden="true"></i>Tambah User</a>
                    </div>
                </div>
            </li>

            <li class="nav-item ">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-tasks"></i>
                    <span>Product</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url(); ?>Admin/Produk"><i class="fas fa-fw fa-tasks" aria-hidden="true"></i> Data Product</a>
                        <a class="collapse-item" href="<?php echo base_url(); ?>Admin/Produk/TambahProduk"><i class="fas fa-fw fa-plus" aria-hidden="true"></i>Tambah Product</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                    <i class="fas fa-fw fa-shopping-cart "></i>
                    <span>Keranjang</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url(); ?>Admin/Keranjang"><i class="fas fa-fw fa-shopping-cart" aria-hidden="true"></i> Data Keranjang</a>
                        <a class="collapse-item" href="<?php echo base_url(); ?>Admin/Keranjang/TambahKeranjang"><i class="fas fa-fw fa-plus" aria-hidden="true"></i>Tambah Keranjang</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>Admin/Laporan">
                    <i class="fas fa-fw fa-chart-area "></i>
                    <span>Laporan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) 
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
      -->

        </ul>
        <!-- End of Sidebar -->
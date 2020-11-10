<!-- css -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome To Hoejabi</title>

    <!-- Bootstrap core CSS -->

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="<?php echo base_url();?>assets/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/maps/jquery-jvectormap-2.0.1.css" />
    <link href="<?php echo base_url();?>assets/css/icheck/flat/green.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/floatexamples.css" rel="stylesheet" type="text/css" />

    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/nprogress.js"></script>
    <script>
        NProgress.start();
    </script>
    


</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?php echo base_url();?>admin" class="site_title"><span>E - Laundry</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="" >
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?php echo $nama_usr?></h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    

                    <!-- sidebar menu -->
                    <?php $this->load->view('admin/tampilan_menu');?>
                    
                    <!-- /sidebar menu -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo base_url();?>" alt=""><?php echo $nama_usr?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    
                                    </li><li><a href="<?php echo base_url('admin/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

                            

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->


            <!-- page content -->
            <div class="right_col" role="main"> 
            <div class="row tile_count">

    <?php $this->load->view($content);?>
    
    </div>
                <!-- footer content -->

                <footer>
                    <div class="">
                        <p class="pull-right">Sistem Informasi |
                            <span class="lead"> </i>Hoejabi</span>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
            <!-- /page content -->

            
                
    <!-- efek log out -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

    <!--  efek kepencet -->
    <script src="<?php echo base_url();?>assets/js/custom.js"></script>

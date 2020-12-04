<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-grey topbar mb-4 static-top shadow">

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw "></i>
                    </a>
                </li>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-1000 medium"><?php echo $this->session->userdata("nama"); ?></span>
                        <i class="fas fa-fw fa-user-circle fa-2x"></i>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?php echo base_url(); ?>admin/logout" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->
        <!-- End of Topbar -->
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-fw fa-plus"></i> Edit User </h1><br>

        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <div class="col-md-7">
                        <a class="btn text-left bg-maroon text-white" width="15px" style="margin-bottom: 20px;" href="<?php echo base_url(); ?>Admin/User"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a><br>
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <?php if (validation_errors()) : ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?php echo validation_errors() ?>
                                            </div>
                                        <?php endif ?>
                                        <form action="" method="post">
                                            <input type="hidden" name="id_user" value="<?= $u->id_user; ?>">
                                            <table class="table table-borderless" align="center" style="color: black">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="3" class="text-center"><i class="fa fa-user-circle fa-fw fa-5x"></i></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right">ID User</td>
                                                        <td>:</td>
                                                        <td><input name="id_user" id="id_user" type="number" size="5" value="<?= $u['id_user']; ?>" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right">Email</td>
                                                        <td>:</td>
                                                        <td><input name="email" id="email" type="email" value="<?= $u['email']; ?>" size="30"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right">Password</td>
                                                        <td>:</td>
                                                        <td><input name="password" id="password" type="password" value="<?= $u['password']; ?>" size="30"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right">Nama</td>
                                                        <td>:</td>
                                                        <td><input name="nama" id="nama" type="text" size="30" value="<?= $u['nama']; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right">No HP</td>
                                                        <td>:</td>
                                                        <td><input name="nohp" id="nohp" type="text" value="<?= $u['nohp']; ?>" size="15" maxlength="12"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right">Alamat</td>
                                                        <td>:</td>
                                                        <td><textarea name="alamat" id="alamat" cols="30"><?= $u['alamat']; ?></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"><button type="submit" name="submit" id="submit" class="btn bg-green-dark text-white float-right">Update</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
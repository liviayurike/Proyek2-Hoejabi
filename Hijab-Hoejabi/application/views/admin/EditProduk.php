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
                        <a class="dropdown-item" href="<?php echo base_url(); ?>Login/logout" data-toggle="modal" data-target="#logoutModal">
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
        <?php foreach ($produk as $p) : ?>
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-fw fa-users"></i> Produk</h1><br>

                <div class="card shadow mb-4">

                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="col-md-7">
                                <a class="btn text-left bg-maroon text-white" width="15px" style="margin-bottom: 20px;" href="<?php echo base_url(); ?>Admin/Produk"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a><br>
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
                                                    <table class="table table-borderless" align="center" style="color: black">
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="3" class="text-center"><i class="fa fa-user-circle fa-fw fa-5x"></i></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-right">ID Produk</td>
                                                                <td>:</td>
                                                                <td><input name="id_produk" id="id_produk" type="number" size="5" value="<?= $p['id_produk']; ?>" readonly></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-right">Nama</td>
                                                                <td>:</td>
                                                                <td><input name="nama" id="nama" type="text" value="<?= $p['nama']; ?>" size="30"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-right">Harga</td>
                                                                <td>:</td>
                                                                <td><input name="harga" id="harga" type="number" value="<?= $p['harga']; ?>" size="30"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-right">Deskripsi</td>
                                                                <td>:</td>
                                                                <td><input name="deskripsi" id="deskripsi" type="text" value="<?= $p['deskripsi']; ?>" size="30"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-right">Kategori Produk</td>
                                                                <td>:</td>
                                                                <td><select class="form-control" name="kategori_produk" size="30" value="<?= $p['produk']; ?>">
                                                                        <option>Hijab</option>
                                                                        <option>Accesories</option>
                                                                        <option>Pakaian</option>
                                                                    </select>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-right">Stok</td>
                                                                <td>:</td>
                                                                <td><input name="stok" id="stok" type="number" value="<?= $p['stok']; ?>" size="15" maxlength="12"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-right">Gambar</td>
                                                                <td>:</td>
                                                                <td><input name="gambar" id="gambar" type="file" size="15" maxlength="12"></td>
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
            <?php form_close(); ?>
        <?php endforeach; ?>
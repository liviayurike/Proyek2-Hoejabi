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

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Produk</h1><br>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">

                        <font color="orange">
                            <?php echo $this->session->flashdata('hasil'); ?>
                        </font>

                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0" style="color: black">
                            <thead class="table-dark bg-green-dark text-white" align="center" style="font-size: 15px">
                                <tr>
                                    <th>ID Produk</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th>Kategori Produk</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody align="center">
                                <?php
                                foreach ($produk as $p) { ?>
                                    <tr>
                                        <td><?= $p->id_produk; ?></td>
                                        <td><?= $p->nama; ?></td>
                                        <td><?= $p->harga; ?></td>
                                        <td><?= $p->Deskripsi; ?></td>
                                        <td><?= $p->kategori_produk; ?></td>
                                        <td><?= $p->gambar; ?></td>
                                        <td>
                                            <a class="btn btn-warning" href="<?= base_url(); ?>Admin/Produk/EditProduk/<?= $u->id_user; ?>"> Edit</a>
                                            <a class="btn btn-danger" href="<?php echo base_url(); ?>Admin/Produk/HapusProduk/<?= $u->id_user; ?>"> Hapus</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
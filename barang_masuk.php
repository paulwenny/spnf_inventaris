<?php
require 'function.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Barang Masuk</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">INVENTARIS</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <!-- <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>
            </ul> -->
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Master
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="merek.php">Merek</a>
                                    <a class="nav-link" href="kategori.php">Kategori</a>
                                    <a class="nav-link active" href="ruangan.php">Ruangan</a>
                                    <a class="nav-link" href="stok_barang.php">Stok Barang</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Transaksi
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="barang_masuk.php">Barang Masuk</a>
                                    <a class="nav-link" href="barang_keluar.php">Barang Keluar</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="login.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Logout
                            </a>
                        </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Barang Masuk</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- Button to Open the Modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    Tambah Barang Masuk
                                </button>
                                <a href="export/export_dataBMasuk.php" class="btn btn-info" target="_blank">Cetak</a>
                            </div>
                            <!-- Open The Modal -->
                            <div class="modal fade" id="myModal">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                    <h4 class="modal-title">Tambah Barang Masuk</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form action="" method="post">
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <!-- <label for="namaBarang">Nama Barang : </label>
                                            <input type="text" name="namaBarang" placeholder="Nama Barang" class="form-control">
                                            <br> -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <!-- Menampilkan Data Merek Pada List -->
                                                    <label for="listBarang">Nama Barang</label>
                                                    <select name="listBarang" class="form-control">
                                                        <?php
                                                            $getdataBarang = mysqli_query($conn, "SELECT * FROM tb_stok");
                                                            while($dataBarang = mysqli_fetch_assoc($getdataBarang)){
                                                                $idB = $dataBarang['id_stok'];
                                                                $nBarang = $dataBarang['nama_barang'];
                                                        ?>
                                                            <option value="<?=$idB;?>"> <?=$nBarang;?> </option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Menampilkan Data Merek Pada List -->
                                                    <label for="listMerek">Merek</label>
                                                    <select name="listMerek" class="form-control">
                                                        <?php
                                                            $getdataMerek = mysqli_query($conn, "SELECT * FROM tb_merek");
                                                            while($dataMerek = mysqli_fetch_assoc($getdataMerek)){
                                                                $idM = $dataMerek['id_merek'];
                                                                $nMerek = $dataMerek['nama_merek'];
                                                        ?>
                                                            <option value="<?=$idM;?>"> <?=$nMerek;?> </option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <br>
                                                    <!-- Menampilkan Data kategori Pada List  -->
                                                    <label for="listKategori">Kategori</label>
                                                    <select name="listKategori" class="form-control ">
                                                        <?php
                                                            $getdataKategori = mysqli_query($conn, "SELECT * FROM tb_kategori");
                                                            while($dataKategori = mysqli_fetch_assoc($getdataKategori)){
                                                                $idK = $dataKategori['id_kategori'];
                                                                $nKategori = $dataKategori['nama_kategori'];
                                                        ?>
                                                            <option value="<?=$idK;?>"> <?=$nKategori;?> </option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select> 
                                                </div>
                                                <div class="col-md-6">
                                                    <br>
                                                    <!-- Menampilkan Data Ruangan Pada List -->
                                                    <label for="listRuangan">Ruangan</label>
                                                    <select name="listRuangan" class="form-control">
                                                        <?php
                                                            $getdataRuangan = mysqli_query($conn, "SELECT * FROM tb_ruangan");
                                                            while($dataRuangan = mysqli_fetch_assoc($getdataRuangan)){
                                                                $idR = $dataRuangan['id_ruangan'];
                                                                $nRuangan = $dataRuangan['nama_ruangan'];
                                                        ?>
                                                            <option value="<?=$idR;?>"> <?=$nRuangan;?> </option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <br>
                                                    <!-- Input Jumlah barang -->
                                                    <label for="jumlahBMasuk">Jumlah Barang</label>
                                                    <input type="number" name="jumlahBMasuk" placeholder="Jumlah" class="form-control">
                                                </div>
                                            </div>
                                            <br>
                                            <input type="text" name="ketBMasuk" placeholder="Keterangan" class="form-control">
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="submit" name="bataltambahRuangan" class="btn btn-danger mr-auto">Cancel</button>
                                            <button type="submit" name="tambahBarangMasuk" class="btn btn-primary ml-auto">Save</button>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Nama Barang</th>
                                                <th>Merek</th>
                                                <th>Kategori</th>
                                                <th>Jumlah</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Menampilkan Data Barang Masuk -->
                                            <?php
                                                // $i = 1;
                                                // $showDataRuangan = mysqli_query($conn, "SELECT * FROM tb_barang_masuk");
                                                
                                                $i = 1;
                                                $showdataBMasuk = mysqli_query($conn, "SELECT * FROM tb_barang_masuk
                                                    INNER JOIN tb_stok ON tb_stok.id_stok = tb_barang_masuk.id_stok
                                                    INNER JOIN tb_merek ON tb_merek.id_merek = tb_barang_masuk.id_merek
                                                    INNER JOIN tb_kategori ON tb_kategori.id_kategori = tb_barang_masuk.id_kategori
                                                    INNER JOIN tb_ruangan ON tb_ruangan.id_ruangan = tb_barang_masuk.id_ruangan
                                                    ");
                                                while($data = mysqli_fetch_array($showdataBMasuk)){
                                            ?>
                                                <tr>
                                                    <td><?=$i++;?></td>
                                                    <td><?=$data['tanggal'];?></td>
                                                    <td><?=$data['nama_barang'];?></td>
                                                    <td><?=$data['nama_merek'];?></td>
                                                    <td><?=$data['nama_kategori'];?></td>
                                                    <td><?=$data['jumlah_barang_masuk'];?></td>
                                                    <td><?=$data['ket_bMasuk'];?></td>
                                                    <td>
                                                        <!-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$data['id_ruangan'];?>">
                                                            Edit
                                                        </button>
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$data['id_ruangan'];?>">
                                                            Delete
                                                        </button> -->
                                                        <div class="btn-group" role="group" aria-label="Tombol Edit dan Delete" >
                                                            <!-- Tombol Edit dengan ikon -->
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit<?=$data['id_ruangan'];?>">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            
                                                            <!-- Tombol Delete dengan ikon -->
                                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$data['id_ruangan'];?>">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
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
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
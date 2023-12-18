<?php
require '../function.php';
?>
<html>
<head>
    <title>Stock Barang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>Stock Bahan</h2>
			<h4>(Inventory)</h4>
				<div class="data-tables datatable-dark">
                    <table class="table table-bordered" id="mauexport" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Merek</th>
                                <th>Kategori</th>
                                <th>Ruangan</th>
                                <th>Kondisi</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                            <tbody>
                                <!-- Menampilkan Data Pada Halaman Stok Barang -->
                                <?php
                                    $i = 1;
                                    $showdataStok = mysqli_query($conn, "SELECT * FROM tb_stok
                                    INNER JOIN tb_merek ON tb_merek.id_merek = tb_stok.id_merek
                                    INNER JOIN tb_kategori ON tb_kategori.id_kategori = tb_stok.id_kategori
                                    INNER JOIN tb_ruangan ON tb_ruangan.id_ruangan = tb_stok.id_ruangan
                                    INNER JOIN tb_kondisi_barang ON tb_kondisi_barang.id_kondisi_barang = tb_stok.id_kondisi_barang
                                    ");
                                    while($data = mysqli_fetch_array($showdataStok)){
                                ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$data['nama_barang'];?></td>
                                        <td><?=$data['nama_merek'];?></td>
                                        <td><?=$data['nama_kategori'];?></td>
                                        <td><?=$data['nama_ruangan'];?></td>
                                        <td><?=$data['kondisi_barang'];?></td>
                                        <td><?=$data['jumlah_stok'];?></td>
                                        <td><?=$data['keterangan_barang'];?></td>
                                    </tr>           
                                <?php
                                    }
                                ?>
                            </tbody>
                    </table>
					
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    } );
} );
</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
</body>
</html>
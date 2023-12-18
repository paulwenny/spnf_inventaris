<?php
session_start();

// Membuat Koneksi ke DataBase
$conn = mysqli_connect("localhost", "root", "", "db_inventaris");

// M e r e k
// Tambah Merek
if(isset($_POST['tambahMerek'])){
    $nMerek = $_POST['namaMerek'];
    $ket = $_POST['keteranganMerek'];

    $addTotb_merek = mysqli_query($conn, "INSERT INTO tb_merek (nama_merek, keterangan) VALUES ('$nMerek', '$ket')");

    if($addTotb_merek){
        header('Location:merek.php');
    } else{
        echo "Gagal";
        header('Location:merek.php');
    }
}

// Update / Edit Merek
if(isset($_POST['updateMerek'])){
    $idM = $_POST['idMerek'];
    $namaMerek = $_POST['namaMerek'];
    $ketMerek = $_POST['keteranganMerek'];

    $updateMerek = mysqli_query($conn, "UPDATE tb_merek SET nama_merek ='$namaMerek', keterangan ='$ketMerek' WHERE id_merek = '$idM'");

    if($updateMerek){
        header('Location:merek.php');
    } else{
        echo "Gagal";
        header('Location:merek.php');
    }
}

// Delete Merek
if(isset($_POST['deleteMerek'])){
    $idM = $_POST['idMerek'];

    $deleteMerek = mysqli_query($conn, "DELETE FROM tb_merek WHERE id_merek = '$idM'");

    if($deleteMerek){
        header('Location:merek.php');
    } else{
        echo "Gagal";
        header('Location:merek.php');
    }
}

// K A T E G O R I
// Tambah Kategori
if(isset($_POST['tambahKategori'])){
    $nKategori = $_POST['namaKategori'];
    $ket = $_POST['keteranganKategori'];

    $addTotb_kategori = mysqli_query($conn, "INSERT INTO tb_kategori (nama_kategori, keterangan) VALUES ('$nKategori', '$ket')");

    if($addTotb_kategori){
        header('Location:kategori.php');
    } else{
        echo "Gagal";
        header('Location:kategori.php');
    }
}

// Updata / Edit Kategori
if(isset($_POST['updateKategori'])){
    $idK = $_POST['idKategori'];
    $namaKategori = $_POST['namaKategori'];
    $ketKategori = $_POST['keteranganKategori'];

    $updateKategori = mysqli_query($conn, "UPDATE tb_kategori SET nama_kategori ='$namaKategori', keterangan ='$ketKategori' WHERE id_Kategori = '$idK'");

    if($updateKategori){
        header('Location:kategori.php');
    } else{
        echo "Gagal";
        header('Location:kategori.php');
    }
}

// Delete Kategori
if(isset($_POST['deleteKategori'])){
    $idK = $_POST['idKategori'];

    $deleteKategori = mysqli_query($conn, "DELETE FROM tb_kategori WHERE id_kategori = '$idK'");

    if($deleteKategori){
        header('Location:kategori.php');
    } else{
        echo "Gagal";
        header('Location:kategori.php');
    }
}

// R U A N G A N
// Update / Edit Ruangan
if(isset($_POST['updateRuangan'])){
    $idR = $_POST['idRuangan'];
    $namaRuangan = $_POST['namaRuangan'];

    $updateRuangan = mysqli_query($conn, "UPDATE tb_ruangan SET nama_ruangan = '$namaRuangan' WHERE id_ruangan = '$idR'");

    if($updateRuangan){
        header('Location:ruangan.php');
    } else{
        echo "Gagal";
        header('Location:ruangan.php');
    }
}

// Delete Ruangan
if(isset($_POST['deleteRuangan'])){
    $idR = $_POST['idRuangan'];

    $deleteRuangan = mysqli_query($conn, "DELETE FROM tb_ruangan WHERE id_ruangan = '$idR'");

    if($deleteRuangan){
        header('Location:ruangan.php');
    } else{
        echo "Gagal";
        header('Location:ruangan.php');
    }
}


// Tambah Ruangan
if(isset($_POST['tambahRuangan'])){
    $nRuangan = $_POST['namaRuangan'];

    $addTotb_ruangan = mysqli_query($conn, "INSERT INTO tb_ruangan (nama_ruangan) VALUES ('$nRuangan')");

    if($addTotb_ruangan){
        header('Location:ruangan.php');
    } else{
        echo "Gagal";
        header('Location:ruangan.php');
    }
}

// Tambah Barang
if(isset($_POST['tambahBarang'])){
    $nBarang = $_POST['namaBarang'];
    $newMerek = $_POST['listMerek'];
    $newKategori = $_POST['listKategori'];
    $newRuangan = $_POST['listRuangan'];
    $newJBarang = $_POST['jumlahBarang'];
    $kBarang = $_POST['listKondisiBarang'];
    $ketBarang = $_POST['keteranganBarang'];

    $addTotb_stok = mysqli_query($conn, "INSERT INTO tb_stok (nama_barang, id_merek, id_kategori, id_ruangan, jumlah_stok, id_kondisi_barang, keterangan_barang) VALUES ('$nBarang', '$newMerek', '$newKategori', '$newRuangan', '$newJBarang', '$kBarang', '$ketBarang')");

    if($addTotb_stok){
        header('Location:stok_barang.php');
    } else{
        echo "Gagal";
        header('Location:stok_barang.php');
    }
}

// Tambah Barang Masuk
if(isset($_POST['tambahBarangMasuk'])){
    $nBarang = $_POST['listBarang'];
    $nMerek =$_POST['listMerek'];
    $nKategori = $_POST['listKategori'];
    $nRuangan = $_POST['listRuangan'];
    $jBMasuk = $_POST['jumlahBMasuk'];
    $ketBMasuk = $_POST['ketBMasuk'];

    $cekJStok = mysqli_query($conn, "SELECT * FROM tb_stok WHERE id_stok = '$nBarang'");
    $getDataJStok = mysqli_fetch_array($cekJStok);

    $updateNowStok = $getDataJStok['jumlah_stok'];
    $count_NowStokandNewStok = $updateNowStok + $jBMasuk;

    $addBMasuk = mysqli_query($conn, "INSERT INTO tb_barang_masuk 
    (id_stok, 
    id_merek, 
    id_kategori, 
    id_ruangan, 
    jumlah_barang_masuk, 
    ket_bMasuk) 
    VALUES 
    ('$nBarang', 
    '$nMerek', 
    '$nKategori', 
    '$nRuangan', 
    '$jBMasuk', 
    '$ketBMasuk')");

    $updateStokMasuk = mysqli_query($conn, "UPDATE tb_stok SET jumlah_stok='$count_NowStokandNewStok' WHERE id_stok='$nBarang'");

    if($addBMasuk&&$count_NowStokandNewStok){
        header('Location:barang_masuk.php');
    } else{
        echo "Gagal";
        header('Location:barang_masuk.php');
    }
}

// Tambah Barang Keluar
if(isset($_POST['tambahBarangKeluar'])){
    $nBarang = $_POST['listBarang'];
    $nMerek =$_POST['listMerek'];
    $nKategori = $_POST['listKategori'];
    $nRuangan = $_POST['listRuangan'];
    $jBKeluar = $_POST['jumlahBKeluar'];
    $ketBKeluar = $_POST['ketBKeluar'];

    $cekJStok = mysqli_query($conn, "SELECT * FROM tb_stok WHERE id_stok = '$nBarang'");
    $getDataJStok = mysqli_fetch_array($cekJStok);

    $updateNowStok = $getDataJStok['jumlah_stok'];
    $count_NowStokandNewStok = $updateNowStok - $jBKeluar;

    $addBMasuk = mysqli_query($conn, "INSERT INTO tb_barang_keluar
    (id_stok, 
    id_merek, 
    id_kategori, 
    id_ruangan, 
    jumlah_barang_keluar, 
    ket_bKeluar) 
    VALUES 
    ('$nBarang', 
    '$nMerek', 
    '$nKategori', 
    '$nRuangan', 
    '$jBKeluar', 
    '$ketBKeluar')");

    $updateStokKeluar = mysqli_query($conn, "UPDATE tb_stok SET jumlah_stok='$count_NowStokandNewStok' WHERE id_stok='$nBarang'");

    if($addBMasuk&&$count_NowStokandNewStok){
        header('Location:barang_keluar.php');
    } else{
        echo "Gagal";
        header('Location:barang_keluar.php');
    }
}







?>
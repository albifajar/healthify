<?php


include 'config.php';
session_start();
if ($_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
}
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <center>
        <font size="6">Tambah Data</font>
    </center>
    <hr>
    <?php
    if (isset($_POST['submit'])) {
        $id_katalogObat         = $_POST['id_katalogObat'];
        $nama_penyakit               = $_POST['nama_penyakit'];
        $deskripsi          = $_POST['deskripsi'];
        $gejala             = $_POST['gejala'];
        $penyebab           = $_POST['penyebab'];
        $resep_obat         = $_POST['resep_obat'];
        

        $cek = mysqli_query($koneksi, "SELECT * FROM katalog_obat WHERE id_katalogObat='$id_katalogObat'") or die(mysqli_error($koneksi));

        if (mysqli_num_rows($cek) == 0) {
            $sql = mysqli_query($koneksi, "INSERT INTO katalog_obat (id_katalogObat, nama_penyakit, deskripsi, gejala, penyebab, resep_obat) VALUES ('$id_katalogObat', '$nama_penyakit', '$deskripsi', '$gejala', '$penyebab', '$resep_obat')") or die(mysqli_error($koneksi));

            if ($sql) {
                echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=katalog";</script>';
            } else {
                echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
            }
        } else {
            echo '<div class="alert alert-warning">Gagal, Id sudah terdaftar.</div>';
        }
    }
    ?>

    <form action="index.php?page=tambah_katalog" method="post" enctype="multipart/form-data">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">nama_penyakit</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="nama_penyakit" class="form-control" required>
            </div>
        </div>
                <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="deskripsi" class="form-control" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Gejala</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="gejala" class="form-control" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Penyebab</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="penyebab" class="form-control" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">resep_obat</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="resep_obat" class="form-control" required>
            </div>
        </div>
        
        <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-0">
                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                <a href="index.php?page=katalog" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </form>
</body>

</html>
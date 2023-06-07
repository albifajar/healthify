<?php
include '../admin/config.php';
require 'function.php';
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
    if (isset($_POST['simpan'])) {
        if(tambah($_POST) > 0) {

            echo "
            <script>
                alert('Data berhasil ditambahkan');
                document.location.href = tampil_artikel.php;
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Data gagal ditambahkan');
                document.location.href = tambah_artikel.php;
            </script>
            ";
        }
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Judul</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="judul" class="form-control" required>
            </div>
        </div>
                <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Isi Artikel</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="isi_artikel" class="form-control" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Sub judul</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="sub_judul" class="form-control" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">sub desk</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="sub_desk" class="form-control" required>
            </div>
        </div>
        
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Gambar</label>
            <div class="col-md-6 col-sm-6">
                <input type="file" name="gambar" class="form-control" required>
            </div>
        </div>
        <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-0">
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                <a href="index.php?page=tampil_artikel" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </form>
</body>

</html>
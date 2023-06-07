<?php
include '../dokter/config.php';
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
        $id_dokter         = $_POST['id_dokter'];
        $nama_dokter       = $_POST['nama_dokter'];
        $username          = $_POST['username'];
        $password          = $_POST['password'];
        $spesialis         = $_POST['spesialis'];
        $jk                = $_POST['jk'];
        $no_telp           = $_POST['no_telp'];
        $alamat            = $_POST['alamat'];
        $gambar            = $_POST['gambar'];

        $hashedPassword = md5($password);

        $cek = mysqli_query($koneksi, "SELECT * FROM dokter WHERE id_dokter='$id_dokter'") or die(mysqli_error($koneksi));

        if (mysqli_num_rows($cek) == 0) {
            $sql = mysqli_query($koneksi, "INSERT INTO dokter (id_dokter, nama_dokter, username, password, spesialis, jk, no_telp, alamat, gambar) VALUES ('$id_dokter', '$nama_dokter', '$username', '$hashedPassword','$spesialis', '$jk', '$no_telp', '$alamat', '$gambar')") or die(mysqli_error($koneksi));

            if ($sql) {
                echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_dokter";</script>';
            } else {
                echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
            }
        } else {
            echo '<div class="alert alert-warning">Gagal, Id sudah terdaftar.</div>';
        }
    }
    ?>

    <form action="index.php?page=tambah_dokter" method="post">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Dokter</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="nama_dokter" class="form-control" required>
            </div>
        </div>
                <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Username</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="username" class="form-control" required>

            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Password</label>  
            <div class="col-md-6 col-sm-6">
                <input type="password" name="password" class="form-control" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Spesialis</label>
            <div class="col-md-6 col-sm-6">
                <select name="spesialis" id="spesialis" class="form-control">
                    <option>Pilih Dokter</option>
                    <option>Dokter Umum</option>
                    <option>Dokter Gigi</option>
                    <option>Dokter Anak</option>
                    <option>Dokter Kandungan</option>
                    <option>Dokter THT</option>
                    <option>Dokter Jantung</option>
                </select>
                
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
            <div class="col-md-6 col-sm-6">
                <input type="radio" name="jk" required value="Perempuan">
                <label for="Perempuan">Perempuan</label> &nbsp &nbsp &nbsp
                <input type="radio" name="jk" required value="Laki-Laki">
                <label for="Perempuan">Laki-Laki</label>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">No. Telp</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="no_telp" class="form-control" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
            <div class="col-md-6 col-sm-6">
                <input type="text" name="alamat" class="form-control" required>
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
                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                <a href="index.php?page=tampil_dokter" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </form>
</body>

</html>
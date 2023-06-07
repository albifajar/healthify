<?php
include '../dokter/config.php';
session_start();
if ($_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Admin </title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
    textarea {
    width: 530px !important;
    height: 150px !important;
    }
    </style>
</head>

<body>
    <div class="" style="margin-top:20px">
        <center>
            <font size="6">Edit Data Dokter</font>
        </center>

        <hr>

        <?php
        //jika sudah mendapatkan parameter GET id dari URL
        if (isset($_GET['id_dokter'])) {
            //membuat variabel $id untuk menyimpan id dari GET id di URL
            $id_dokter = $_GET['id_dokter'];

            //query ke database SELECT tabel mahasiswa berdasarkan id = $id
            $select = mysqli_query($koneksi, "SELECT * FROM dokter WHERE id_dokter='$id_dokter'") or die(mysqli_error($koneksi));

            //jika hasil query = 0 maka muncul pesan error
            if (mysqli_num_rows($select) == 0) {
                echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
                exit();
                //jika hasil query > 0
            } else {
                //membuat variabel $data dan menyimpan data row dari query
                $data = mysqli_fetch_assoc($select);
            }
        }
        ?>

         

        <?php
        //jika tombol simpan di tekan/klik
        if (isset($_POST['submit'])) {
            $nama_dokter           = $_POST['nama_dokter'];
            $username              = $_POST['username'];
            $password              = $_POST['password'];
            $spesialis             = $_POST['spesialis'];
            $jk                    = $_POST['jk']; 
            $no_telp               = $_POST['no_telp'];
            $alamat                = $_POST['alamat'];
            $gambar                = $_POST['gambar'];

            $hashedPassword = md5($password);


            $sql = mysqli_query($koneksi, "UPDATE dokter SET nama_dokter='$nama_dokter', username='$username', password='$hashedPassword', spesialis='$spesialis', spesialis='$spesialis', jk='$jk', no_telp='$no_telp', alamat='$alamat', gambar='$gambar' WHERE id_dokter='$id_dokter'") or die(mysqli_error($koneksi));

            if ($sql) {
                echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_dokter";</script>';
            } else {
                echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
            }
        }
        ?>

        <form action="index.php?page=edit_dokter&id_dokter=<?php echo $id_dokter; ?>" method="post">
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Dokter</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="nama_dokter" class="form-control" value="<?php echo $data['nama_dokter']; ?>" required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Username</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>" required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Password</label>
                <div class="col-md-6 col-sm-6">
                    <input type="password" name="password" class="form-control" value="<?php echo $data['password']; ?>" required>
                </div>
            </div>
            </div>
            

            <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Spesialis</label>
            <div class="col-md-6 col-sm-6">
                <select name="spesialis" id="spesialis" class="form-control">
                    <option><?php echo $data['spesialis']; ?></option>
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
                <input type="radio" name="jk" required value="Perempuan" value="<?php echo $data['jk']; ?>" required>
                <label for="Perempuan">Perempuan</label> &nbsp &nbsp &nbsp
                <input type="radio" name="jk" required value="Laki-Laki" value="<?php echo $data['jk']; ?>" required>
                <label for="Perempuan">Laki-Laki</label>
            </div>
        </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">NO. Telp</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="no_telp" class="form-control" value="<?php echo $data['no_telp']; ?>" required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
                <div class="col-md-6 col-sm-6">
                    <textarea class="form-control" name="alamat" aria-label="With textarea"><?php echo $data['alamat']; ?></textarea>

                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Gambar</label>
                <div class="col-md-6 col-sm-6">
                    <input type="file" name="gambar" class="form-control" value="<?php echo $data['gambar']; ?>">
                </div>
            </div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-0">
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                    <a href="index.php?page=tampil_dokter" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
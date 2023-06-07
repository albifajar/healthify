<?php
include 'config.php';
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
    <title> Healthify </title>
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
            <font size="6">Edit Data Katalog</font>
        </center>

        <hr>

        <?php
        //jika sudah mendapatkan parameter GET id dari URL
        if (isset($_GET['id_katalogObat'])) {
            //membuat variabel $id untuk menyimpan id dari GET id di URL
            $id_katalogObat = $_GET['id_katalogObat'];

            //query ke database SELECT tabel mahasiswa berdasarkan id = $id
            $select = mysqli_query($koneksi, "SELECT * FROM katalog_obat WHERE id_katalogObat='$id_katalogObat'") or die(mysqli_error($koneksi));

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
            $nama_penyakit           = $_POST['nama_penyakit'];
            $deskripsi      = $_POST['deskripsi'];
            $gejala         = $_POST['gejala'];
            $penyebab       = $_POST['penyebab'];
            $resep_obat     = $_POST['resep_obat'];
            

            $sql = mysqli_query($koneksi, "UPDATE katalog_obat SET nama_penyakit='$nama_penyakit', deskripsi='$deskripsi', gejala='$gejala', penyebab='$penyebab', resep_obat='$resep_obat' WHERE id_katalogObat='$id_katalogObat'") or die(mysqli_error($koneksi));

            if ($sql) {
                echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=katalog";</script>';
            } else {
                echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
            }
        }
        ?>

        <form action="index.php?page=edit_katalog&id_katalogObat=<?php echo $id_katalogObat; ?>" method="post">
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Penyakit</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="nama_penyakit" class="form-control" value="<?php echo $data['nama_penyakit']; ?>" required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Deskripsi</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="deskripsi" class="form-control" value="<?php echo $data['deskripsi']; ?>" required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Gejala</label>
                <div class="col-md-6 col-sm-6">
                    <textarea class="form-control" name="gejala" aria-label="With textarea"><?php echo $data['gejala']; ?></textarea>

                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Penyebab</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="penyebab" class="form-control" value="<?php echo $data['penyebab']; ?>" required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">resep_oba</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="resep_obat" class="form-control" value="<?php echo $data['resep_obat']; ?>">
                </div>
            </div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-0">
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                    <a href="index.php?page=katalog" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
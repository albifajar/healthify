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
            <font size="6">Edit Data Admin</font>
        </center>

        <hr>

        <?php
        //jika sudah mendapatkan parameter GET id dari URL
        if (isset($_GET['id_admin'])) {
            //membuat variabel $id untuk menyimpan id dari GET id di URL
            $id_admin = $_GET['id_admin'];

            //query ke database SELECT tabel mahasiswa berdasarkan id = $id
            $select = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin='$id_admin'") or die(mysqli_error($koneksi));

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
            $username              = $_POST['username'];
            $password              = $_POST['password'];
            
            $hashedPassword = md5($password);


            $sql = mysqli_query($koneksi, "UPDATE admin SET username='$username', password='$hashedPassword' ") or die(mysqli_error($koneksi));

            if ($sql) {
                echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_admin";</script>';
            } else {
                echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
            }
        }
        ?>

        <form action="index.php?page=edit_admin&id_admin=<?php echo $id_admin; ?>" method="post">
            
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
                <div class="col-md-6 col-sm-6 offset-md-0">
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                    <a href="index.php?page=tampil_admin" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
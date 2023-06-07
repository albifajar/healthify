<?php
include '../admin/config.php';
include '../admin/function.php';


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
            <font size="6">Edit Data Artikel</font>
        </center>

        <hr>

        <?php
        //jika sudah mendapatkan parameter GET id dari URL
        if (isset($_GET['id_artikel'])) {
            //membuat variabel $id untuk menyimpan id dari GET id di URL
            $id_artikel = $_GET['id_artikel'];

            //query ke database SELECT tabel berdasarkan id = $id
            $select = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id_artikel='$id_artikel'") or die(mysqli_error($koneksi));

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
            $judul = $_POST['judul'];
            $subjudul      = $_POST['sub_judul'];
            $subdesk         = $_POST['sub_desk'];
            $isiartikel       = $_POST['isi_artikel'];
            $gambar = $_FILES['gambar']['name'];


            $sql = mysqli_prepare($koneksi, "UPDATE artikel SET judul=?, sub_judul=?, sub_desk=?, isi_artikel=?,  gambar=? WHERE id_artikel=?");
            mysqli_stmt_bind_param($sql, $judul, $subjudul, $subdesk, $isiartikel, $gambar);
            mysqli_stmt_execute($sql);
            
            if ($sql) {
                echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_penyakit";</script>';
            } else {
                echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
            }
        }
        ?>

<form action="index.php?page=edit_artikel&id_artikel=<?php echo $id_artikel; ?>" method="post" enctype="multipart/form-data">

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Judul Artikel</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="judul" class="form-control" value="<?php echo $data['judul']; ?>" required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Sub Judul</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="sub_judul" class="form-control" value="<?php echo $data['sub_judul']; ?>" required>
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Sub deskripsi</label>
                <div class="col-md-6 col-sm-6">
                    <textarea class="form-control" name="sub_desk" aria-label="With textarea"><?php echo $data['sub_desk']; ?></textarea>

                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Isi Artikel</label>
                <div class="col-md-6 col-sm-6">
                    <input type="text" name="isi_artikel" class="form-control" value="<?php echo $data['isi_artikel']; ?>" required>
                </div>
            </div>
          
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align">Gambar</label>
                <div class="col-md-6 col-sm-6">
                <input type="file" name="gambar" class="form-control" ><img src="img-penyakit/<?php echo $row["gambar"]; ?>" width="150">
                </div>
            </div>
            <div class="item form-group">
                <div class="col-md-6 col-sm-6 offset-md-0">
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                    <a href="index.php?page=tampil_artikel" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
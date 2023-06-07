<?php
include '../dokter/config.php';
require 'function.php';
session_start();
if ($_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
}

$artikel = query("SELECT * FROM artikel ORDER BY judul ASC");
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
    <div class="" style="margin-top:20px">
        <center>
            <font size="6">Artikel</font>
        </center>
        <hr>
        <br>
        <div class="row">
            <div class="col-sm-6 mb-3">
                <!-- Search / Cari -->
                <form action="" method="post">
                    <div class="input-group">
                        <input type="text" name="kunci" placeholder="Cari..." autocomplete="off" class="form-control" style="padding: 0% 5px !important;">
                        <div class="input-group-append">
                            <button type="submit" name="cari" class="btn btn-secondary"><i class="fa fa-search"></i> Cari</button>
                        </div>
                    </div>
                </form>
            </div>
            <br>
            <a href="index.php?page=tambah_artikel"><button class="btn btn-primary right">Tambah Data</button></a>
        </div>
        <div class="table-responsive"><br />
            <table class="table table-striped jambo_table bulk_action" border="1">
                <thead>
                    <tr>
                      
                        <th>Judul</th>
                        <th>Isi Artikel</th>
                        <th>Sub Judul</th>
                        <th>Sub Desk</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                   
                    <?php foreach($artikel as $row) : ?>
                        <tr valign="middle">
                           
                            <td><?php echo $row["judul"] ?></td>
                            <td><?php echo $row["isi_artikel"] ?></td>
                            <td><?php echo $row["sub_judul"] ?></td>
                            <td><?php echo $row["sub_desk"] ?></td>
                            <td><img src="img-penyakit/<?php echo $row["gambar"]; ?>" width="150"></td>
                            <td>
                                <a href="index.php?page=edit_artikel&id_artikel=' . $data['id_artikel'] . '" class="btn btn-secondary btn-sm"><i class="fas fa-edit">edit</i></a>
                                <a href="delete_artikel.php?id_artikel=' . $data['id_artikel'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?)\'"><i class="fas fa-trash">hapus</i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <tbody>
            </table>
        </div>
    </div>
</body>

</html>
<?php

session_start();
if ($_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
}
include '../dokter/config.php';
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
            <font size="6">Daftar Keluhan</font>
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
            <a href="index.php?page=tambah_penyakit"><button class="btn btn-primary right"><i class="fas fa-plus"> Tambah Data</i></button></a>
        </div>
        <div class="table-responsive"><br />
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>    
                        <th>Nama Penyakit</th>
                        <th>Deskripsi</th>
                        <th>Gejala</th>
                        <th>Penyebab</th>
                        <th>Pengobatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //query ke database SELECT tabel penyakit urut berdasarkan id yang paling besar
                    $sql = mysqli_query($koneksi, "SELECT * FROM penyakit ORDER BY id_penyakit DESC") or die(mysqli_error($koneksi));
                    //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                    if (mysqli_num_rows($sql) > 0) {
                        
                        //melakukan perulangan while dengan dari dari query $sql
                        while ($data = mysqli_fetch_assoc($sql)) {
                            //menampilkan data perulangan
                            echo '
						<tr>
				
							<td>' . $data['nama'] . '</td>
                            <td>' . $data['deskripsi'] . '</td>
							<td>' . $data['gejala'] . '</td>
							<td>' . $data['penyebab'] . '</td>
							<td>' . $data['pengobatan'] . '</td>

							<td> 
								<a href="index.php?page=edit_penyakit&id_penyakit=' . $data['id_penyakit'] . '" class="btn btn-secondary btn-sm"><i class="fas fa-edit">edit</i></a><br><br>
								<a href="delete_penyakit.php?id_penyakit=' . $data['id_penyakit'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')"><i class="fas fa-trash">hapus</i></a>
							</td>
						</tr>
						';
                            $no++;
                        }
                        //jika query menghasilkan nilai 0
                    } else {
                        echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
                    }
                    ?>
                <tbody>
            </table>
        </div>
    </div>
</body>

</html>
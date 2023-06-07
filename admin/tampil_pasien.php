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
    <div class="" style="margin-top:20px">
        <center>
            <font size="6">Data Pasien</font>
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
          
        </div>
        <div class="table-responsive"><br />
            <table class="table table-striped jambo_table bulk_action" border="1">
                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>Nama Lengkap</th>
                        <th>Username </th>
                        <th>email</th>
                        <th>password</th>
    
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //query ke database SELECT tabel pasien urut berdasarkan id yang paling besar
                    $sql = mysqli_query($koneksi, "SELECT * FROM pasien ORDER BY id_pasien DESC") or die(mysqli_error($koneksi));
                    //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                    if (mysqli_num_rows($sql) > 0) {
                        //membuat variabel $no untuk menyimpan nomor urut
                        $no = 1;
                        //melakukan perulangan while dengan dari dari query $sql
                        while ($data = mysqli_fetch_assoc($sql)) {
                            //menampilkan data perulangan
                            echo '
                        <tr>
                            <td>' . $no . '</td>
                            <td>' . $data['nama'] . '</td>
                            <td>' . $data['username'] . '</td>
                            <td>' . $data['email'] . '</td>
                            <td>' . $data['password'] . '</td>
                         
                            
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
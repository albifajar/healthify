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
    <div class="container" style="margin-top:20px">
        <center>
            <font size="6">Laporan</font>
        </center>
        <hr>
        
        <div class="table-responsive"><br />
            <table class="table table-striped jambo_table bulk_action" border="1">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID_room</th>
                        <th>ID_dokter</th>
                        <th>Tanggal</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //query ke database SELECT tabel admin urut berdasarkan id yang paling besar
                    $sql = mysqli_query($koneksi, "SELECT * FROM obrolan ORDER BY id_obrolan DESC") or die(mysqli_error($koneksi));
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
                            <td>' . $data['id_room'] . '</td>
                            <td>' . $data['id_dokter'] . '</td>
                            <td>' . $data['tanggal'] . '</td>
                            
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
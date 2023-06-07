<?php
include 'config.php';
session_start();
if ($_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Healthify</title>
    <link rel="stylesheet" href="css/style_dokter.css">
    <link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Icon -->
    <link rel="icon" href="../vendor/img/h_logo.svg" sizes="20x20" type="imgae/png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</head>

<body>
    
          <div class="" style="margin-top:20px">
        <center>
            <font size="6">Katalog Obat</font>
        </center>
        <hr>
        <br>
                <div class="row">
            <div class="col-sm-6 mb-3">
                <!-- Search / Cari -->
                <form action="" method="post">
                    <div class="input-group">
                       

                        <input type="text" name="nama" placeholder="Cari..." autocomplete="off" class="form-control" style="padding: 0% 5px !important;" >
                        <div class="input-group-append">
                            <button type="submit" name="cari" class="btn btn-secondary"><i class="fa fa-search"></i> Cari</button>

                        </div>
                    </div>
                </form>
            </div>
            <br>
      
               <a href="tambah_katalog.php"><button class="btn btn-primary right">Tambah Data</button></a>
            </div>
          
            
        </div>

<!-- coba -->


  
  <div id="searchResults">
    <div class="table-responsive"><br />
            <table class="table table-striped jambo_table bulk_action" border="1">
                <thead>
                    <tr>
                        
                        <th>Nama Penyakit</th>
                        <th>Deskripsi</th>
                        <th>Gejala</th>
                        <th>Penyebab</th>
                        <th>Resep Obat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
    <?php
      if (isset($_POST['nama'])) {
        $searchName = $_POST['nama'];
        $koneksi = mysqli_connect("localhost", "root", "", "Healthify");
        
        // Sanitasi input dan persiapan query
        $searchName = mysqli_real_escape_string($koneksi, $searchName);
        $query = "CALL cariObat('$searchName')";
        
        // Eksekusi query
        $result = mysqli_query($koneksi, $query);
        
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo '
            <tr>
            <td>' . $row['nama_penyakit'] . '</td>
            <td>' . $row['deskripsi'] . '</td>
            <td>' . $row['gejala'] . '</td>
            <td>' . $row['penyebab'] . '</td>
            <td>' . $row['resep_obat'] . '</td>
            <td>
                 <a href="index.php?page=edit_katalog&id_katalogObat=' . $row['id_katalogObat'] . '" class="btn btn-secondary btn-sm"><i class="fas fa-edit">edit</i></a><br><br>
                <a href="delete_katalog.php?id_katalogObat=' . $row['id_katalogObat'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')"><i class="fas fa-trash">hapus</i></a>
            </td>
            </tr>
            ';
          }
        } else {
          echo '<div class="alert alert-warning">Data Obat Tidak Tersedia.</div>';
        }
        
        mysqli_close($koneksi);
        exit(); // Menghentikan eksekusi kode setelah menampilkan hasil pencarian
      }
    ?>
    
      <!-- Tampilkan semua data jika tidak ada pencarian -->
     <?php
                              
        $query = "CALL cariObat('')";
        $result = mysqli_query($koneksi, $query);
            if (mysqli_num_rows($result) > 0) {
                               
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
            <tr>
            <td>' . $row['nama_penyakit'] . '</td>
            <td>' . $row['deskripsi'] . '</td>
            <td>' . $row['gejala'] . '</td>
            <td>' . $row['penyebab'] . '</td>
            <td>' . $row['resep_obat'] . '</td>
            <td>
                 <a href="index.php?page=edit_katalog&id_katalogObat=' . $row['id_katalogObat'] . '" class="btn btn-secondary btn-sm"><i class="fas fa-edit">edit</i></a><br><br>
                <a href="delete_katalog.php?id_katalogObat=' . $row['id_katalogObat'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')"><i class="fas fa-trash">hapus</i></a>
            </td>
            </tr>
            ';
            
         }
      } else {
        echo 'Tidak ada data obat';
      }

      mysqli_close($koneksi);
    ?>
                       
                 
                <tbody>
            </table>
        </div>
    </div>

  </div>
                    
</body>
       

    <script type="text/javascript">
        $(document).ready(function() {
            $('.nav_btn').click(function() {
                $('.mobile_nav_items').toggleClass('active');
            });
        });
    </script>

</body>

</html>
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
  <title>Contoh Aplikasi Pencarian Obat</title>
</head>
<body>
  <h1>Pencarian Obat</h1>
  
  <form action="" method="GET">
    <input type="text" name="nama_penyakit" placeholder="Masukkan Keluhan">
    <input type="submit" value="Cari">
  </form>
  
  <div id="searchResults">
    <?php
      if (isset($_GET['nama_penyakit'])) {
        $keyword = $_GET['nama_penyakit'];
        $koneksi = mysqli_connect("localhost", "root", "", "healthify");
        
        // Sanitasi input dan persiapan query
        $keyword = mysqli_real_escape_string($koneksi, $keyword);
        $query = "CALL cariObat('$keyword')";
        
        // Eksekusi query
        $result = mysqli_query($koneksi, $query);
        
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo 'nama_penyakit : ' . $row['nama_penyakit'] . ', resep_obat: ' . $row['resep_obat'] . '<br>';
          }
        } else {
          echo 'Tidak ada hasil pencarian ';
        }
        
        mysqli_close($koneksi);
      }
    ?>
  </div>

  <h1>Katalog Obat</h1>
  <table class="table table-striped jambo_table bulk_action" border="1">
                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>Nama Penyakit</th>
                        <th>Deskripsi</th>
                        <th>Gejala</th>
                        <th>Penyebab</th>
                        <th>Resep</th>
                        
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //query ke database SELECT tabel penyakit urut berdasarkan id yang paling besar
                    $sql = mysqli_query($koneksi, "SELECT * FROM katalog_obat ORDER BY id_katalogObat DESC") or die(mysqli_error($koneksi));
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
              <td>' . $data['nama_penyakit'] . '</td>
              <td>' . $data['deskripsi'] . '</td>
              <td>' . $data['gejala'] . '</td>
              <td>' . $data['penyebab'] . '</td>
              <td>' . $data['resep_obat'] . '</td>
              
              <td>
                <a href="index.php?page=edit_penyakit&id_penyakit=' . $data['id_penyakit'] . '" class="btn btn-secondary btn-sm"><i class="fas fa-edit">edit</i></a>
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


</body>
</html>

<!-- include "koneksi.php";

$nama = $_POST['nama'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

mysqli_query($koneksi, "INSERT INTO user VALUES ('$nama', '', '', '$username', '$email', '$password')");

header("location: datauser.php"); -->

<?php
if (isset($_POST['simpan'])) {

    include '../../../dokter/config.php';

    // Kode Otomatis
    // $char = 'USER';
    // $query = mysqli_query($koneksi, "SELECT max(id_user) as max_user FROM user WHERE id_user LIKE '{$char}%' ORDER BY id_user DESC LIMIT 1");
    // $data = mysqli_fetch_array($query);
    // $kodeUser = $data['max_user'];
    // $no = substr($kodeUser, -3, 3);
    // $no = (int) $no;
    // $no += 1;
    // $newKodeUser = $char . sprintf("%03s", $no);
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Insert ke Tabel User
    mysqli_query($koneksi, "INSERT INTO pasien VALUES ('', '$nama', '', '', '$username', '$email', '$password')");

    // Pindah Halaman
    header("location: ../../../login.php");
}
?>
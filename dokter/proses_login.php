<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'config.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

$hashedPassword = md5($password);

// menyeleksi data dokter dengan username dan password yang sesuai
$data = mysqli_query($koneksi, "SELECT * FROM dokter WHERE username='$username' AND password='$hashedPassword'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if ($cek > 0) {
	$_SESSION['username'] = $username;
    $_SESSION['data'] = mysqli_fetch_assoc(

    );
	$_SESSION['status'] = "login";
	header("location:index.php");
} else {
	header("location:login.php?pesan=gagal");
}

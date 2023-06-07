<?php
$server = "localhost";
$username = "root";
$pass = "";

$koneksi = mysqli_connect($server, $username, $pass);

mysqli_select_db($koneksi, "health") or die("database tidak terkoneksi");

// echo "koneksi berhasil";

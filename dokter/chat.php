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
    <link rel="stylesheet" href="css/style_chat.css">
    <link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">
    <!-- Icon -->
    <link rel="icon" href="../vendor/img/caredoc.png" sizes="20x20" type="imgae/png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</head>

<body>
    <input type="checkbox" id="check">
    <!--header -->
    <header>
        <label for="check">
            <i class="fas fa-bars" id="sidebar_btn"></i>
        </label>
        <div class="left_area">
            <h3>Health</h3>
        </div>
        <div class="right_area">
            <a href="logout.php" class="logout_btn">Logout</a>
        </div>
    </header>
    <!--header akhir-->
    <!--navigasi mobile -->
    <div class="mobile_nav">
        <div class="nav_bar">
            <i class="fa fa-bars nav_btn"></i>
        </div>
        <div class="mobile_nav_items">
            <a href="index.php"><i class="fas fa-home"></i><span>Dashboard</span></a>
            <a href="chat.php"><i class="fas fa-edit"></i><span>Chatting</span></a>
            <a href="pasien.php"><i class="fas fa-user"></i><span>Data Pasien</span></a>
            <a href="katalog.php"><i class="fas fa-desktop"></i><span>Katalog Obat</span></a>
            <a href="profil.php"><i class="fas fa-edit"></i><span>Edit Akun</span></a>
        </div>
    </div>
    <!--navigasi mobile akhir-->
    <!--sidebar-->
    <div class="sidebar">
        <div class="profile_info">
            <h4> Selamat Datang Dokter</h4>
        </div>
        <a href="index.php"><i class="fas fa-home"></i><span>Dashboard</span></a>
        <a href="chat.php"><i class="fas fa-edit"></i><span>Chatting</span></a>
        <a href="pasien.php"><i class="fas fa-user"></i><span>Data Pasien</span></a>
        <a href="katalog.php"><i class="fas fa-desktop"></i><span>Katalog Obat</span></a>
        <a href="profil.php"><i class="fas fa-edit"></i><span>Edit Akun</span></a>
    
    </div>
    <!--sidebar akhir-->

    <div class="content">
         <div class="wrapper">
        <div class="title">Healthify </div>
        <div class="box">
            <div class="item">
                <div class="icon"></div>
                <div class="msg">
                    <p>Hallo Dokter saya Dinda, saya mengalami susah tidur selama semingu ini. saya kenapa ya dok dan apa yang harus saya lakukan? </p>

                </div>
            </div>
            <br clear="both">
            <div class="item right">
                <div class="msg">
                    <p>Hallo Dinda saya Dr. Andini Wilson Dokter Umum di Healthify, dari gejala yang anda sampaikan, kemungkinan besar anda terkena insomnia.</p>
                    <p>Insomnia adalah gangguan tidur yang ditandai dengan kesulitan dalam memulai atau mempertahankan tidur, atau tidur yang tidak nyenyak dan tidak memuaskan selama periode waktu yang cukup. Insomnia dapat berdampak pada kesehatan fisik dan mental seseorang jika dibiarkan tidak diatasi, sehingga diperlukan penanganan medis dan perubahan gaya hidup untuk mengatasinya.</p>
                </div>
            </div>
        </div>
        
        <div class="typing-area">
            <div class="input-field">
                <input type="text" placeholder="Ketik pesan.." required>
                <button>Kirim</button>
            </div>
        </div>
    </div>
       

    <script type="text/javascript">
        $(document).ready(function() {
            $('.nav_btn').click(function() {
                $('.mobile_nav_items').toggleClass('active');
            });
        });
    </script>

</body>

</html>
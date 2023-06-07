<?php
include '../dokter/config.php';
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
    <title> healthify</title>
    <link rel="stylesheet" href="css/style_admin.css">
     <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">
    <!-- Icon -->
    <link rel="icon" href="../vendor/img/healthify.png" sizes="20x20" type="imgae/png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

</head>

<body>
    <input type="checkbox" id="check">
    <!--header -->
    <header>
        <label for="check">
            <i class="fas fa-bars" id="sidebar_btn"></i>
        </label>
        <div class="left_area">
            <h3>Healthi<span></span></h3>
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
            <a href="index.php?page=tampil_dashboard"><i class="fas fa-user"></i><span>Dashboard</span></a>
            <a href="index.php?page=tampil_admin"><i class="fas fa-user"></i><span>Data Admin</span></a>
            <a href="index.php?page=tampil_penyakit"><i class="fas fa-desktop"></i><span>Data Penyakit</span></a>
            <a href="index.php?page=tampil_artikel"><i class="fas fa-desktop"></i><span>Data Artikel</span></a>
            <a href="index.php?page=tampil_dokter"><i class="fas fa-desktop"></i><span>Data Dokter</span></a>
            <a href="index.php?page=tampil_pasien"><i class="fas fa-users"></i><span>Data Pasien</span></a>
            <a href="../index.php"><i class="fas fa-location-arrow"></i><span>Halaman Web</span></a>
        </div>
    </div>
    <!--navigasi mobile akhir-->
    <!--sidebar-->
    <div class="sidebar">
        <div class="profile_info">
            <h4> Selamat Datang <?php echo $_SESSION['username']; ?></h4>
        </div>
        <a href="index.php?page=tampil_dashboard"><i class="fas fa-user"></i><span>Dashboard</span></a>

            <a href="index.php?page=tampil_admin"><i class="fas fa-user"></i><span>Data Admin</span></a>
            <a href="index.php?page=tampil_penyakit"><i class="fas fa-desktop"></i><span>Data Penyakit</span></a>
            <a href="index.php?page=tampil_artikel"><i class="fas fa-desktop"></i><span>Data Artikel</span></a>
            <a href="index.php?page=tampil_dokter"><i class="fas fa-desktop"></i><span>Data Dokter</span></a>
            <a href="index.php?page=tampil_pasien"><i class="fas fa-users"></i><span>Data Pasien</span></a>
            <a href="../index.php"><i class="fas fa-location-arrow"></i><span>Halaman Web</span></a>
    </div>
    <!--sidebar akhir-->

    <div class="content">
               


        <?php
        $queries = array();
        parse_str($_SERVER['QUERY_STRING'], $queries);
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        switch ($queries['page']) {
             case 'dashboard':
                
                include 'dashboard.php';
                break;

            case 'tampil_dashboard':
                
                include 'tampil_dashboard.php';
                break;
            
            case 'tampil_penyakit':
                
                include 'tampil_penyakit.php';
                break;
            case 'tambah_penyakit':
                
                include 'tambah_penyakit.php';
                break;
            case 'edit_penyakit':
                
                include 'edit_penyakit.php';
                break;
            case 'edit_penyakit_save':
                
                include 'edit_penyakit.php';
                break;



            case 'tampil_artikel':
                
                include 'tampil_artikel.php';
                break;
            case 'tambah_artikel':
                
                include 'tambah_artikel.php';
                break;
            case 'edit_artikel':
                
                include 'edit_artikel.php';
                break;
            case 'edit_artikel_save':
                
                include 'edit_artikel.php';
                break;



            case 'tampil_admin':
                include 'tampil_admin.php';
                break;

            case 'tambah_admin':
                include 'tambah_admin.php';
                break;

            case 'edit_admin':
                include 'edit_admin.php';
                break;

            case 'delete_admin':
                include 'delete_admin.php';
                break;

            case 'tampil_dokter':
                include 'tampil_dokter.php';
                break;

            case 'tambah_dokter':
                include 'tambah_dokter.php';
                break;

            case 'edit_dokter':
                include 'edit_dokter.php';
                break;

            case 'delete_dokter':
                include 'delete_dokter.php';
                break;


            case 'tampil_pasien':
                include 'tampil_pasien.php';
                break;

            case 'delete_pasien':
                include 'delete_pasien.php';
                break;

             case 'laporan':
                include 'laporan.php';
                break;

            default:
                #code...
                include 'home.php';
                break;
        }
        ?>
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
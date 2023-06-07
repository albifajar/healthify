<?php
include 'config.php';
session_start();
if ($_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
}
$data_user = $_SESSION['data'];

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Healthify</title>
    <link rel="stylesheet" href="css/style_dokter.css">
    <link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">
    <!-- Icon -->
    <link rel="icon" href="../vendor/img/h_logo.svg" sizes="20x20" type="imgae/png">
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
            <a href="index.php?pagehome.php"><i class="fas fa-home"></i><span>Dashboard</span></a>
            <a href="index.php?&loginField=login&redirect=&userName=<?=$data_user["username"]?>&password=<?=$data_user["password"]?>&channelName=<?=$data_user["channelPublic"]?>&lang=id"><i class="fas fa-edit"></i><span>Chatting</span></a>
            <a href="index.php?page=katalog"><i class="fas fa-desktop"></i><span>Katalog Obat</span></a>
        </div>
    </div>
    <!--navigasi mobile akhir-->
    <!--sidebar-->
    <div class="sidebar">
        <div class="profile_info">
            <h4> Selamat Datang <?php echo $_SESSION['username']; ?></h4>
        </div>
        <a href="index.php?pagehome.php"><i class="fas fa-home"></i><span>Dashboard</span></a>
            <a href="../chat?rolePath=dokter&loginField=login&redirect=&userName=<?=$data_user["username"]?>&password=<?=$data_user["password"]?>&channelName=<?=$data_user["channelPublic"]?>&lang=id"><i class="fas fa-edit"></i><span>Chatting</span></a>
            <a href="index.php?page=katalog"><i class="fas fa-desktop"></i><span>Katalog Obat</span></a>
    
    </div>
    <!--sidebar akhir-->

   <div class="content">
        <?php
        $queries = array();
        parse_str($_SERVER['QUERY_STRING'], $queries);
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        switch ($queries['page']) {
            case 'katalog':
                
                include 'katalog.php';
                break;
            case 'tambah_katalog':
                
                include 'tambah_katalog.php';
                break;
            case 'edit_katalog':
                
                include 'edit_katalog.php';
                break;
            case 'edit_katalog':
                
                include 'edit_katalog.php';
                break;

            case 'tampil_admin':
                include 'tampil_admin.php';
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
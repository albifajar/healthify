<?php
include '../config.php';
session_start();

$list_docter = mysqli_query($koneksi, "SELECT * FROM dokter");
$list_docter = mysqli_fetch_all($list_docter, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Healthify | Cari Dokter</title>
    <link href="" rel="shortcut icon" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="css/dokter.css?v=1"/>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/loader.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../css/dokter.css?v=1"/>
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="vendor/fontawesome-free/css/all.css">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">

</head>

<body>
<!-- header -->
<header class="header-area" id="page-top">
    <!-- site-navbar start -->
    <div class="navbar-area">
        <div class="container">
            <nav class="site-navbar">
                <!-- site logo -->
                <div class="content-image">
                    <img src="vendor/img/h_logo.svg" alt="healthify-logo">
                </div>
                <!-- site menu/nav -->
                <ul class="menu" id="menu">
                    <li>
                        <a href="index.php #page-top" class="scroll">Beranda</a>
                    </li>
                    <li><a href="index.php" class="scroll">Healthify</a></li>
                    <li class="active"><a href="healthdoc.php">Tanya Dokter</a></li>
                    <li><a href="artikel.php">Artikel</a></li>
                    <!-- <li><a href="healthify.php">Chat Dokter</a></li> -->
                    <li><a href="tim.php">Tim</a></li>
                    <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn">Akun</button>
                        <?php
                        include "../config.php";
                        $query = mysqli_query($koneksi, "SELECT * FROM pasien");
                        while ($data = mysqli_fetch_array($query)) { ?>
                            <div id="myDropdown" class="dropdown-content">
                                <a href="../profile.php?id=<?php echo $data['id_pasien']; ?>">Profil</a>
                                <a href="logout.php">Logout</a>
                            </div>
                        <?php } ?>
                    </div>
                </ul>
                <!-- nav-toggler for mobile version only -->
                <button class="nav-toggler">
                    <span></span>
                </button>
            </nav>
        </div>
    </div>
</header>
<!-- akhir header -->


<div class="container mb-4">
    <div class="cd-bawah-kanan">
        <div class="cd-list-dokter">
            <div class="row">
                <?php foreach ($list_docter as $row): ?>
                    <div class="col-4 mb-3">
                        <article class="card-1">
                            <div class="thumb">
                                <img
                                        src="../vendor/img/dr agung nugroho, sppd.jpg"
                                        alt=""
                                />
                            </div>
                            <div class="detail">
                                <div class="det-konten">
                                    <div class="det-konten-atas">
                                        <div class="det-ka-lagi">
                                            <p><?= $row['nama_dokter'] ?></p>
                                            <div class="det-kal-lagi">
                                                <img
                                                        src="vendor/img/cari-dokter/dokter-icon-1.svg"
                                                        alt=""
                                                />
                                                <p>Spesialis <?= $row['spesialis'] ?></p>
                                            </div>
                                            <div class="det-kal-lagi">
                                                <img
                                                        src="vendor/img/cari-dokter/dokter-icon-2.svg"
                                                        alt=""
                                                />
                                                <p>RS Immanuel Bandung</p>
                                            </div>
                                            <div class="det-kal-lagi">
                                                <img
                                                        src="vendor/img/cari-dokter/dokter-icon-3.svg"
                                                        alt=""
                                                />
                                                <div class="det-data">
                                                    <div class="det-kata">
                                                        <p class="biru">20 pasien</p>
                                                        <p>telah berkonsultasi</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <img
                                                src="vendor/img/cari-dokter/dokter-img-1.svg"
                                                alt=""
                                        />
                                    </div>
                                    <div class="det-konten-tengah"></div>
                                    <div class="det-konten-bawah">
                                        <p class="judul">Profil Dokter</p>
                                        <div class="det-kb-subjudul">
                                            <p>
                                                dr. Agung Nugroho, Sp.PD adalah Dokter Spesialis
                                                Penyakit Dalam yang aktif melayani pasien di RS
                                                Immanuel Bandung. dr. Agung Nugroho, Sp.PD
                                                mendapatkan gelar spesialisnya setelah menamatkan
                                                pendidikan di San Juan De Dios Educational.
                                            </p>
                                            <p>
                                                Beliau yang tergabung dalam Ikatan Dokter Indonesia
                                                (IDI) dan Perhimpunan Dokter Spesialis Penyakit
                                                Dalam Indonesia (PDPI) sebagai anggota ini dapat
                                                memberikan layanan konsultasi seputar penyakit
                                                dalam.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <form action="../chat" method="GET">
                                    <input type="hidden" name="login" id="loginField" value="login"/>
                                    <input type="hidden" name="redirect" id="redirectField" value=""/>
                                    <input type="hidden" name="userName" value="<?=$_SESSION['data']['username']?>"/>
                                    <input type="hidden" name="password" value="<?=$_SESSION['data']['password']?>"/>
                                    <input type="hidden" name="channelName" value="<?= $row['channelPublic'] ?>"/>
                                    <input type="hidden" name="lang" value="in"/>
                                    <button class="det-button" type="submit">Mulai Chat</button>
                                </form>
                                </button>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
<div class="footer-section" id="healtify">
    <div class="container pd-5">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="contact-content text-center">
                    <div class="footer-logo">
                        <a href="http://cs.upi.edu/v2/home" target="blank"><img src="vendor/img/upi.png"></a>
                    </div>
                    <h6>Jl. Pendidikan No.15, Cibiru Wetan, Kec. Cileunyi, Kabupaten Bandung, Jawa Barat 40625 </h6>
                    <p></p>
                    <h6>(022) 7801840<span>|</span>(022) 7801840</h6>
                    <div class="contact-social">
                        <ul>
                            <li><a class="hover-target" target="blank" href="https://www.facebook.com//"><i
                                            class="fab fa-facebook-f"></i></a></li>
                            <li><a class="hover-target" target="blank" href="mailto:info@"><i
                                            class="far fa-envelope"></i></a></li>
                            <li><a class="hover-target" target="blank" href="https://twitter.com/"><i
                                            class="fab fa-twitter"></i></i></a></li>
                            <li><a class="hover-target" target="blank" href="https://instagram.com/"><i
                                            class="fab fa-instagram"></i></i></a></li>
                            <li><a class="hover-target" target="blank" href="https://wa.me/0261-202767"><i
                                            class="fab fa-whatsapp"></i></i></a></li>
                        </ul>
                    </div>
                    <span>Copyright © Healthify <?= date('Y') ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- akhir footer -->
<!-- Script Ionicons -->
<script
        type="module"
        src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
></script>
<script src="../js/nav.js"></script>
<script
        nomodule
        src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
></script>
<script src="script.js"></script>

</body>
</html>

